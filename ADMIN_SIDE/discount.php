<?php
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
                <div class="right-actions">
                    <input type="text" id="search-input" placeholder="Tìm kiếm...">
                    <select id="filter-input">
                        <option value="" disabled selected>Lọc...</option>
                    </select>
                    <button id="apply-button" class="btn flex btn__md">Áp dụng</button>
                    <button id="reset-button" class="btn flex btn__md">Nhập lại</button>
                </div>
            </div>
            <table class="discount-table">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Code</th>
                        <th>Số lượng</th>
                        <th>Phần trăm (%)</th>
                        <th>Giá trị đơn hàng tối thiểu</th>
                        <th>Số tiền giảm tối đa</th>
                        <th>Bắt đầu</th>
                        <th>Kết thúc</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Hiển thị danh sách sản phẩm -->
                    <?php foreach ($promotions as $promo): ?>
                        <tr>
                            <td><?= htmlspecialchars($promo['PromoName']) ?></td>
                            <td><?= htmlspecialchars($promo['PromoCode']) ?></td>
                            <td><?= htmlspecialchars($promo['Quantity']) ?></td>
                            <td><?= htmlspecialchars($promo['PromoRate']) ?></td>
                            <td><?= htmlspecialchars($promo['MinValue']) ?></td>
                            <td><?= htmlspecialchars($promo['MaxAmount']) ?></td>
                            <td><?= htmlspecialchars($promo['StartDate']) ?></td>
                            <td><?= htmlspecialchars($promo['EndDate']) ?></td>
                            <td>
                                <a href="#" class="delete-btn" data-code="<?= htmlspecialchars($promo['PromoCode']) ?>">
                                    <i class="fi fi-rs-trash table__trash"></i>
                                </a>
                                <a href="update-Discount.php?promoCode=<?= urlencode($promo['PromoCode']) ?>" class="edit-btn">
                                    <i class="fi fi-rs-edit table__trash"></i>
                                </a>
                                <a href="show-discount.php?promoCode=<?= urlencode($promo['PromoCode']) ?>" class="menu-btn">
                                    <i class="fi fi-rs-menu-dots table__trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

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
