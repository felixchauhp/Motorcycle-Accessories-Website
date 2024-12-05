<?php
session_start();
include 'checklogin.php';
// Kết nối cơ sở dữ liệu
include 'db_connection.php';

// Kiểm tra xem tham số promo_code có được truyền vào không
if (isset($_GET['promo_code'])) {
    // Lấy PromoCode từ tham số URL
    $promo_code = $_GET['promo_code'];

    // Kiểm tra nếu promo_code không rỗng
    if (empty($promo_code)) {
        echo '<script>alert("Mã khuyến mãi không hợp lệ."); window.location.href = "discount.php";</script>';
        exit;
    }

    // Truy vấn để xóa mã khuyến mãi theo PromoCode
    $query = "DELETE FROM promotion WHERE PromoCode = ?";

    if ($stmt = mysqli_prepare($conn, $query)) {
        // Liên kết tham số và thực thi câu lệnh SQL
        mysqli_stmt_bind_param($stmt, "s", $promo_code);  // "s" vì PromoCode là kiểu string
        if (mysqli_stmt_execute($stmt)) {
            // Sau khi xóa thành công, chuyển hướng về trang danh sách mã khuyến mãi
            echo '<script>alert("Mã khuyến mãi đã được xóa thành công!"); window.location.href = "discount.php";</script>';
        } else {
            // Nếu có lỗi, hiển thị thông báo lỗi và quay lại trang danh sách mã khuyến mãi
            echo '<script>alert("Đã xảy ra lỗi khi xóa mã khuyến mãi."); window.location.href = "discount.php";</script>';
        }
        mysqli_stmt_close($stmt);
    } else {
        echo '<script>alert("Lỗi khi chuẩn bị câu lệnh SQL."); window.location.href = "discount.php";</script>';
    }
} else {
    echo '<script>alert("Mã khuyến mãi không được xác định."); window.location.href = "discount.php";</script>';
}
?>
