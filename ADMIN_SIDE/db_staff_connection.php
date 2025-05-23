<?php
if(session_id() == ''){
    session_start();
}

// Cấu hình kết nối tới cơ sở dữ liệu MySQL trên Aiven
$host = 'motorcycle-da-ktdl.j.aivencloud.com'; // Thay bằng hostname của Aiven MySQL
$port = 17160; // Cổng mặc định của MySQL
$username = $_SESSION['username']; // Thay bằng tên đăng nhập của bạn
$password = $_SESSION['password']; // Thay bằng mật khẩu của bạn
$database = 'motorcycle'; // Thay bằng tên cơ sở dữ liệu của bạn

// Kết nối với MySQL
$conn = new mysqli($host, $username, $password, $database, $port);

//Kiểm tra kết nối
// if ($conn->connect_error) {
//     die("Kết nối thất bại: " . $conn->connect_error);
// }
// echo "Kết nối thành công!";

try {
    $pdo = new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // if($pdo){
    //     echo "Connected successfully";
    // }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Kiểm tra quyền truy cập
// echo "Current user: " . $pdo->query("SELECT CURRENT_USER()")->fetchColumn() . "<br>";
$stmt = $pdo->query("SHOW GRANTS FOR CURRENT_USER");
$grants = $stmt->fetchAll(PDO::FETCH_ASSOC);

// print_r($grants);

// Kiểm tra các quyền trong kết quả trả về
function checkPermission($grants, $tableName, $permission = null) {
    $permissions = [
        'SELECT' => false,
        'INSERT' => false,
        'UPDATE' => false,
        'DELETE' => false
    ];

    foreach ($grants as $grant) {
        $grantStr = implode(" ", $grant);
        // print_r($grantStr);

    // Xử lý chuỗi bảng để đảm bảo khớp chính xác
        $pattern = '/\b' . preg_quote($tableName, '/') . '\b/';

        // Kiểm tra quyền cụ thể trên bảng
        foreach ($permissions as $key => &$value) {
            if (strpos($grantStr, $key) !== false && preg_match($pattern, $grantStr)) {
                $value = true;
            }
        }

        // Kiểm tra quyền ALL PRIVILEGES
        if (strpos($grantStr, 'ALL PRIVILEGES') !== false && preg_match($pattern, $grantStr)) {
            $permissions = array_fill_keys(array_keys($permissions), true);
        }
    }

    // Trả về tất cả các quyền nếu không chỉ định quyền cụ thể
    if ($permission === null) {
        return $permissions;
    }

    // Trả về kết quả kiểm tra cho quyền cụ thể
    return $permissions[$permission] ?? false;
}

$tableName = $_SESSION['current_table'] ?? null;
// echo $tableName;
if(!$tableName) return;
else{
    $permissions = checkPermission($grants, $tableName);
}
// In kết quả kiểm tra quyền
// echo "Has SELECT: " . ($permissions['SELECT'] ? 'Yes' : 'No') . "<br>";
// echo "Has INSERT: " . ($permissions['INSERT'] ? 'Yes' : 'No') . "<br>";
// echo "Has UPDATE: " . ($permissions['UPDATE'] ? 'Yes' : 'No') . "<br>";
// echo "Has DELETE: " . ($permissions['DELETE'] ? 'Yes' : 'No') . "<br>";

$_SESSION['ViewData'] = $permissions['SELECT'];
$_SESSION['InsertData'] = $permissions['INSERT'];
$_SESSION['UpdateData'] = $permissions['UPDATE'];
$_SESSION['DeleteData'] = $permissions['DELETE'];

if(!$permissions['SELECT']) return;

// Xử lý các yêu cầu tìm kiếm và lọc
$search = $_GET['search'] ?? '';
$filter = $_GET['filter'] ?? '';
$featured = isset($_GET['featured']) ? true : false;
$popular = isset($_GET['popular']) ? true : false;
// Xử lý cấu hình phân trang
$itemsPerPage = 20;
$currentPage = $_GET['page'] ?? 1;
$start = ($currentPage - 1) * $itemsPerPage;

if($tableName == 'products') {

    // Truy vấn 10 sản phẩm có InStock cao nhất
    $topInStockQuery = "SELECT ProductID FROM products ORDER BY InStock DESC LIMIT 10";
    $topInStockResult = $conn->query($topInStockQuery);

    // Lưu danh sách ProductID vào một mảng
    $topInStockProducts = [];
    if ($topInStockResult->num_rows > 0) {
        while ($row = $topInStockResult->fetch_assoc()) {
            $topInStockProducts[] = $row['ProductID'];
        }
    }


    // 1. Phân trang cho bảng sản phẩm
    $whereClauses = [];
    if ($search) $whereClauses[] = "(p.ProductID LIKE '%$search%' OR p.ProductName LIKE '%$search%')";
    if ($filter === 'out_of_stock') {
        $whereClauses[] = "p.InStock = 0";
    } elseif ($filter) {
        $whereClauses[] = "c.Category = '{$conn->real_escape_string($filter)}'";
    }
    if ($featured) {
        $whereClauses[] = "p.ProductID IN ('" . implode("','", $topInStockProducts) . "')";
    }
    if($popular){

    }

    $whereSQL = $whereClauses ? 'WHERE ' . implode(' AND ', $whereClauses) : '';

    // Tổng số sản phẩm
    $totalQuery = "SELECT COUNT(*) as total FROM products p LEFT JOIN products_in_category c ON p.ProductID = c.ProductID $whereSQL";
    $totalItems = $conn->query($totalQuery)->fetch_assoc()['total'];
    $totalPages = ceil($totalItems / $itemsPerPage);

    // Lấy sản phẩm theo điều kiện tìm kiếm và phân trang
    $query = "SELECT p.ProductID, p.ProductName, p.InStock, p.BasePrice, p.SalePrice, p.Notes, c.Category, p.Image, p.Supplier
                FROM products p
                LEFT JOIN products_in_category c ON p.ProductID = c.ProductID
                $whereSQL ORDER BY p.Lastestupdate DESC LIMIT $start, $itemsPerPage";

    $products = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
}

if($tableName == 'orders') {
    // 2. Phân trang cho bảng đơn hàng
    // Lấy giá trị từ GET
    $search = $_GET['search'] ?? '';
    $startDate = $_GET['start_date'] ?? '';
    $endDate = $_GET['end_date'] ?? '';
    $statusFilter = $_GET['status'] ?? '';
    $paymentFilter = $_GET['payment'] ?? '';


    $whereClauses = [];
    if ($search) {
        $whereClauses[] = "(OrderID LIKE '%$search%' OR CustomerID LIKE '%$search%')";
    }
    if ($startDate) $whereClauses[] = "OrderDate >= '{$conn->real_escape_string($startDate)}'";
    if ($endDate) $whereClauses[] = "OrderDate <= '{$conn->real_escape_string($endDate)}'";
    if ($statusFilter) $whereClauses[] = "OrderStatus = '{$conn->real_escape_string($statusFilter)}'";
    if ($paymentFilter) $whereClauses[] = "PaymentStatus = '{$conn->real_escape_string($paymentFilter)}'";

    $whereSQL = $whereClauses ? 'WHERE ' . implode(' AND ', array: $whereClauses) : '';

    // Truy vấn tổng số đơn hàng
    $totalOrdersQuery = "SELECT COUNT(*) as total FROM orders $whereSQL";
    $totalOrders = $conn->query($totalOrdersQuery)->fetch_assoc()['total'];
    $totalOrderPages = ceil($totalOrders / $itemsPerPage);

    // Truy vấn đơn hàng
    $orderQuery = "SELECT * FROM orders $whereSQL ORDER BY OrderDate DESC LIMIT $start, $itemsPerPage";
    $orderResults = $conn->query($orderQuery);

    $orders = [];
    if ($orderResults->num_rows > 0) {
        while ($row = $orderResults->fetch_assoc()) {
            $orders[] = $row;
        }
    } else {
        $orders = [];
    }
}


if($tableName == 'promotion') {
    // 3. Phân trang cho bảng khuyến mãi
    // Lấy giá trị từ GET
    $startDate = $_GET['start_date'] ?? '';
    $endDate = $_GET['end_date'] ?? '';
    $customVar = $_GET['custom_var'] ?? '';

    // Điều kiện WHERE SQL
    $whereClauses = [];
    if ($search) {
        // Tìm kiếm theo tên khuyến mãi và mã khuyến mãi
        $whereClauses[] = "(PromoName LIKE '%$search%' OR PromoCode LIKE '%$search%')";
    }
    if ($startDate && $endDate && $customVar) {
        // Áp dụng bộ lọc đặc biệt cho ngày hôm nay
        $whereClauses[] = "StartDate <= '{$conn->real_escape_string($startDate)}'"; // Bắt đầu <= hôm nay
        $whereClauses[] = "EndDate >= '{$conn->real_escape_string($endDate)}'"; // Kết thúc >= hôm nay
    } else {
        // Nếu không có start_date và end_date từ liên kết, dùng các ô lọc thông thường
        if ($startDate) {
            $whereClauses[] = "StartDate >= '{$conn->real_escape_string($startDate)}'"; // Bắt đầu >= ngày bắt đầu
        }
        if ($endDate) {
            $whereClauses[] = "EndDate <= '{$conn->real_escape_string($endDate)}'"; // Kết thúc <= ngày kết thúc
        }
    }
    $whereSQL = $whereClauses ? 'WHERE ' . implode(' AND ', $whereClauses) : '';

    // Tổng số khuyến mãi
    $totalPromotionsQuery = "SELECT COUNT(*) as total FROM promotion $whereSQL";
    $totalPromotions = $conn->query($totalPromotionsQuery)->fetch_assoc()['total'];
    $totalPromotionPages = ceil($totalPromotions / $itemsPerPage);

    // Truy vấn khuyến mãi
    $promotionQuery = "SELECT * FROM promotion $whereSQL ORDER BY StartDate DESC LIMIT $start, $itemsPerPage";
    $promotionResults = $conn->query($promotionQuery);

    $promotions = [];
    if ($promotionResults->num_rows > 0) {
        while ($row = $promotionResults->fetch_assoc()) {
            $promotions[] = $row;
        }
    } else {
        $promotions = [];
    }
}
?>