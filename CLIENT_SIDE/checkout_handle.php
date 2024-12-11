<?php
include 'db_connection.php'; // Kết nối database
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// echo "Request method: " . $_SERVER['REQUEST_METHOD'];
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (!empty($_POST)) {
//         echo "<pre>";
//         print_r($_POST);
//         echo "</pre>";
//     } else {
//         echo "Dữ liệu POST rỗng!";
//     }
// } else {
//     echo "Phương thức không phải POST.";
// }
if (isset($_POST['place_order'])) {
    // Kiểm tra giỏ hàng
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        $_SESSION['order_error'] = 'Giỏ hàng trống hoặc không hợp lệ!';
        echo "Đặt hàng thành công!1";
        exit();
    }

    // Kiểm tra thông tin khách hàng
    if (!isset($_SESSION['customer_id'])) {
        $_SESSION['order_error'] = 'Không xác định được thông tin khách hàng!';
        echo "Đặt hàng thành công!2";
        exit();
    }
    $customer_id = $_SESSION['customer_id'];

    // Lấy thông tin từ form
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $order_date = date('Y-m-d');
    $order_status = 'Đang chờ';
    $payment_status = 'Đang chờ';
    $discount = 0;

    // Tính tổng tiền
    $total_amount = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total_amount += $item['price'] * $item['quantity'];
    }
    $total_due = $total_amount - $discount;

    // Tạo mã OrderID (ORD000xxx)
    $query_order_count = "SELECT COUNT(*) AS order_count FROM orders";
    $result = mysqli_query($conn, $query_order_count);
    $row = mysqli_fetch_assoc($result);
    $order_id = 'ORD' . str_pad($row['order_count'] + 1, 6, '0', STR_PAD_LEFT);

    // Lưu thông tin đơn hàng vào bảng orders
    $query_insert_order = "
        INSERT INTO orders (OrderID, ShippingAddress, OrderDate, OrderStatus, PaymentStatus, TotalAmount, Discount, TotalDue, CustomerID)
        VALUES ('$order_id', '$address', '$order_date', '$order_status', '$payment_status', $total_amount, $discount, $total_due, '$customer_id')
    ";
    if (!mysqli_query($conn, $query_insert_order)) {
        $_SESSION['order_error'] = 'Không thể tạo đơn hàng: ' . mysqli_error($conn);
        echo "Đặt hàng thành công!3";
        exit();
    }

    // Lưu thông tin sản phẩm vào bảng products_in_orders
    foreach ($_SESSION['cart'] as $product_id => $item) {
        $quantity = $item['quantity'];
        $query_insert_products = "
            INSERT INTO products_in_orders (ProductID, Instock, OrderID)
            VALUES ('$product_id', $quantity, '$order_id')
        ";
        if (!mysqli_query($conn, $query_insert_products)) {
            $_SESSION['order_error'] = 'Không thể lưu thông tin sản phẩm: ' . mysqli_error($conn);
            echo "Đặt hàng thành công!4";
            exit();
        }
    }

    // Lưu thông tin thanh toán vào bảng payment
    $query_insert_payment = "
        INSERT INTO payment (OrderID, PaymentMethod, PaymentDate)
        VALUES ('$order_id', 'Tiền mặt', '$order_date')
    ";
    if (!mysqli_query($conn, $query_insert_payment)) {
        $_SESSION['order_error'] = 'Không thể lưu thông tin thanh toán: ' . mysqli_error($conn);
        echo "Đặt hàng thành công!5";
        exit();
    }

    // Xóa giỏ hàng
    unset($_SESSION['cart']);

    $_SESSION['order_success'] = 'Đặt hàng thành công!';
    header('Location: order_success.php');
    exit();
}
?>
