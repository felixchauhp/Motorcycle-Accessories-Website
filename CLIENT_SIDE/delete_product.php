<?php
session_start();
include 'db_connection.php'; // Kết nối cơ sở dữ liệu

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id']; // Lấy ProductID từ query string

    // Sử dụng transaction để đảm bảo tính toàn vẹn dữ liệu
    mysqli_begin_transaction($conn);

    try {
        // Xóa sản phẩm khỏi bảng `products_in_category`
        $delete_category_query = "DELETE FROM products_in_category WHERE ProductID = ?";
        $stmt = mysqli_prepare($conn, $delete_category_query);
        mysqli_stmt_bind_param($stmt, "s", $product_id); // "s" cho chuỗi
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // Xóa sản phẩm khỏi bảng `products`
        $delete_product_query = "DELETE FROM products WHERE ProductID = ?";
        $stmt = mysqli_prepare($conn, $delete_product_query);
        mysqli_stmt_bind_param($stmt, "s", $product_id); // "s" cho chuỗi
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // Hoàn tất transaction
        mysqli_commit($conn);

        // Chuyển hướng về trang sản phẩm với thông báo
        header("Location: products.php?message=Sản phẩm đã được xóa thành công!");
        exit();
    } catch (Exception $e) {
        // Nếu có lỗi, rollback transaction
        mysqli_rollback($conn);
        die("Lỗi khi xóa sản phẩm: " . $e->getMessage());
    }
} else {
    header("Location: products.php?message=Lỗi: Không tìm thấy sản phẩm để xóa!");
    exit();
}
?>
