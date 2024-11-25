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


// Cấu hình phân trang
$itemsPerPage = 20;
$currentPage = $_GET['page'] ?? 1;
$start = ($currentPage - 1) * $itemsPerPage;
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
  
  // Lọc tìm kiếm và danh mục
  $search = $_GET['search'] ?? '';
  $filter = $_GET['filter'] ?? '';
  if ($filter && !isset($categoryMapping[$filter])) $filter = '';
  
  // Điều kiện WHERE SQL
  $whereClauses = [];
  if ($search) $whereClauses[] = "(p.ProductID LIKE '%$search%' OR p.ProductName LIKE '%$search%')";
  if ($filter) $whereClauses[] = "c.Category = '{$conn->real_escape_string($categoryMapping[$filter])}'";
  $whereSQL = $whereClauses ? 'WHERE ' . implode(' AND ', $whereClauses) : '';

// Lấy tổng số sản phẩm
$totalQuery = "SELECT COUNT(*) as total FROM products p LEFT JOIN products_in_category c ON p.ProductID = c.ProductID $whereSQL";
$totalItems = $conn->query($totalQuery)->fetch_assoc()['total'];
$totalPages = ceil($totalItems / $itemsPerPage);

// Truy vấn sản phẩm
$query = "SELECT p.ProductID, p.ProductName, p.InStock, p.BasePrice, p.SalePrice, p.Notes, c.Category 
          FROM products p
          LEFT JOIN products_in_category c ON p.ProductID = c.ProductID
          $whereSQL LIMIT $start, $itemsPerPage";
$products = $conn->query($query)->fetch_all(MYSQLI_ASSOC);


// Truy vấn dữ liệu từ bảng đơn hàng
$query_orders = "SELECT * FROM orders LIMIT 50"; 
$result_orders = $conn->query($query_orders);

# Kiểm tra kết quả
if ($result_orders->num_rows > 0) {
    $orders = [];
    while ($row = $result_orders->fetch_assoc()) {
       $orders[] = $row;
    }
} else {
   $orders = [];
}

// Truy vấn dữ liệu từ bảng promocode
$query_promotions = "SELECT * FROM promotion"; 
$result_promotions = $conn->query($query_promotions);

# Kiểm tra kết quả
if ($result_promotions->num_rows > 0) {
    $promotions = [];
    while ($row = $result_promotions->fetch_assoc()) {
       $promotions[] = $row;
    }
} else {
   $promotions = [];
}

?>







