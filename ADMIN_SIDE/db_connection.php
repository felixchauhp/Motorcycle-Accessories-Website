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


// Truy vấn dữ liệu từ bảng sản phẩm
$query = "SELECT * FROM products"; 
$result = $conn->query($query);

// Kiểm tra kết quả
if ($result->num_rows > 0) {
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    $products = [];
}


// Truy vấn dữ liệu từ bảng danh mục sản phẩm
$query_category = "SELECT * FROM products_in_category"; 
$result_category = $conn->query($query_category);

# Kiểm tra kết quả
if ($result_category->num_rows > 0) {
    $products_category = [];
    while ($row = $result_category->fetch_assoc()) {
        $products_category[] = $row;
    }
} else {
    $products_category = [];
}

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







