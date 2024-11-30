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

    // Thông tin nhà bán hàng
    $seller_info = [
        'name' => 'Công ty CP-TM-DV Xe Gắn Máy (MotorCycle Joint-Stock Company Vietnam)',
        'address' => '100 phường Đông Hòa, TP. Dĩ An, tỉnh Bình Dương, Việt Nam',
        'phone' => '+84 001 929 992',
        'email' => 'contact@motorcycle.vn'
    ];

} else {
    die("Không tìm thấy mã đơn hàng!");
}
?>

<!DOCTYPE html>
<html lang="en">
<!--=============== HEAD ===============-->
<?php include 'head.php'; ?>
<body>

<!--=============== MAIN ===============-->
<main class="main">
    <section class="invoice section--lg container">
                <!-- Container cho logo và tiêu đề -->
        <div class="invoice-header">
            <div class="seller-logo">
                <img src="assets/img/logo.png" alt="Logo Nhà Bán Hàng">
            </div>
            <h1 class="invoice-Stitle">HÓA ĐƠN BÁN HÀNG</h1>
        </div>

        <br>
        <div class="seller-and-buyer-info">
            <!-- Thông tin nhà bán hàng -->
            <div class="seller-info">
                <p><strong> <?= htmlspecialchars($seller_info['name']); ?></strong></p>
                <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($seller_info['address']); ?></p>
                <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($seller_info['phone']); ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($seller_info['email']); ?></p>
            </div>

            <!-- Thông tin người mua -->
            <div class="buyer-info">
                <p><strong>Tên khách hàng:</strong> <?= htmlspecialchars($order['LName'] . ' ' . $order['FName']); ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($order['email']); ?></p>
                <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($order['Tel']); ?></p>
                <p><strong>Địa chỉ giao hàng:</strong> <?= htmlspecialchars($order['ShippingAddress']); ?></p>
            </div>
        </div>


        <!-- Bảng sản phẩm -->
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

        <div class="invoice-footer">
            <p><strong>Ghi chú của nhà bán hàng:</strong> Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi. Nếu có bất kỳ thắc mắc nào, vui lòng liên hệ qua email hoặc số điện thoại trên.</p>
        <br>
            <!-- Nút in -->
            <button type="button" class="print-btn btn flex btn__md"  onclick="printInvoice();">
                In hóa đơn
            </button>
            <script>
                function printInvoice() {
                window.print();
            }
            </script>
        </div>

    </section>
</main>

<!--=============== MAIN JS ===============-->
</body>
</html>
