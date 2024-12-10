<?php
$current_page = basename($_SERVER['PHP_SELF']); // Lấy tên file hiện tại

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Nếu chưa đăng nhập và không phải trang login.php, chuyển hướng đến login.php
    if ($current_page !== 'login.php') {
        header("Location: login.php");
        exit;
    }
} else {
    // Nếu đã đăng nhập và đang ở trang login.php, chuyển hướng đến index.php
    if ($current_page === 'login.php') {
        header("Location: index.php");
        exit;
    }
}
?>
