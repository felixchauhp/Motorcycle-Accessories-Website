<?php
session_start();
include 'db_connection.php'; // Tệp kết nối cơ sở dữ liệu

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Lấy tên đăng nhập từ session
$username = $_SESSION['username'];

// Kiểm tra nếu form đã được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy mật khẩu hiện tại, mật khẩu mới và xác nhận mật khẩu mới từ form
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Truy vấn thông tin người dùng từ cơ sở dữ liệu
    $query = "SELECT * FROM employees WHERE AccountName = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Kiểm tra mật khẩu hiện tại
    if (password_verify($current_password, $user['Password'])) {
        // Kiểm tra mật khẩu mới và xác nhận mật khẩu mới có khớp không
        if ($new_password == $confirm_password) {
            // Mã hóa mật khẩu mới trước khi lưu vào cơ sở dữ liệu
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Cập nhật mật khẩu mới vào cơ sở dữ liệu
            $update_query = "UPDATE employees SET Password = ? WHERE AccountName = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param("ss", $hashed_new_password, $username);

            if ($update_stmt->execute()) {
                $message = "Mật khẩu đã được thay đổi thành công.";
            } else {
                $message = "Đã xảy ra lỗi khi thay đổi mật khẩu. Vui lòng thử lại.";
            }
        } else {
            $message = "Mật khẩu mới và xác nhận mật khẩu không khớp.";
        }
    } else {
        $message = "Mật khẩu hiện tại không đúng.";
    }
}
?>

<!-- Hiển thị thông báo thành công hoặc lỗi -->
<?php if (isset($message)): ?>
    <p style="color: red;"><?php echo $message; ?></p>
<?php endif; ?>
