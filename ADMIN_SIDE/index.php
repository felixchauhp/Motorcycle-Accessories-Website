//kết nối có avien
<?php
// Cấu hình kết nối tới cơ sở dữ liệu MySQL trên Aiven
$host = 'motorcycle-da-ktdl.j.aivencloud.com'; // Thay bằng hostname của Aiven MySQL
$port = 17160; // Cổng mặc định của MySQL
$username = 'baophuc'; // Thay bằng tên đăng nhập của bạn
$password = 'AVNS_Y0CHLEKwLz75-i0dayg'; // Thay bằng mật khẩu của bạn
$database = 'motorcycle'; // Thay bằng tên cơ sở dữ liệu của bạn

// Kết nối với MySQL
$conn = new mysqli($host, $username, $password, $database, $port);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công!";
?>
