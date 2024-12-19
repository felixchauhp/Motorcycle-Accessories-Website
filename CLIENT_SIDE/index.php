 <?php
session_start();
include 'db_connection index.php';
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
            <a href="shop.php" class="btn">Mua ngay kẻo lỡ!</a>
          </div>
          <img src="assets/img/bannerindex3.png" class="home__img" alt="hats" />
        </div>
      </section>

      <!--=============== CATEGORIES ===============-->
      <?php include'category.php' ?>
      <!--=============== PRODUCTS ===============-->
      <section class="products container section">
      <div class="tab__btns">
    <a href="?tab=featured">
        <span class="tab__btn <?= $activeTab == 'featured' ? 'active-tab' : '' ?>" data-target="#featured">Mới về</span>
    </a>
    <a href="?tab=popular">
        <span class="tab__btn <?= $activeTab == 'popular' ? 'active-tab' : '' ?>" data-target="#popular">Yêu thích</span>
    </a>
</div>

<div class="tab__items">
    <!-- Tab Nổi bật -->
    <div class="tab__item <?= $activeTab == 'featured' ? 'active-tab' : '' ?>" id="featured">
        <div class="products__container grid">
            <?php foreach ($products as $product): ?>
                <?php if (in_array($product['ProductID'], $topInStockProducts)): ?>
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
                            <div class="product__badge light-green">Mới về</div>
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
                            </div>
                            <a href="cart.php?action=add&ProductID=<?= htmlspecialchars($product['ProductID']) ?>" class="action__btn cart__btn" aria-label="Add To Cart">
                              <i class="fi fi-rs-shopping-bag-add"></i>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    

        <!-- Tab yêu thích -->
    <div class="tab__item <?= $activeTab == 'popular' ? 'active-tab' : '' ?>" id="popular">
        <div class="products__container grid">
            <?php foreach ($products as $product): ?>
                <?php if (in_array($product['ProductID'], $topInStockProducts2)): ?>
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
                            <div class="product__badge light-pink">Yêu thích</div>
                        </div>
                        <div class="product__content" style="max-width: 304px;">
                            <span class="product__category"><?= $product['Category'] ?></span>
                            <a href="details.php?product_id=<?= $product['ProductID'] ?>">
                                <h3 class="product__title" style="display: block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; "><?= $product['ProductName'] ?></h3>
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
                            </div>
                            <a href="cart.php?action=add&ProductID=<?= htmlspecialchars($product['ProductID']) ?>" class="action__btn cart__btn" aria-label="Add To Cart">
                              <i class="fi fi-rs-shopping-bag-add"></i>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
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
