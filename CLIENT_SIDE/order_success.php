<?php
include 'db_connection.php'; // Kết nối database
session_start(); // Bắt đầu session để sử dụng thông tin từ session

// Kiểm tra xem thông báo 'order_success' có trong session không
if (isset($_SESSION['order_success'])) {
    $successMessage = $_SESSION['order_success'];
    // Xóa thông báo khỏi session để không hiển thị lại khi tải lại trang
    unset($_SESSION['order_success']);
} else {
    // Nếu không có thông báo thành công, chuyển hướng về trang giỏ hàng
    header('Location: cart.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
  <!--=============== DOCUMENT HEAD ===============-->
  <?php include 'head.php'; ?>
<body>
    <div class="container" style="display: flex; justify-content: center;">
        <h1>Đặt Hàng Thành Công!</h1>
        <p><?php echo htmlspecialchars($successMessage); ?></p> <!-- Hiển thị thông báo từ session -->

        <div class="actions">
            <a href="index.php" class="btn">Trở về trang chủ</a> <!-- Chuyển hướng về trang chủ -->
            <a href="cart.php" class="btn">Quay lại giỏ hàng</a> <!-- Quay lại giỏ hàng -->
        </div>
    </div>
</body>
</html>
