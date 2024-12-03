<?php
include 'db_connection.php';
echo "<pre>";
print_r($_SESSION); // Hiển thị toàn bộ nội dung của $_SESSION
echo "</pre>";
// Kiểm tra xem khách hàng đã đăng nhập hay chưa
if (!isset($_SESSION['customer_id'])) {
    // Chuyển hướng người dùng đến trang login nếu chưa đăng nhập
    $_SESSION['redirect_to_checkout'] = true; // Đánh dấu để quay lại sau khi login
    header("Location: login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['place_order'])) {
// Lấy thông tin từ session và form
$customer_id = $_SESSION['customer_id']; // Lấy ID khách hàng từ session
$order_id = uniqid("ORD"); // Tạo mã đơn hàng duy nhất
$customer_name = $_POST['customer_name'];
$shipping_address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$notes = $_POST['notes'];
$total_amount = $_SESSION['total']; // Tổng tiền lấy từ session
$discount = isset($_POST['discount']) ? $_POST['discount'] : 0; // Giảm giá nếu có
$total_due = $total_amount - $discount;


// Bắt đầu transaction
$conn->begin_transaction();

try {
    // 1. Tạo đơn hàng mới trong bảng `orders`
    $sql_create_order = "INSERT INTO orders (OrderID, ShippingAddress, OrderDate, OrderStatus, PaymentStatus, TotalAmount, Discount, TotalDue, CustomerID) 
                         VALUES (?, ?, NOW(), 'Đang chờ', 'Đang chờ', 0, ?, 0, ?)";
    $stmt_order = $conn->prepare($sql_create_order);
    $stmt_order->bind_param("ssds", $order_id, $shipping_address, $discount, $customer_id);
    $stmt_order->execute();

    $total_amount = 0;

    // 2. Duyệt qua từng sản phẩm trong giỏ hàng
    foreach ($cart_items as $item) {
        $product_id = $item['ProductID']; // ID sản phẩm
        $quantity = $item['Quantity'];   // Số lượng mua

        // Kiểm tra số lượng tồn kho
        $sql_check_stock = "SELECT InStock FROM products_in_orders WHERE ProductID = ?";
        $stmt_stock = $conn->prepare($sql_check_stock);
        $stmt_stock->bind_param("s", $product_id);
        $stmt_stock->execute();
        $result_stock = $stmt_stock->get_result();
        $row_stock = $result_stock->fetch_assoc();

        if (!$row_stock || $row_stock['InStock'] < $quantity) {
            throw new Exception("Sản phẩm $product_id không đủ số lượng tồn kho.");
        }

        // Giảm số lượng tồn kho
        $sql_update_stock = "UPDATE products_in_orders SET InStock = InStock - ? WHERE ProductID = ?";
        $stmt_update_stock = $conn->prepare($sql_update_stock);
        $stmt_update_stock->bind_param("is", $quantity, $product_id);
        $stmt_update_stock->execute();

        // Thêm sản phẩm vào bảng `products_in_orders`
        $sql_add_to_order = "INSERT INTO products_in_orders (ProductID, OrderID, InStock) 
                             VALUES (?, ?, ?)";
        $stmt_add_to_order = $conn->prepare($sql_add_to_order);
        $stmt_add_to_order->bind_param("ssi", $product_id, $order_id, $quantity);
        $stmt_add_to_order->execute();

        // Tính tổng tiền sản phẩm
        $sql_price = "SELECT Price FROM products WHERE ProductID = ?";
        $stmt_price = $conn->prepare($sql_price);
        $stmt_price->bind_param("s", $product_id);
        $stmt_price->execute();
        $result_price = $stmt_price->get_result();
        $row_price = $result_price->fetch_assoc();

        if ($row_price) {
            $total_amount += $row_price['Price'] * $quantity;
        }
    }

    // 3. Cập nhật tổng tiền và tổng tiền phải trả trong đơn hàng
    $total_due = $total_amount - $discount; // Tính tổng tiền sau giảm giá
    $sql_update_order = "UPDATE orders SET TotalAmount = ?, TotalDue = ? WHERE OrderID = ?";
    $stmt_update_order = $conn->prepare($sql_update_order);
    $stmt_update_order->bind_param("dds", $total_amount, $total_due, $order_id);
    $stmt_update_order->execute();

    // 4. Commit transaction
    $conn->commit();
    echo "Đặt hàng thành công! Mã đơn hàng của bạn là: $order_id";
} catch (Exception $e) {
    // Rollback nếu có lỗi
    $conn->rollback();
    echo "Lỗi đặt hàng: " . $e->getMessage();
}
}
// Đóng kết nối
$conn->close();

?>
