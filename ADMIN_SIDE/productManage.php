<?php
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
    <section class="wishlist section--lg container">
        <div class="search-container">
            <a href="add-Product.php" class="btn flex btn__md">
                <i class="fi fi-rs-plus"></i> Thêm 1 sản phẩm mới
            </a>
            <form method="GET" action="productManage.php" class="right-actions">
                <input type="text" id="search-input" name="search" placeholder="Tìm kiếm..." value="<?= htmlspecialchars($search) ?>" />
                <select id="filter-input" name="filter" style="font-family: inherit; font-size: inherit;">
                    <option value="" <?= !$filter ? 'selected' : '' ?>>Tất cả danh mục</option>
                    <?php foreach ($categoryMapping as $key => $value): ?>
                        <option value="<?= $key ?>" <?= $filter == $key ? 'selected' : '' ?>><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn flex btn__md" style="cursor: pointer; ">Áp dụng</button>
                <a href="productManage.php" class="btn flex btn__md" style="cursor: pointer; ">Nhập lại</a>
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
                        <th>Giá gốc</th>
                        <th>Giá bán</th>
                        <th>Ghi chú</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Hiển thị danh sách sản phẩm -->
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
                        <td><?= htmlspecialchars($product['BasePrice']) ?></td>
                        <td><?= htmlspecialchars($product['SalePrice']) ?></td>
                        <td><?= htmlspecialchars($product['Notes']) ?></td>
                        <td>
                            <!-- Nút chỉnh sửa -->
                            <a href="edit-product.php?product-id=<?= $product['ProductID'] ?>"><i class="fi fi-rs-edit edit-icon"></i></a>
                            
                            <!-- Nút xem chi tiết -->
                            <a href="CLIENT_SIDE/details.php?product-id=<?= urlencode($product['ProductID']) ?>"><i class="fi fi-rs-menu-dots go-to-icon"></i></a>
                            
                            <!-- Nút xóa -->
                            <a href="#" class="delete-btn" data-code="<?= htmlspecialchars($product['ProductID']) ?>">
                                <i class="fi fi-rs-trash table__trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table> 
  <ul class="pagination">
    <?php
      // Lấy toàn bộ tham số GET hiện tại và loại bỏ tham số `page`
      $queryParams = $_GET;
      unset($queryParams['page']);

      // Xây dựng URL cơ sở cho phân trang
      $baseUrl = 'productManage.php?' . http_build_query($queryParams);
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

        <div id="overlay" class="overlay"></div>
<div id="productForm" class="modal">
    <h2>Chỉnh sửa thông tin sản phẩm</h2>
    <form id="save-product" method="POST">
        <input type="hidden" id="product-id" name="product-id" />

        <label for="product-name">Tên sản phẩm:</label>
        <input type="text" id="product-name" name="product-name" required />

        <label for="product-supplier">Nhà cung cấp:</label>
        <input type="text" id="product-supplier" name="product-supplier" required />

        <label for="product-category">Danh mục:</label>
        <select id="product-category" name="product-category" required>
            <option value="vo-xe-ruot-xe">Vỏ xe và ruột xe</option>
            <option value="nhong-sen-dia">Nhông sên dĩa</option>
            <option value="bac-dan">Bạc đạn</option>
            <option value="nhot">Nhớt</option>
            <option value="ac-quy">Ắc quy</option>
            <option value="bo-dia-bo-thang">Bố đĩa và bố thắng</option>
            <option value="phu-kien-khac">Các phụ kiện khác</option>
        </select>

        <label for="product-quantity">Tồn kho:</label>
        <input type="number" id="product-quantity" name="product-quantity" required />

        <label for="product-price">Giá bán:</label>
        <input type="number" id="product-price" name="product-price" required />

        <label for="product-note">Ghi chú:</label>
        <textarea id="product-note" name="product-note" required></textarea>

        <button type="submit">Lưu</button>
    </form>
</div>

        </div>
    </main>
    

   
    
   <!--=============== FOOTER ===============-->
  <?php include 'footer.php'; ?>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</body>
</html>
