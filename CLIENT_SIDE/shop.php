<!DOCTYPE html>
<html lang="en">
  <!--=============== DOCUMENT HEAD ===============-->
  <?php include 'head.php'; ?>

<body>
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
      <section class="products container section--lg">
        <p class="total__products">Đã tìm thấy <span>90</span> sản phẩm bạn đang cần</p>
        <div class="products__container grid">
          <div class="product__item">
            <div class="product__banner">
              <a href="details.html" class="product__images">
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
              <a href="details.html">
                <h3 class="product__title">Sản phẩm</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">999.000 VNĐ</span>
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
              <a href="details.html" class="product__images">
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
              <a href="details.html">
                <h3 class="product__title">Sản phẩm</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">999.000 VNĐ</span>
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
              <a href="details.html" class="product__images">
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
              <a href="details.html">
                <h3 class="product__title">Sản phẩm</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">999.000 VNĐ</span>
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
              <a href="details.html" class="product__images">
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
              <a href="details.html">
                <h3 class="product__title">Sản phẩm</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">999.000 VNĐ</span>
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
              <a href="details.html" class="product__images">
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
              <a href="details.html">
                <h3 class="product__title">Sản phẩm</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">999.000 VNĐ</span>
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
              <a href="details.html" class="product__images">
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
              <a href="details.html">
                <h3 class="product__title">Sản phẩm</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">999.000 VNĐ</span>
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
              <a href="details.html" class="product__images">
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
              <a href="details.html">
                <h3 class="product__title">Sản phẩm</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">999.000 VNĐ</span>
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
              <a href="details.html" class="product__images">
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
              <a href="details.html">
                <h3 class="product__title">Sản phẩm</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">999.000 VNĐ</span>
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
              <a href="details.html" class="product__images">
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
              <a href="details.html">
                <h3 class="product__title">Sản phẩm</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">999.000 VNĐ</span>
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
              <a href="details.html" class="product__images">
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
              <a href="details.html">
                <h3 class="product__title">Sản phẩm</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">999.000 VNĐ</span>
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
              <a href="details.html" class="product__images">
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
              <div class="product__badge light-green">-22%</div>
            </div>
            <div class="product__content">
              <span class="product__category">Phụ kiện khác</span>
              <a href="details.html">
                <h3 class="product__title">Sản phẩm</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">999.000 VNĐ</span>
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
              <a href="details.html" class="product__images">
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
            </div>
            <div class="product__content">
              <span class="product__category">Phụ kiện khác</span>
              <a href="details.html">
                <h3 class="product__title">Sản phẩm</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">999.000 VNĐ</span>
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
        <ul class="pagination">
          <li><a href="#" class="pagination__link active">01</a></li>
          <li><a href="#" class="pagination__link">02</a></li>
          <li><a href="#" class="pagination__link">03</a></li>
          <li><a href="#" class="pagination__link">...</a></li>
          <li><a href="#" class="pagination__link">16</a></li>
          <li><a href="#" class="pagination__link icon">
            <i class="fi-rs-angle-double-small-right"></i>
          </a></li>
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