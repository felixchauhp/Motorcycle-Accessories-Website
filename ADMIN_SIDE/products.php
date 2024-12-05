<?php
session_start();
include 'checklogin.php';
include 'db_connection.php';

?>
!<!DOCTYPE html>
<html lang="en">
 <!--=============== HEAD ===============-->
 <?php include 'head.php'; ?>
<body>
  <!--=============== HEADER ===============-->
  <?php include 'header.php'; ?>
   <!--=============== MAIN ===============-->
  <main class="main">
    <section class="products section--lg container">
        <div class="search-container">
            <a href="add-Product.php" class="btn flex btn__md">
                <i class="fi fi-rs-plus"></i> Thêm 1 sản phẩm mới
            </a>
            <form method="GET" action="products.php" class="right-actions">
                <input type="text" id="search-input" name="search" placeholder="Tìm kiếm..." value="<?= htmlspecialchars($search) ?>" />
                <select id="filter-input" name="filter" style="font-family: inherit; font-size: inherit;">
                    <option value="" <?= !isset($_GET['filter']) ? 'selected' : '' ?>>Tất cả trạng thái</option>
                    <option value="Ắc quy" <?= isset($_GET['filter']) && $_GET['filter'] === 'Ắc quy' ? 'selected' : '' ?>>Ắc quy</option>
                    <option value="Bạc đạn" <?= isset($_GET['filter']) && $_GET['filter'] === 'Bạc đạn' ? 'selected' : '' ?>>Bạc đạn</option>   
                    <option value="Bố đĩa và bố thắng" <?= isset($_GET['filter']) && $_GET['filter'] === 'Bố đĩa và bố thắng' ? 'selected' : '' ?>>Bố đĩa và bố thắng</option>
                    <option value="Nhông sên dĩa" <?= isset($_GET['filter']) && $_GET['filter'] === 'Nhông sên dĩa' ? 'selected' : '' ?>>Nhông sên dĩa</option>
                    <option value="Nhớt" <?= isset($_GET['filter']) && $_GET['filter'] === 'Nhớt' ? 'selected' : '' ?>>Nhớt</option>
                    <option value="Vỏ xe và ruột xe" <?= isset($_GET['filter']) && $_GET['filter'] === 'Vỏ xe và ruột xe' ? 'selected' : '' ?>>Vỏ xe và ruột xe</option>
                    <option value="Các phụ kiện khác" <?= isset($_GET['filter']) && $_GET['filter'] === 'Các phụ kiện khác' ? 'selected' : '' ?>>Các phụ kiện khác</option>
                </select>
                <button type="submit" class="btn flex btn__md" style="cursor: pointer; ">Áp dụng</button>
                <a href="products.php" class="btn flex btn__md" style="cursor: pointer;  ">Nhập lại</a>
            </form>
        </div>

            <table class="product-table">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Danh mục</th>
                        <th>Tồn kho</th>
                        <th>Giá gốc (VND)</th>
                        <th>Giá bán (VND)</th>
                        <th>Ghi chú</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Hiển thị danh sách sản phẩm -->
                    <?php if (empty($products)): ?>
                    <tr>
                        <td colspan="9" style="text-align: center; padding: 20px; font-weight: bold; color: #888;">
                            Không có sản phẩm tồn tại.
                        </td>
                    </tr>
                  <?php else: ?>
                    <?php
                    foreach ($products as $product) {
                        $productCategory = $product['Category'] ? $product['Category'] : 'N/A';
                    ?>
                    <tr>
                        <td>
                            <?php if (!empty($product['Image'])): ?>
                                <img src="<?= htmlspecialchars($product['Image']) ?>" alt="Product Image" style="max-width: 100px; max-height: 100px;">
                            <?php else: ?>
                                <span>Không có ảnh</span>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($product['ProductID']) ?></td>
                        <td><?= htmlspecialchars($product['ProductName']) ?></td>
                        <td><?= htmlspecialchars($productCategory) ?></td>
                        <td><?= htmlspecialchars($product['InStock']) ?></td>
                        <td><?= number_format($product['BasePrice'], 0, ',', '.'); ?></td>
                        <td><?= number_format($product['SalePrice'], 0, ',', '.'); ?></td>
                        <td><?= htmlspecialchars($product['Notes']) ?></td>
                        <td>
                            <!-- Nút chỉnh sửa -->
                            <a href="edit-product.php?product-id=<?= $product['ProductID'] ?>"><i class="fi fi-rs-edit edit-icon"></i></a>
                            
                            <!-- Nút xem chi tiết -->
                            <a href="../CLIENT_SIDE/details.php?id=<?= urlencode($product['ProductID']) ?>"><i class="fi fi-rs-menu-dots go-to-icon"></i></a>
                            
                            <!-- Nút xóa -->
                            <a href="#" class="delete-btn" data-code="<?= htmlspecialchars($product['ProductID']) ?>">
                                <i class="fi fi-rs-trash table__trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php endif; ?>
                </tbody>
            </table> 
    <ul class="pagination">
    <?php
      // Lấy toàn bộ tham số GET hiện tại và loại bỏ tham số `page`
      $queryParams = $_GET;
      unset($queryParams['page']);

      // Xây dựng URL cơ sở cho phân trang
      $baseUrl = 'products.php?' . http_build_query($queryParams);
      ?>
    <!-- Nút trang trước -->
    <?php if ($currentPage > 1): ?>
        <li><a href="<?= $baseUrl . '&page=' . ($currentPage - 1) ?>" class="pagination__link">«</a></li>
    <?php else: ?>
        <li><a href="#" class="pagination__link disabled">«</a></li>
    <?php endif; ?>

    <!-- Các số trang -->
    <?php
    if ($currentPage > 3) {
        echo '<li><a href="' . $baseUrl . '&page=1" class="pagination__link">1</a></li>';
        if ($currentPage > 4) echo '<li class="pagination__dots">...</li>';
    }

    for ($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++) {
        echo '<li><a href="' . $baseUrl . '&page=' . $i . '" class="pagination__link ' . ($i == $currentPage ? 'active' : '') . '">' . $i . '</a></li>';
    }

    if ($currentPage < $totalPages - 2) {
        if ($currentPage < $totalPages - 3) echo '<li class="pagination__dots">...</li>';
        echo '<li><a href="' . $baseUrl . '&page=' . $totalPages . '" class="pagination__link">' . $totalPages . '</a></li>';
    }
    ?>

    <!-- Nút trang tiếp -->
    <?php if ($currentPage < $totalPages): ?>
        <li><a href="<?= $baseUrl . '&page=' . ($currentPage + 1) ?>" class="pagination__link">»</a></li>
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
    <script src="assets/js/main.js"></script>
</body>
</html>
