<?php
include 'db_connection.php'; // Kết nối database

if (isset($_POST['place_order'])) {
    // Kiểm tra giỏ hàng
    if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart']) || empty($_SESSION['cart'])) {
        $_SESSION['order_error'] = 'Giỏ hàng trống hoặc không hợp lệ!';
        header('Location: checkout.php');
        exit();
    }

    // Lấy thông tin khách hàng từ session
    if (!isset($_SESSION['customer_id'])) {
        $_SESSION['order_error'] = 'Không xác định được thông tin khách hàng!';
        header('Location: checkout.php');
        exit();
    }
    $customer_id = $_SESSION['customer_id'];

    // Kiểm tra khách hàng tồn tại
    $query_check_customer = "SELECT COUNT(*) AS count FROM customers WHERE CustomerID = '$customer_id'";
    $result_check = mysqli_query($conn, $query_check_customer);
    $row_check = mysqli_fetch_assoc($result_check);
    if ($row_check['count'] == 0) {
        $_SESSION['order_error'] = 'Khách hàng không tồn tại!';
        header('Location: checkout.php');
        exit();
    }

    // Lấy thông tin từ form
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $payment_method = 'Tiền mặt';
    $order_date = date('Y-m-d H:i:s');
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
        $_SESSION['order_error'] = 'Không thể tạo đơn hàng.';
        header('Location: checkout.php');
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
            $_SESSION['order_error'] = 'Không thể lưu thông tin sản phẩm.';
            header('Location: checkout.php');
            exit();
        }
    }

    // Lưu thông tin thanh toán vào bảng payment
    $query_insert_payment = "
        INSERT INTO payment (OrderID, PaymentMethod, PaymentDate)
        VALUES ('$order_id', 'Tiền mặt, '$order_date')
    ";
    if (!mysqli_query($conn, $query_insert_payment)) {
        $_SESSION['order_error'] = 'Không thể lưu thông tin thanh toán.';
        header('Location: checkout.php');
        exit();
    }

    // Xóa giỏ hàng
    unset($_SESSION['cart']);

    $_SESSION['order_success'] = 'Đặt hàng thành công!';
    header('Location: checkout.php');
    exit();
}
?>
