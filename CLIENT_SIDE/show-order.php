<?php
// Kết nối cơ sở dữ liệu
include 'db_connection.php';

// Lấy OrderID từ URL
if (isset($_GET['OrderID'])) {
    $order_id = urldecode($_GET['OrderID']);

    // Truy vấn thông tin đơn hàng
    $order_query = "
        SELECT 
            orders.OrderID, orders.OrderDate, orders.CustomerID, orders.ShippingAddress, 
            orders.TotalAmount, orders.Discount, orders.TotalDue,
            orders.OrderStatus, orders.PaymentStatus,
            customers.LName, customers.FName, customers.email, customers.Tel
        FROM orders
        JOIN customers ON orders.CustomerID = customers.CustomerID
        WHERE orders.OrderID = ?";

    if ($stmt = mysqli_prepare($conn, $order_query)) {
        mysqli_stmt_bind_param($stmt, "s", $order_id);
        mysqli_stmt_execute($stmt);
        $order_result = mysqli_stmt_get_result($stmt);
        $order = mysqli_fetch_assoc($order_result);
        mysqli_stmt_close($stmt);
    }

    // Truy vấn danh sách sản phẩm trong đơn hàng
    $products_query = "
        SELECT 
            products_in_orders.ProductID, products_in_orders.InStock, 
            products.ProductName, products.SalePrice
        FROM products_in_orders
        JOIN products ON products_in_orders.ProductID = products.ProductID
        WHERE products_in_orders.OrderID = ?";

    $products = [];
    if ($stmt = mysqli_prepare($conn, $products_query)) {
        mysqli_stmt_bind_param($stmt, "s", $order_id);
        mysqli_stmt_execute($stmt);
        $products_result = mysqli_stmt_get_result($stmt);
        while ($product = mysqli_fetch_assoc($products_result)) {
            $product['TotalPrice'] = $product['InStock'] * $product['SalePrice'];
            $products[] = $product;
        }
        mysqli_stmt_close($stmt);
    }

    if (!$order) {
        die("Không tìm thấy đơn hàng!");
    }
} else {
    die("Không tìm thấy mã đơn hàng!");
}
?>

<!DOCTYPE html>
<html lang="en">
<!--=============== HEAD ===============-->
<?php include 'head.php'; ?>
<body>
<!--=============== HEADER ===============-->
<?php include 'header.php'; ?>

<!--=============== MAIN ===============-->
<main class="main">
    <section class="wishlist section--lg container">
        <h2 style="text-align: center;">Chi tiết đơn hàng</h2>
        <div class="order-detail-container">
            <p><strong>Mã đơn hàng:</strong> <?= htmlspecialchars($order['OrderID']); ?></p>
            <p><strong>Ngày đặt hàng:</strong> <?= htmlspecialchars($order['OrderDate']); ?></p>
            <p><strong>Tên khách hàng:</strong> <?= htmlspecialchars($order['LName'] . ' ' . $order['FName']); ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($order['email']); ?></p>
            <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($order['Tel']); ?></p>
            <p><strong>Địa chỉ giao hàng:</strong> <?= htmlspecialchars($order['ShippingAddress']); ?></p>
            <p><strong>Trạng thái thanh toán:</strong> <?= htmlspecialchars($order['PaymentStatus']); ?></p>
            <p><strong>Trạng thái đơn hàng:</strong> <?= htmlspecialchars($order['OrderStatus']); ?></p>
        </div>

        <table class="product-table">
            <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Không có sản phẩm trong đơn hàng này.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['ProductID']); ?></td>
                            <td><?= htmlspecialchars($product['ProductName']); ?></td>
                            <td><?= htmlspecialchars($product['InStock']); ?></td>
                            <td><?= number_format($product['SalePrice'], 0, ',', '.'); ?> VND</td>
                            <td><?= number_format($product['TotalPrice'], 0, ',', '.'); ?> VND</td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: right; font-weight: bold;">Tổng cộng:</td>
                    <td><?= number_format($order['TotalAmount'], 0, ',', '.'); ?> VND</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right; font-weight: bold;">Giảm giá:</td>
                    <td><?= number_format($order['Discount'], 0, ',', '.'); ?> VND</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right; font-weight: bold;">Tổng thanh toán:</td>
                    <td><?= number_format($order['TotalDue'], 0, ',', '.'); ?> VND</td>
                </tr>
            </tfoot>
        </table>

        <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                    <!-- Nút quay lại -->
                    <button
                        type="button" 
                        class="btn flex btn__md" 
                        onclick="window.location.href='accounts.php'">
                        Quay lại
                    </button>

                    <!-- Nút chỉnh sửa -->
                    <button 
                        type="button" 
                        class="btn flex btn__md" 
                        onclick="window.location.href='edit-order.php?OrderID=<?= urlencode($order['OrderID']); ?>'">
                        Chỉnh sửa
                    </button>
        </div>

    </section>
</main>

<!--=============== FOOTER ===============-->
<?php include 'footer.php'; ?>

<!--=============== MAIN JS ===============-->
<script src="assets/js/main.js"></script>
</body>
</html>
