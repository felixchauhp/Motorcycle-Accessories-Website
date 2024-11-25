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
  <body>
  <main class="main">
    <section class="products container section--lg">
        <div class="search-container">
            <a href="add-Product.php" class="btn flex btn__md">
                <i class="fi fi-rs-plus"></i> Thêm 1 sản phẩm mới
            </a>
            <form method="GET" action="productManage.php" class="right-actions">
                <input type="text" id="search-input" name="search" placeholder="Tìm kiếm..." value="<?= htmlspecialchars($search) ?>" />
                <select id="filter-input" name="filter" style="font-family: inherit; font-size: inherit; padding: 0.5em; border-radius: 5px;">
                    <option value="" <?= !$filter ? 'selected' : '' ?>>Tất cả</option>
                    <?php foreach ($categoryMapping as $key => $value): ?>
                        <option value="<?= $key ?>" <?= $filter == $key ? 'selected' : '' ?>><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn flex btn__md" style="cursor: pointer;">Áp dụng</button>
                <a href="productManage.php" class="btn flex btn__md">Nhập lại</a>
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
                        <td><?= htmlspecialchars($product['ProductID']) ?></td>
                        <td><?= htmlspecialchars($product['ProductID']) ?></td>
                        <td><?= htmlspecialchars($product['ProductName']) ?></td>
                        <td><?= htmlspecialchars($productCategory) ?></td>
                        <td><?= htmlspecialchars($product['InStock']) ?></td>
                        <td><?= htmlspecialchars($product['BasePrice']) ?></td>
                        <td><?= htmlspecialchars($product['SalePrice']) ?></td>
                        <td><?= htmlspecialchars($product['Notes']) ?></td>
                        <td>
                        <button onclick="editProduct('<?= $product['ProductID'] ?>')"><i class="fi fi-rs-edit edit-icon"></i></button>
                          <form action="productManage.php" method="POST" style="display: inline;">
                          <input type="hidden" name="product-id" value="<?= $product['ProductID'] ?>" />
                          <button type="submit" name="delete-product" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                          <i class="fi fi-rs-trash trash-icon"></i>
                        </button>
                    </form>
                            <button onclick="goToDetail('<?= $product['ProductID'] ?>')"><i class="fi fi-rs-menu-dots go-to-icon"></i></button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>    
          <ul class="pagination">
            <?php if ($currentPage > 1): ?>
              <li><a href="?page=<?= $currentPage - 1 ?>" class="pagination__link">«</a></li>
            <?php else: ?>
              <li><a href="#" class="pagination__link disabled">«</a></li>
            <?php endif; ?>
    
            <?php
            if ($currentPage > 3) {
              echo '<li><a href="?page=1" class="pagination__link">1</a></li>';
              if ($currentPage > 4) echo '<li class="pagination__dots">...</li>';
            }

            for ($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++) {
              echo '<li><a href="?page=' . $i . '" class="pagination__link ' . ($i == $currentPage ? 'active' : '') . '">' . $i . '</a></li>';
            }

            if ($currentPage < $totalPages - 2) {
              if ($currentPage < $totalPages - 3) echo '<li class="pagination__dots">...</li>';
              echo '<li><a href="?page=' . $totalPages . '" class="pagination__link">' . $totalPages . '</a></li>';
            }
            ?>
    
            <?php if ($currentPage < $totalPages): ?>
              <li><a href="?page=<?= $currentPage + 1 ?>" class="pagination__link">»</a></li>
            <?php else: ?>
              <li><a href="#" class="pagination__link disabled">»</a></li>
            <?php endif; ?>
        </ul>

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
