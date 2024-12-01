<!-- <?php
session_start();
require 'db_connection.php'; // Tệp này chứa kết nối database (sử dụng code bạn đã cung cấp)

// Kiểm tra nếu form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accountName = $_POST['accountName'] ?? '';
    $password = $_POST['password'] ?? '';

    // Kiểm tra xem các trường có được điền đầy đủ không
    if (empty($accountName) || empty($password)) {
        echo "Vui lòng nhập đầy đủ thông tin.";
        exit;
    }

    // Truy vấn cơ sở dữ liệu để lấy thông tin tài khoản
    $stmt = $conn->prepare("SELECT * FROM employee WHERE AccountName = ?");
    $stmt->bind_param("s", $accountName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Kiểm tra mật khẩu
        if ($password === $user['Password']) { // Không khuyến nghị dùng plain-text, hãy sử dụng hash
            $_SESSION['user'] = [
                'id' => $user['id'],
                'accountName' => $user['AccountName'],
            ];
            header("Location: index.php");
            exit;
        } else {
            echo "Sai tài khoản hoặc mật khẩu.";
        }
    } else {
        echo "Sai tài khoản hoặc mật khẩu.";
    }
}
?> -->
