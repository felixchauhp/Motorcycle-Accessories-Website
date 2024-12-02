<?php
session_start();

// Hủy session và thông tin người dùng
session_unset();
session_destroy();

// Chuyển hướng về trang login.php
header("Location: login.php");
exit();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng xuất</title>
    <script>
        function confirmLogout(event) {
            event.preventDefault(); // Ngăn chặn việc gửi form ngay lập tức
            const confirmation = confirm("Bạn có chắc chắn muốn đăng xuất không?");
            if (confirmation) {
                window.location.href = 'logout.php'; // Chuyển hướng nếu xác nhận
            }
        }
    </script>
</head>
<body>
    <form onsubmit="confirmLogout(event)">
        <button type="submit">Đăng xuất</button>
    </form>
</body>
</html>
