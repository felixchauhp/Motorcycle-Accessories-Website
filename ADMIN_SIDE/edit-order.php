<?php
session_start();
$_SESSION['current_table'] = 'orders';
include 'checklogin.php';
include 'db_staff_connection.php';

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

    $stmt = mysqli_prepare($conn, $order_query);
    mysqli_stmt_bind_param($stmt, "s", $order_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $order = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    // Truy vấn danh sách sản phẩm trong đơn hàng
    $products_query = "
        SELECT 
            products_in_orders.ProductID, products_in_orders.InStock, 
            products.ProductName, products.SalePrice 
        FROM products_in_orders
        JOIN products ON products_in_orders.ProductID = products.ProductID
        WHERE products_in_orders.OrderID = ?";

    $stmt = mysqli_prepare($conn, $products_query);
    mysqli_stmt_bind_param($stmt, "s", $order_id);
    mysqli_stmt_execute($stmt);
    $products_result = mysqli_stmt_get_result($stmt);
    $products = [];
    while ($product = mysqli_fetch_assoc($products_result)) {
        $products[] = $product;
    }
    mysqli_stmt_close($stmt);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy dữ liệu từ form
        $order_status = $_POST['order_status'];
        $payment_status = $_POST['payment_status'];
        $total_amount = 0;
        $discount = $order['Discount'];

        // Cập nhật số lượng sản phẩm và tính tổng cộng
        foreach ($_POST['quantity'] as $product_id => $quantity) {
            $quantity = max(0, intval($quantity)); // Bảo đảm số lượng >= 0
            foreach ($products as &$product) {
                if ($product['ProductID'] == $product_id) {
                    $product['InStock'] = $quantity;
                    $product['TotalPrice'] = $quantity * $product['SalePrice'];
                    $total_amount += $product['TotalPrice'];
                }
            }

            // Cập nhật số lượng vào bảng products_in_orders
            $update_query = "
                UPDATE products_in_orders 
                SET InStock = ? 
                WHERE OrderID = ? AND ProductID = ?";
            $stmt = mysqli_prepare($conn, $update_query);
            mysqli_stmt_bind_param($stmt, "iss", $quantity, $order_id, $product_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        $total_due = $total_amount - $discount;

        // Cập nhật thông tin đơn hàng
        $update_order_query = "
            UPDATE orders 
            SET 
                OrderStatus = ?, 
                PaymentStatus = ?, 
                TotalAmount = ?, 
                TotalDue = ? 
            WHERE OrderID = ?";
        $stmt = mysqli_prepare($conn, $update_order_query);
        mysqli_stmt_bind_param($stmt, "ssdds", $order_status, $payment_status, $total_amount, $total_due, $order_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: show-order.php?OrderID=" . urlencode($order_id));
        exit;
    }
} else {
    die("Không tìm thấy mã đơn hàng!");
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
<?php include 'header.php'; ?>

<main class="main">
<?php if($_SESSION['UpdateData']): ?>
    <section class="wishlist section--lg container">
        <h2 style="text-align: center;">Chỉnh sửa đơn hàng</h2>
        <div class="order-detail-container">
            <p><strong>Mã đơn hàng:</strong> <?= htmlspecialchars($order['OrderID']); ?></p>
            <p><strong>Ngày đặt hàng:</strong> <?= htmlspecialchars($order['OrderDate']); ?></p>
            <p><strong>Tên khách hàng:</strong> <?= htmlspecialchars($order['LName'] . ' ' . $order['FName']); ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($order['email']); ?></p>
            <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($order['Tel']); ?></p>
            <p><strong>Địa chỉ giao hàng:</strong> <?= htmlspecialchars($order['ShippingAddress']); ?></p>
        </div>
        <br>
        <form method="POST" id="editOrderForm">
            <!-- Trạng thái đơn hàng và thanh toán -->
            <div class="status-container">
                <div class="status-item">
                    <i class="fas fa-box"></i>
                    <label for="order_status">Trạng thái đơn hàng:</label>
                    <select name="order_status" id="order_status" required>
                        <option value="Đã xác nhận" <?= $order['OrderStatus'] === 'Đã xác nhận' ? 'selected' : ''; ?>>Đã xác nhận</option>
                        <option value="Đã đóng gói" <?= $order['OrderStatus'] === 'Đã đóng gói' ? 'selected' : ''; ?>>Đã đóng gói</option>
                        <option value="Đã giao" <?= $order['OrderStatus'] === 'Đã giao' ? 'selected' : ''; ?>>Đã giao</option>
                        <option value="Đã hủy" <?= $order['OrderStatus'] === 'Đã hủy' ? 'selected' : ''; ?>>Đã hủy</option>
                    </select>
                </div>
                <div class="status-item">
                    <i class="fas fa-wallet"></i>
                    <label for="payment_status">Trạng thái thanh toán:</label>
                    <select name="payment_status" id="payment_status" required>
                        <option value="Thành công" <?= $order['PaymentStatus'] === 'Thành công' ? 'selected' : ''; ?>>Thành công</option>
                        <option value="Thất bại" <?= $order['PaymentStatus'] === 'Thất bại' ? 'selected' : ''; ?>>Thất bại</option>
                        <option value="Đang chờ" <?= $order['PaymentStatus'] === 'Đang chờ' ? 'selected' : ''; ?>>Đang chờ</option>
                    </select>
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
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['ProductID']); ?></td>
                            <td><?= htmlspecialchars($product['ProductName']); ?></td>
                            <td>
                                <input type="number" name="quantity[<?= $product['ProductID']; ?>]" 
                                    value="<?= $product['InStock']; ?>" 
                                    min="0" 
                                    class="quantity-input" 
                                    data-price="<?= $product['SalePrice']; ?>" 
                                    required>
                            </td>
                            <td><?= number_format($product['SalePrice'], 0, ',', '.'); ?> VND</td>
                            <td class="product-total">
                                <?= number_format($product['InStock'] * $product['SalePrice'], 0, ',', '.'); ?> VND
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" style="text-align: right; font-weight: bold;">Tổng cộng:</td>
                        <td id="totalAmount"><?= number_format($order['TotalAmount'], 0, ',', '.'); ?> VND</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right; font-weight: bold;">Giảm giá:</td>
                        <td><?= number_format($order['Discount'], 0, ',', '.'); ?> VND</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right; font-weight: bold;">Tổng thanh toán:</td>
                        <td id="totalDue"><?= number_format($order['TotalDue'], 0, ',', '.'); ?> VND</td>
                    </tr>
                </tfoot>
            </table>
            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                <button type="submit" class="btn flex btn__md">Lưu thay đổi</button>
                <button type="button" class="btn flex btn__md" onclick="window.location.href='show-order.php?OrderID=<?= urlencode($order_id); ?>'">Hủy</button>
            </div>
        </form>
    </section>
<?php else: ?>
    <h1 style="text-align: center;"> Bạn không có quyền thay đổi thông tin đơn hàng ở trang này </h1>
    <h2 style="text-align: center;"> Mọi thông tin liên hệ quản lý để cấp quyền truy cập </h2>
<?php endif; ?>
</main>

<script>
    const quantityInputs = document.querySelectorAll('.quantity-input');
    const totalAmountEl = document.getElementById('totalAmount');
    const totalDueEl = document.getElementById('totalDue');
    const discount = <?= $order['Discount']; ?>;

    quantityInputs.forEach(input => {
        input.addEventListener('input', () => {
            const row = input.closest('tr');
            const price = parseFloat(input.dataset.price);
            const quantity = parseInt(input.value) || 0;
            const productTotalEl = row.querySelector('.product-total');

            // Cập nhật thành tiền
            const total = price * quantity;
            productTotalEl.textContent = total.toLocaleString() + ' VND';

            // Cập nhật tổng cộng
            let totalAmount = 0;
            document.querySelectorAll('.quantity-input').forEach(input => {
                const qty = parseInt(input.value) || 0;
                const prc = parseFloat(input.dataset.price);
                totalAmount += qty * prc;
            });
            totalAmountEl.textContent = totalAmount.toLocaleString() + ' VND';

            // Cập nhật tổng thanh toán
            totalDueEl.textContent = (totalAmount - discount).toLocaleString() + ' VND';
        });
    });
</script>

<?php include 'footer.php'; ?>
    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
