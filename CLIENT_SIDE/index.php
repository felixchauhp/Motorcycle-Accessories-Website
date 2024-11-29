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
      <section class="categories container section">
        <h3 class="section__title"><span>Danh mục</span> Sản phẩm</h3>
        <div class="categories__container swiper">
          <div class="swiper-wrapper">
            <a href="shop.html" class="category__item swiper-slide">
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
      <section class="products container section">
        <div class="tab__btns">
          <span class="tab__btn active-tab" data-target="#featured"
            >Nổi bật</span
          >
          <span class="tab__btn" data-target="#popular">Yêu thích</span>
          <span class="tab__btn" data-target="#new-added">Mới về</span>
        </div>

        <div class="tab__items">
          <div class="tab__item active-tab" content id="featured">
            <div class="products__container grid">
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-1-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-1-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-pink">Hot</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-2-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-2-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-green">Hot</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-3-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-3-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-orange">Hot</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-4-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-4-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-blue">Hot</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-5-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-5-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-blue">-30%</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-6-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-6-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-blue">-22%</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-7-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-7-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-green">-22%</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-8-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-8-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
            </div>
          </div>
          <div class="tab__item" content id="popular">
            <div class="products__container grid">
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-9-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-9-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-pink">Hot</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-2-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-2-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-green">Hot</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-10-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-10-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-orange">Hot</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-4-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-4-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-blue">Hot</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-5-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-5-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-blue">-30%</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-11-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-11-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-blue">-22%</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-7-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-7-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-green">-22%</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-8-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-8-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
            </div>
          </div>
          <div class="tab__item" content id="new-added">
            <div class="products__container grid">
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-1-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-1-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-pink">Hot</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-12-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-12-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-green">Hot</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-13-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-13-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-orange">Hot</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-4-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-4-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-blue">Hot</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-10-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-10-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-blue">-30%</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-6-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-6-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-blue">-22%</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-9-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-9-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                  <div class="product__badge light-green">-22%</div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.php" class="product__images">
                    <img
                      src="assets/img/product-8-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-8-2.jpg"
                      alt=""
                      class="product__img hover"
                    />
                  </a>
                  <div class="product__actions">
                    <a href="#" class="action__btn" aria-label="Quick View">
                      <i class="fi fi-rs-eye"></i>
                    </a>
                    <a
                      href="#"
                      class="action__btn"
                      aria-label="Add to Wishlist"
                    >
                      <i class="fi fi-rs-heart"></i>
                    </a>
                    <a href="#" class="action__btn" aria-label="Compare">
                      <i class="fi fi-rs-shuffle"></i>
                    </a>
                  </div>
                </div>
                <div class="product__content">
                  <span class="product__category">Phụ kiện khác</span>
                  <a href="details.php">
                    <h3 class="product__title">Tên Sản Phẩm</h3>
                  </a>
                  <div class="product__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <div class="product__price flex">
                    <span class="new__price">999.999 VNĐ</span>
                    <span class="old__price">1.000.000 VNĐ</span>
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
            </div>
          </div>
        </div>
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
              <a href="details.php" class="btn btn--md">Mua ngay</a>
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
              <a href="details.php" class="btn btn--md">Mua ngay</a>
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
