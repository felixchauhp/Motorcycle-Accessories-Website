<?php
session_start();

// Kiểm tra xem dữ liệu từ form có hợp lệ không
if (isset($_POST['product_id'], $_POST['product_name'], $_POST['product_price'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];

    // Nếu chưa khởi tạo giỏ hàng, tạo mảng giỏ hàng
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng hay chưa
    if (isset($_SESSION['cart'][$productId])) {
        // Nếu có, tăng số lượng
        $_SESSION['cart'][$productId]['quantity']++;
    } else {
        // Nếu chưa, thêm sản phẩm vào giỏ hàng
        $_SESSION['cart'][$productId] = [
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => 1
        ];
    }

    // Chuyển hướng về trang giỏ hàng hoặc trang sản phẩm
    header('Location: cart.php');
    exit();
} else {
    // Nếu dữ liệu không hợp lệ, chuyển hướng về trang sản phẩm
    header('Location: product.php');
    exit();
}
