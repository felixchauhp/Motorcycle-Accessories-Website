<?php
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
 <!--=============== HEAD ===============-->
 <?php include 'head.php'; ?>
<body>
  <!--=============== HEADER ===============-->
  <?php include 'header.php'; ?>
    <!--=============== ORDER ===============-->   
    <main class="main">
        <section class="wishlist section--lg container">
        <div class="search-container">
        <form method="GET" action="quanlydonhang.php" class="right-actions">
          <input type="text" id="search-input" name="search" placeholder="Tìm kiếm..." value="<?= htmlspecialchars($search) ?>" />
          <!-- Lọc trạng thái -->
    <select id="status-filter" name="status" style="font-family: inherit; font-size: inherit;">
        <option value="" <?= !isset($_GET['status']) ? 'selected' : '' ?>>Tất cả trạng thái</option>
        <option value="Đã xác nhận" <?= isset($_GET['status']) && $_GET['status'] === 'Đã xác nhận' ? 'selected' : '' ?>>Đã xác nhận</option>
        <option value="Đã đóng gói" <?= isset($_GET['status']) && $_GET['status'] === 'Đã đóng gói' ? 'selected' : '' ?>>Đã đóng gói</option>
        <option value="Đã giao" <?= isset($_GET['status']) && $_GET['status'] === 'Đã giao' ? 'selected' : '' ?>>Đã giao</option>
        <option value="Đã hủy" <?= isset($_GET['status']) && $_GET['status'] === 'Đã hủy' ? 'selected' : '' ?>>Đã hủy</option>
    </select>

    <!-- Lọc thanh toán -->
    <select id="payment-filter" name="payment" style="font-family: inherit; font-size: inherit;">
        <option value="" <?= !isset($_GET['payment']) ? 'selected' : '' ?>>Tất cả thanh toán</option>
        <option value="Thành công" <?= isset($_GET['payment']) && $_GET['payment'] === 'Thành công' ? 'selected' : '' ?>>Thành công</option>
        <option value="Thất bại" <?= isset($_GET['payment']) && $_GET['payment'] === 'Thất bại' ? 'selected' : '' ?>>Thất bại</option>
        <option value="Đang chờ" <?= isset($_GET['payment']) && $_GET['payment'] === 'Đang chờ' ? 'selected' : '' ?>>Đang chờ</option>
    </select>
          <input type="date" id="start-date" name="start_date" value="<?= htmlspecialchars($startDate) ?>"
            style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 180px; box-sizing: border-box; margin-left: 10px; margin-right: 10px;">
          <input type="date" id="end-date" name="end_date" value="<?= htmlspecialchars($endDate) ?>"
            style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 180px; box-sizing: border-box; margin-left: 10px; margin-right: 10px;">
          
          <button type="submit" class="btn flex btn__md" style="cursor: pointer; width: 155px; ">Áp dụng</button>
          <a href="quanlydonhang.php" class="btn flex btn__md" style="cursor: pointer; width: 150px; ">Nhập lại</a>
        </form>
      </div>
              <table class="product-table">
                <thead>
                  <tr>
                    <th>Mã đơn hàng</th>
                    <th>Mã khách hàng</th>
                    <th>Thành tiền</th>
                    <th>Ngày tạo đơn</th>
                    <th>Trạng thái</th>
                    <th>Thanh toán</th>
                    <th>Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($orders)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 20px; font-weight: bold; color: #888;">
                            Không có đơn hàng tồn tại.
                        </td>
                    </tr>
                  <?php else: ?>
                  <?php foreach ($orders as $order): ?>
                  <tr>  
                  <td>
                            <?= htmlspecialchars($order['OrderID']) ?>
                  </td>  
                  <td>
                              <?= htmlspecialchars($order['CustomerID']) ?>
                  </td>
                    <td>
                              <?= htmlspecialchars($order['TotalDue']) ?>
                    </td>
                    <td>
                              <?= htmlspecialchars($order['OrderDate']) ?>
                    </td>
                    <td>
                              <?= htmlspecialchars($order['OrderStatus']) ?>
                    </td>      
                    <td>
                              <?= htmlspecialchars($order['PaymentStatus']) ?>
                    </td>        
                    <td>
                        <!-- Nút In -->
                        <a href="bill-order.php?OrderID=<?= urlencode($order['OrderID']); ?>" target="_blank">
                            <i class="fi fi-rs-print table__trash"></i>
                        </a>
                        <a href="edit-order.php?OrderID=<?= urlencode($order['OrderID']) ?>" class="edit-btn">
                            <i class="fi fi-rs-edit table__trash"></i>
                        </a>
                        <!-- Nút hiển thị chi tiết đơn hàng -->
                        <a href="show-order.php?OrderID=<?= urlencode($order['OrderID']); ?>">
                            <i class="fi fi-rs-menu-dots table__trash"></i>
                        </a>
                        <a href="#" class="delete-btn" data-code="<?= htmlspecialchars($order['OrderID']) ?>">
                            <i class="fi fi-rs-trash table__trash"></i>
                        </a>
                    </td>

                    </tr>
                    <?php endforeach; ?>                    
                  <?php endif; ?>
                </tbody>
              </table>
              <ul class="pagination">
    <?php
    // Lấy tham số lọc từ GET
    $search = $_GET['search'] ?? '';
    $startDate = $_GET['start_date'] ?? '';
    $endDate = $_GET['end_date'] ?? '';
    $statusFilter = $_GET['status'] ?? '';
    $paymentFilter = $_GET['payment'] ?? '';

    // Lưu trữ các tham số lọc trong một mảng để tạo query string
    $queryParams = [
        'search' => $search,
        'start_date' => $startDate,
        'end_date' => $endDate,
        'status' => $statusFilter,
        'payment' => $paymentFilter,
    ];

    // Loại bỏ các tham số trống để tránh thêm các giá trị không cần thiết vào URL
    $queryParams = array_filter($queryParams, function($value) {
        return $value !== '';
    });

    // Cơ sở URL phân trang (có các tham số lọc)
    $baseUrl = 'quanlydonhang.php?' . http_build_query($queryParams);
    ?>


    <!-- Phân trang: Trang trước -->
    <?php if ($currentPage > 1): ?>
        <li><a href="<?= $baseUrl ?>&page=<?= $currentPage - 1 ?>" class="pagination__link">«</a></li>
    <?php else: ?>
        <li><a href="#" class="pagination__link disabled">«</a></li>
    <?php endif; ?>

    <!-- Hiển thị số trang -->
    <?php
    if ($currentPage > 3) {
        echo '<li><a href="' . $baseUrl . '&page=1" class="pagination__link">1</a></li>';
        if ($currentPage > 4) echo '<li class="pagination__dots">...</li>';
    }

    for ($i = max(1, $currentPage - 2); $i <= min($totalOrderPages, $currentPage + 2); $i++) {
        echo '<li><a href="' . $baseUrl . '&page=' . $i . '" class="pagination__link ' . ($i == $currentPage ? 'active' : '') . '">' . $i . '</a></li>';
    }

    if ($currentPage < $totalOrderPages - 2) {
        if ($currentPage < $totalOrderPages - 3) echo '<li class="pagination__dots">...</li>';
        echo '<li><a href="' . $baseUrl . '&page=' . $totalOrderPages . '" class="pagination__link">' . $totalOrderPages . '</a></li>';
    }
    ?>

    <!-- Phân trang: Trang sau -->
    <?php if ($currentPage < $totalOrderPages): ?>
        <li><a href="<?= $baseUrl ?>&page=<?= $currentPage + 1 ?>" class="pagination__link">»</a></li>
    <?php else: ?>
        <li><a href="#" class="pagination__link disabled">»</a></li>
    <?php endif; ?>
