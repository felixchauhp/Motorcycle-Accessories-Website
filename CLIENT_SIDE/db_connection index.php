<?php
// Cấu hình kết nối tới cơ sở dữ liệu MySQL trên Aiven
$host = 'motorcycle-da-ktdl.j.aivencloud.com'; // Thay bằng hostname của Aiven MySQL
$port = 17160; // Cổng mặc định của MySQL
$username = 'baophuc'; // Thay bằng tên đăng nhập của bạn
$password = 'AVNS_Y0CHLEKwLz75-i0dayg'; // Thay bằng mật khẩu của bạn
$database = 'motorcycle'; // Thay bằng tên cơ sở dữ liệu của bạn



// Kết nối với MySQL
$conn = new mysqli($host, $username, $password, $database, $port);

//Kiểm tra kết nối
// if ($conn->connect_error) {
//     die("Kết nối thất bại: " . $conn->connect_error);
// }
// echo "Kết nối thành công!";
// $current_page = basename($_SERVER['PHP_SELF']); // Lấy tên file hiện tại
// if (!isset($_SESSION['customer_id'])) {
//     // Nếu chưa đăng nhập và không phải đang ở trang login.php, chuyển hướng về login.php
//      if ($current_page !== 'login.php') {
//         header("Location: login.php");
//         exit;
//     }
// } else {
//     // Nếu đã đăng nhập và đang ở trang login.php, chuyển hướng đến index.php
//     if ($current_page === 'login.php') {
//         header("Location: index.php");
//         exit;
//     }
// }

// Mặc định là tab nổi bật
$activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'featured'; // Mặc định là 'featured' nếu không có tham số
$featured = isset($_GET['featured']) ? true : false;
$popular = isset($_GET['popular']) ? true : false;
  
// Truy vấn 8 sản phẩm có InStock cao nhất trong bảng products
$topInStockQuery = "SELECT ProductID FROM products ORDER BY InStock DESC LIMIT 8";
$topInStockResult = $conn->query($topInStockQuery);
$topInStockProducts = [];
if ($topInStockResult && $topInStockResult->num_rows > 0) {
    while ($row = $topInStockResult->fetch_assoc()) {
        $topInStockProducts[] = $row['ProductID'];
    }
}

// Truy vấn 8 sản phẩm có tổng InStock cao nhất trong bảng products_in_orders
$topInStockQuery2 = "
    SELECT p.ProductID, SUM(p.InStock) AS totalInStock
    FROM products_in_orders p
    GROUP BY p.ProductID
    ORDER BY totalInStock DESC
    LIMIT 8
";
$topInStockResult2 = $conn->query($topInStockQuery2);
$topInStockProducts2 = [];
if ($topInStockResult2 && $topInStockResult2->num_rows > 0) {
    while ($row = $topInStockResult2->fetch_assoc()) {
        $topInStockProducts2[] = $row['ProductID'];
    }
}


$whereClauses = [];

if ($featured && !empty($topInStockProducts)) {
    $whereClauses[] = "p.ProductID IN ('" . implode("','", $topInStockProducts) . "')";
}
if ($popular && !empty($topInStockProducts2)) {
    $whereClauses[] = "p.ProductID IN ('" . implode("','", $topInStockProducts2) . "')";
}

$whereSQL = $whereClauses ? 'WHERE ' . implode(' AND ', $whereClauses) : '';

// Lấy sản phẩm theo tab
$query = "
    SELECT p.ProductID, p.ProductName, p.InStock, p.BasePrice, p.SalePrice, p.Notes, c.Category, p.Image, p.Supplier
    FROM products p
    LEFT JOIN products_in_category c ON p.ProductID = c.ProductID
    $whereSQL
";


$products = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
?>