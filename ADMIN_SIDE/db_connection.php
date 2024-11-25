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
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công!";



// Ánh xạ danh mục
$categoryMapping = [
    'vo-xe-ruot-xe' => 'Vỏ xe và ruột xe',
    'nhong-sen-dia' => 'Nhông sên dĩa',
    'bac-dan' => 'Bạc đạn',
    'nhot' => 'Nhớt',
    'ac-quy' => 'Ắc quy',
    'bo-dia-bo-thang' => 'Bố đĩa và bố thắng',
    'cac-phu-kien-khac' => 'Các phụ kiện khác'
  ];
  
  // Cấu hình phân trang
$itemsPerPage = 20;
$currentPage = $_GET['page'] ?? 1;
$start = ($currentPage - 1) * $itemsPerPage;

// 1. Phân trang cho bảng sản phẩm
$search = $_GET['search'] ?? '';
$filter = $_GET['filter'] ?? '';
if ($filter && !isset($categoryMapping[$filter])) $filter = '';

// Điều kiện WHERE SQL
$whereClauses = [];
if ($search) $whereClauses[] = "(p.ProductID LIKE '%$search%' OR p.ProductName LIKE '%$search%')";
if ($filter) $whereClauses[] = "c.Category = '{$conn->real_escape_string($categoryMapping[$filter])}'";
$whereSQL = $whereClauses ? 'WHERE ' . implode(' AND ', $whereClauses) : '';

// Tổng số sản phẩm
$totalQuery = "SELECT COUNT(*) as total FROM products p LEFT JOIN products_in_category c ON p.ProductID = c.ProductID $whereSQL";
$totalItems = $conn->query($totalQuery)->fetch_assoc()['total'];
$totalPages = ceil($totalItems / $itemsPerPage);

// Truy vấn sản phẩm
$query = "SELECT p.ProductID, p.ProductName, p.InStock, p.BasePrice, p.SalePrice, p.Notes, c.Category 
          FROM products p
          LEFT JOIN products_in_category c ON p.ProductID = c.ProductID
          $whereSQL LIMIT $start, $itemsPerPage";
$products = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

// 2. Phân trang cho bảng đơn hàng
$totalOrdersQuery = "SELECT COUNT(*) as total FROM orders";
$totalOrders = $conn->query($totalOrdersQuery)->fetch_assoc()['total'];
$totalOrderPages = ceil($totalOrders / $itemsPerPage);

$orderQuery = "SELECT * FROM orders LIMIT $start, $itemsPerPage";
$orderResults = $conn->query($orderQuery);

if ($orderResults->num_rows > 0) {
    $orders = [];
    while ($row = $orderResults->fetch_assoc()) {
        $orders[] = $row;
    }
} else {
    $orders = [];
}

// 3. Phân trang cho bảng khuyến mãi
$totalPromotionsQuery = "SELECT COUNT(*) as total FROM promotion";
$totalPromotions = $conn->query($totalPromotionsQuery)->fetch_assoc()['total'];
$totalPromotionPages = ceil($totalPromotions / $itemsPerPage);

$promotionQuery = "SELECT * FROM promotion LIMIT $start, $itemsPerPage";
$promotionResults = $conn->query($promotionQuery);

if ($promotionResults->num_rows > 0) {
    $promotions = [];
    while ($row = $promotionResults->fetch_assoc()) {
        $promotions[] = $row;
    }
} else {
    $promotions = [];
}


?>







