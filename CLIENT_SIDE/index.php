 <?php
session_start();
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
      <!--=============== HOME ===============-->
      <section class="home section--lg">
        <div class="home__container container grid">
          <div class="home__content">
            <span class="home__subtitle">Siêu ưu đãi Chào Đông</span>
            <h1 class="home__title">
              <span>FROZEN</span>
            </h1>
            <p class="home__description">
              THE BIGGEST SALE EVER - UP TO 59%
            </p>
            <a href="shop.html" class="btn">Mua ngay kẻo lỡ!</a>
          </div>
          <img src="assets/img/bannerindex3.png" class="home__img" alt="hats" />
        </div>
      </section>

      <!--=============== CATEGORIES ===============-->
      <?php include'category.php' ?>
      <!--=============== PRODUCTS ===============-->
      <section class="products container section">
      <div class="tab__btns">
    <a href="?featured=true">
        <span class="tab__btn <?= $featured ? 'active-tab' : '' ?>" data-target="#featured">Nổi bật</span>
    </a>
    <a href="?popular=true">
        <span class="tab__btn <?= $popular ? 'active-tab' : '' ?>" data-target="#popular">Yêu thích</span>
    </a>
</div>
        <div class="tab__items">
        <div class="tab__item active-tab" content id="featured">
  <div class="products__container grid">
  <?php foreach ($products as $product): ?>
<div class="product__item">
    <div class="product__banner">
        <a href="details.php?id=<?= htmlspecialchars($product['ProductID']) ?>" class="product__images" style="width: 100%; height: 300px; object-fit: cover;">
            <img
                src="<?= $product['Image'] ?>"
                alt="<?= $product['ProductName'] ?>"
                class="product__img default"
                style="max-width: 100%; object-fit: cover; width: 100%;"
            />
            <img
                src="<?= htmlspecialchars($product['Image']) ?>"
                alt="<?= $product['ProductName'] ?>"
                class="product__img hover"
            />
        </a>
        <div class="product__actions">
            <a href="#" class="action__btn" aria-label="Quick View">
                <i class="fi fi-rs-eye"></i>
            </a>
            <a href="#" class="action__btn" aria-label="Add to Wishlist">
                <i class="fi fi-rs-heart"></i>
            </a>
            <a href="#" class="action__btn" aria-label="Compare">
                <i class="fi fi-rs-shuffle"></i>
            </a>
        </div>
        <!-- Kiểm tra nếu sản phẩm thuộc danh sách nổi bật -->
        <?php if (in_array($product['ProductID'], $topInStockProducts)): ?>
            <div class="product__badge light-green">Nổi bật</div>
        <?php endif; ?>
        <?php if (in_array($product['ProductID'], $topInStockProducts2)): ?>
            <div class="product__badge light-pink">Yêu thích</div>
        <?php endif; ?>
    </div>
    <div class="product__content">
        <span class="product__category"><?= $product['Category'] ?></span>
        <a href="details.php?product_id=<?= $product['ProductID'] ?>">
            <h3 class="product__title"><?= $product['ProductName'] ?></h3>
        </a>
        <div class="product__rating">
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
            <i class="fi fi-rs-star"></i>
        </div>
        <div class="product__price flex">
            <span class="new__price"><?= number_format($product['SalePrice']) ?> VNĐ</span>
            <span class="old__price"><?= number_format($product['BasePrice']) ?> VNĐ</span>
        </div>
        <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
            <i class="fi fi-rs-shopping-bag-add"></i>
        </a>
    </div>
</div>
<?php endforeach; ?>
  </div>
</div>
</div>
<ul class="pagination">
    <?php
    // Cơ sở URL cho phân trang
    $queryParams = $_GET;
    unset($queryParams['page']);

    $baseUrl = 'index.php?' . http_build_query($queryParams);
    ?>
    <!-- Nút trang trước -->
    <?php  if ($currentPage > 1): ?>
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

      <!--=============== DEALS ===============-->
      <section class="deals section">
        <div class="deals__container container grid">
          <div class="deals__item">
            <div class="deals__group">
              <h3 class="deals__brand">Deal sốc tri ân</h3>
              <span class="deals__category">Đồng giá giới hạn</span>
            </div>
            <h4 class="deals__title">Dầu nhớt Honda cao cấp</h4>
            <div class="deals__price flex">
              <span class="new__price">99.000 VNĐ</span>
              <span class="old__price">200.000 VNĐ</span>
            </div>
            <div class="deals__group">
              <p class="deals__countdown-text">Mua ngay kẻo lỡ!</p>
              <div class="countdown">
                <div class="countdown__amount">
                  <p class="countdown__period">02</p>
                  <span class="unit">Ngày</span>
                </div>
                <div class="countdown__amount">
                  <p class="countdown__period">22</p>
                  <span class="unit">Giờ</span>
                </div>
                <div class="countdown__amount">
                  <p class="countdown__period">57</p>
                  <span class="unit">Phút</span>
                </div>
                <div class="countdown__amount">
                  <p class="countdown__period">28</p>
                  <span class="unit">Giây</span>
                </div>
              </div>
            </div>
            <div class="deals__btn">
              <a href="details.html" class="btn btn--md">Mua ngay</a>
            </div>
          </div>
          <div class="deals__item">
            <div class="deals__group">
              <h3 class="deals__brand">Deal sốc tri ân</h3>
              <span class="deals__category">Đồng giá giới hạn</span>
            </div>
            <h4 class="deals__title">Nón bảo hiểm Royal</h4>
            <div class="deals__price flex">
              <span class="new__price">499.000 VNĐ</span>
              <span class="old__price">999.999 VNĐ</span>
            </div>
            <div class="deals__group">
              <p class="deals__countdown-text">Mua ngay kẻo lỡ!</p>
              <div class="countdown">
                <div class="countdown__amount">
                  <p class="countdown__period">02</p>
                  <span class="unit">Ngày</span>
                </div>
                <div class="countdown__amount">
                  <p class="countdown__period">22</p>
                  <span class="unit">Giờ</span>
                </div>
                <div class="countdown__amount">
                  <p class="countdown__period">57</p>
                  <span class="unit">Phút</span>
                </div>
                <div class="countdown__amount">
                  <p class="countdown__period">28</p>
                  <span class="unit">Giây</span>
                </div>
              </div>
            </div>
            <div class="deals__btn">
              <a href="details.html" class="btn btn--md">Mua ngay</a>
            </div>
          </div>
        </div>
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
