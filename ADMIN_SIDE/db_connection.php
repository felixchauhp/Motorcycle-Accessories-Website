//Kết nối chưa có aiven nhé
<?php
// Kết nối MySQL
$mysqli = new mysqli("localhost", "root", "", "DA_KTDL");

// Kiểm tra kết nối
if ($mysqli->connect_errno) {
    echo "Không thể kết nối đến MySQL: " . $mysqli->connect_error;
    exit();
}

// Truy vấn dữ liệu từ bảng sản phẩm
$query = "SELECT * FROM products"; 
$result = $mysqli->query($query);

// Kiểm tra kết quả
if ($result->num_rows > 0) {
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    $products = [];
}

$mysqli->close();
?>
