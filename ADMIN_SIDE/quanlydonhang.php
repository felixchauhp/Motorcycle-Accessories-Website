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
<body>
    <main class="main">
        <section class="wishlist section--lg container">
        <div class="search-container">
        <form method="GET" action="quanlydonhang.php" class="right-actions">
          <input type="text" id="search-input" name="search" placeholder="Tìm kiếm..." value="<?= htmlspecialchars($search) ?>" />
          <input type="date" id="start-date" name="start_date" value="<?= htmlspecialchars($startDate) ?>"
            style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 180px; box-sizing: border-box; margin-left: 10px; margin-right: 10px;">
          <input type="date" id="end-date" name="end_date" value="<?= htmlspecialchars($endDate) ?>"
            style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 180px; box-sizing: border-box; margin-left: 10px; margin-right: 10px;">
          
          <button type="submit" class="btn flex btn__md" style="cursor: pointer;">Áp dụng</button>
          <a href="quanlydonhang.php" class="btn flex btn__md">Nhập lại</a>
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
                                <select id="status" onchange="removeSelectedOption()">
                                    <option value="">-- Chọn trạng thái --</option>
                                    <option value="confirmed">Đã xác nhận</option>
                                    <option value="packed">Đã đóng gói</option>
                                    <option value="delivered">Đã giao</option>
                                    <option value="canceled">Đã hủy</option>
                                </select>
                    
                                <script>
                                    function removeSelectedOption() {
                                        const select = document.getElementById("status");
                                        const selectedIndex = select.selectedIndex;
                            
                                        if (selectedIndex > 0) { // Bỏ qua option đầu tiên
                                            select.options[selectedIndex].disabled = true; // Loại bỏ option đã chọn
                                        }
                                    }
                                </script>
                    </td>
                    <td>
                        <i class="fi fi-rs-trash table__trash"></i>
                        <!-- Nút In -->
                        <button onclick="window.print()">
                            <i class="fi fi-rs-print table__trash"></i>
                        </button>
                        <!-- Nút hiển thị chi tiết đơn hàng -->
                        <a href="show-order.php?OrderID=<?= urlencode($order['OrderID']); ?>">
                            <i class="fi fi-rs-menu-dots table__trash"></i>
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
    
    // Lưu trữ các tham số lọc trong một mảng để tạo query string
    $queryParams = [
        'search' => $search,
        'start_date' => $startDate,
        'end_date' => $endDate,
    ];
    
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
          </section>
  </main>
  <!--=============== FOOTER ===============-->
  <?php include 'footer.php'; ?>
</body>
</html>