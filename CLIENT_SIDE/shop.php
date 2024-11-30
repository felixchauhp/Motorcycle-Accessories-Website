<?php
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
  <!--=============== DOCUMENT HEAD ===============-->
  <?php include 'head.php'; ?>

<body>
<div id="snow-container"></div>
<script src="snow.js"></script>
<script>window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{ready:function(){}}</script><script id="zsiqscript" src="https://salesiq.zohopublic.com/widget?wc=siq2a126d8e3efac1df3644686aad71544687ff5251fc8a8c1812c388df1999baf7" defer></script>
   <!--=============== HEADER ===============-->
    <?php include 'header.php'; ?>
    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== BREADCRUMB ===============-->
      <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
          <li><a href="index.php" class="breadcrumb__link">Trang chủ</a></li>
          <li><span class="breadcrumb__link">></span></li>
          <li><span class="breadcrumb__link">Sản phẩm</span></li>
        </ul>
      </section>

      <!--=============== CATEGORIES ===============-->
      <section class="categories container section">
        <h3 class="section__title"><span>Danh mục</span> Sản phẩm</h3>
        <div class="categories__container swiper">
          <div class="swiper-wrapper" style ="height: 280px;">
            <a href="shop.php" class="category__item swiper-slide">
              <img
                src="assets/img/cat1.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Nhớt</h3>
            </a>
            <a href="shop.html" class="category__item swiper-slide">
              <img
                src="assets/img/cat2.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Lốp xe</h3>
            </a>
            <a href="shop.html" class="category__item swiper-slide">
              <img
                src="assets/img/cat3.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Gương</h3>
            </a>
            <a href="shop.html" class="category__item swiper-slide">
              <img
                src="assets/img/cat4.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Nón bảo hiểm</h3>
            </a>
            <a href="shop.html" class="category__item swiper-slide">
              <img
                src="assets/img/cat5.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Đồ chơi xe</h3>
            </a>
            <a href="shop.html" class="category__item swiper-slide">
              <img
                src="assets/img/cat6.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Phụ tùng khác</h3>
            </a>
            <a href="shop.html" class="category__item swiper-slide">
              <img
                src="assets/img/cat7.jpg"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Decal</h3>
            </a>
            <a href="shop.html" class="category__item swiper-slide">
              <img
                src="assets/img/cat8.png"
                alt=""
                class="category__img"
              />
              <h3 class="category__title">Dịch vụ bão dưỡng</h3>
            </a>
          </div>

          <div class="swiper-button-prev">
            <i class="fi fi-rs-angle-left"></i>
          </div>
          <div class="swiper-button-next">
            <i class="fi fi-rs-angle-right"></i>
          </div>
        </div>
      </section>
      <!--=============== PRODUCTS ===============-->
      <section class="products container section--lg">
        <div class="products__container grid">
        <?php if (empty($products)): ?>
            <p> Không tồn tại sản phẩm bạn đang tìm</p>
        <?php else: ?>
        <?php foreach ($products as $productlist):?>
            <div class="product__item">
              <div class="product__banner">
              <a href="details.php" class="product__images">
                <img
                  src="<?=  htmlspecialchars($productlist['Image']) ?>"
                  alt="Product Image"
                  class="product__img default"
                />
                <img
                  src="<?=  htmlspecialchars($productlist['Image']) ?>"
                  alt="Product Image"
                  class="product__img hover"
                />
              </a>

            </div>
            <div class="product__content">
              <span class="product__category"><?= htmlspecialchars($productlist['Category']) ?></span>
              <a href="details.php?id=<?= htmlspecialchars($productlist['ProductID']) ?>">
                <h3 class="product__title"><?= htmlspecialchars($productlist['ProductName']) ?></h3>
              </a>
              <div class="product__price flex">
                <span class="new__price"><?= htmlspecialchars($productlist['SalePrice']) ?> VNĐ</span>
              </div>
              <a
                href="#"
                class="action__btn cart__btn"
                aria-label="Add To Cart"
              >
                <i class="fi fi-rs-shopping-bag-add"></i>
              </a>
            </div>
          </div>  
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

        <ul class="pagination">
    <?php
    // Cơ sở URL cho phân trang
    $queryParams = [];
    if ($search_input) $queryParams['search_input'] = $search_input;
    $baseUrl = 'shop.php?' . http_build_query($queryParams);

    // Nút "trang trước"
    if ($currentPage > 1): ?>
        <li><a href="<?= $baseUrl ?>&page=<?= $currentPage - 1 ?>" class="pagination__link">«</a></li>
    <?php else: ?>
        <li><a href="#" class="pagination__link disabled">«</a></li>
    <?php endif; ?>

    <?php
    // Hiển thị các trang xung quanh trang hiện tại
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            echo "<li><a href='#' class='pagination__link active'>$i</a></li>";
        } elseif ($i <= 2 || $i > $totalPages - 2 || abs($i - $currentPage) <= 2) {
            echo "<li><a href='{$baseUrl}&page=$i' class='pagination__link'>$i</a></li>";
        } elseif ($i == 3 || $i == $totalPages - 2) {
            echo "<li class='pagination__dots'>...</li>";
        }
    }
    ?>

    <!-- Nút "trang sau" -->
    <?php if ($currentPage < $totalPages): ?>
        <li><a href="<?= $baseUrl ?>&page=<?= $currentPage + 1 ?>" class="pagination__link">»</a></li>
    <?php else: ?>
        <li><a href="#" class="pagination__link disabled">»</a></li>
    <?php endif; ?>
</ul>
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