<?php
session_start();
include 'checklogin.php';
include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
 <!--=============== HEADER ===============-->
 <?php include 'head.php'; ?>
<body>
  <!--=============== HEADER ===============-->
  <?php include 'header.php'; ?>
    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== Promotion Management ===============-->
        <section class="products container section--lg">
            <div class="search-container">
                <a href="add-Discount.php" class="btn flex btn__md">
                    <i class="fi fi-rs-plus"></i> Thêm 1 mã khuyến mãi mới
                </a>
                <form method="GET" action="discount.php" class="right-actions">
                    <input type="text" id="search-input" name="search" placeholder="Tìm kiếm..." value="<?= htmlspecialchars($search) ?>" />
                    <input type="date" id="start-date" name="start_date" value="<?= htmlspecialchars($startDate) ?>">
                    <input type="date" id="end-date" name="end_date" value="<?= htmlspecialchars($endDate) ?>">
                        <button type="submit" class="btn flex btn__md" style="cursor: pointer;">Áp dụng</button>
                    <a href="discount.php" class="btn flex btn__md">Nhập lại</a>
                </form>
            </div>
            <table class="discount-table">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Code</th>
                        <th>Số lượng</th>
                        <th>Phần trăm (%)</th>
                        <th>Đơn hàng tối thiểu (VND)</th>
                        <th>Bắt đầu</th>
                        <th>Kết thúc</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
    <!-- Kiểm tra nếu không có khuyến mãi nào, hiển thị thông báo -->
    <?php if (empty($promotions)): ?>
        <tr>
            <td colspan="8" style="text-align: center; padding: 20px; font-weight: bold; color: #888;">
                Không có mã khuyến mãi tồn tại.
            </td>
        </tr>
    <?php else: ?>
        <!-- Hiển thị danh sách khuyến mãi -->
        <?php foreach ($promotions as $promo): ?>
            <tr>
                <td><?= htmlspecialchars($promo['PromoName']) ?></td>
                <td><?= htmlspecialchars($promo['PromoCode']) ?></td>
                <td><?= number_format($promo['Quantity'], 0, ',', '.'); ?></td>                <td><?= number_format($promo['PromoRate'], 0, ',', '.'); ?></td>
                <td><?= number_format($promo['MinValue'], 0, ',', '.'); ?></td>                
                <td><?= htmlspecialchars($promo['StartDate']) ?></td>
                <td><?= htmlspecialchars($promo['EndDate']) ?></td>
                <td>
                    <a href="edit-discount.php?promoCode=<?= urlencode($promo['PromoCode']) ?>" class="edit-btn">
                        <i class="fi fi-rs-edit table__trash"></i>
                    </a>
                    <a href="show-discount.php?promoCode=<?= urlencode($promo['PromoCode']) ?>" class="menu-btn">
                        <i class="fi fi-rs-menu-dots table__trash"></i>
                    </a>
                    <a href="#" class="delete-btn" data-code="<?= htmlspecialchars($promo['PromoCode']) ?>">
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
    $queryParams = [];
    if ($search) $queryParams['search'] = $search;
    if ($startDate) $queryParams['start_date'] = $startDate;
    if ($endDate) $queryParams['end_date'] = $endDate;
    
    // Thêm các tham số lọc vào URL phân trang
    $baseUrl = 'discount.php?' . http_build_query($queryParams);
    ?>

    <!-- Nếu là trang đầu tiên, không cho phép quay lại -->
    <?php if ($currentPage > 1): ?>
        <li><a href="<?= $baseUrl ?>&page=<?= $currentPage - 1 ?>" class="pagination__link">«</a></li>
    <?php else: ?>
        <li><a href="#" class="pagination__link disabled">«</a></li>
    <?php endif; ?>

    <?php
    if ($currentPage > 3) {
        echo '<li><a href="' . $baseUrl . '&page=1" class="pagination__link">1</a></li>';
        if ($currentPage > 4) echo '<li class="pagination__dots">...</li>';
    }

    for ($i = max(1, $currentPage - 2); $i <= min($totalPromotionPages, $currentPage + 2); $i++) {
        echo '<li><a href="' . $baseUrl . '&page=' . $i . '" class="pagination__link ' . ($i == $currentPage ? 'active' : '') . '">' . $i . '</a></li>';
    }

    if ($currentPage < $totalPromotionPages - 2) {
        if ($currentPage < $totalPromotionPages - 3) echo '<li class="pagination__dots">...</li>';
        echo '<li><a href="' . $baseUrl . '&page=' . $totalPromotionPages . '" class="pagination__link">' . $totalPromotionPages . '</a></li>';
    }
    ?>

    <!-- Nếu không phải trang cuối, cho phép đi tới trang kế tiếp -->
    <?php if ($currentPage < $totalPromotionPages): ?>
        <li><a href="<?= $baseUrl ?>&page=<?= $currentPage + 1 ?>" class="pagination__link">»</a></li>
    <?php else: ?>
        <li><a href="#" class="pagination__link disabled">»</a></li>
    <?php endif; ?>
</ul>

           <!-- Popup xác nhận xóa -->
          <div id="confirmDelete" style="display:none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5); z-index: 9999; display: none;">
              <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                  <p>Bạn có chắc chắn muốn xóa mã khuyến mãi này?</p>
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
    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>

</body>
</html>
