<?php
session_start();

// Hủy session và thông tin người dùng
session_unset();
session_destroy();

// Chuyển hướng về trang login.php
header("Location: login.php");
exit();
?>