</ul>

</div>
            <!-- Popup xác nhận xóa -->
            <div id="confirmDelete" style="display:none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5); z-index: 9999; display: none;">
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <p>Bạn có chắc chắn muốn xóa đơn hàng này?</p>
                    <button type="submit" class="btn btn__md" id="confirmDeleteBtn" >Xóa</button>
                    <button type="submit" class="btn btn__md" id="cancelDeleteBtn" >Hủy</button>
                </div>
            </div>
            <!-- JavaScript để xử lý popup xác nhận -->
            <script>
                    document.addEventListener('DOMContentLoaded', function () {
                    const deleteButtons = document.querySelectorAll('.delete-btn');
                    const confirmDeletePopup = document.getElementById('confirmDelete');
                    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
                    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
                    let promoCodeToDelete = null;

                    deleteButtons.forEach(button => {
                        button.addEventListener('click', function(event) {
                            event.preventDefault();
                            promoCodeToDelete = button.getAttribute('data-code'); // Lấy PromoCode từ data attribute
                            confirmDeletePopup.style.display = 'block'; // Hiển thị popup
                        });
                    });

                    cancelDeleteBtn.addEventListener('click', function() {
                        confirmDeletePopup.style.display = 'none'; // Ẩn popup
                    });

                    confirmDeleteBtn.addEventListener('click', function() {
                        if (promoCodeToDelete) {
                            window.location.href = 'delete_discount.php?promo_code=' + promoCodeToDelete; // Chuyển hướng đến file PHP xử lý xóa
                        }
                    });
                });
            </script>
  </section>
  </main>
  <!--=============== FOOTER ===============-->
  <?php include 'footer.php'; ?>
</body>
</html>