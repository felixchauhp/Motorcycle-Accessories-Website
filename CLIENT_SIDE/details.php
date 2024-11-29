<!DOCTYPE html>
<html lang="en">
  <!--=============== DOCUMENT HEAD ===============-->
  <?php include 'head.php'; ?>

<body>
   <!--=============== HEADER ===============-->
   <?php include 'header.php'; ?>

    <!--=============== MAIN ===============-->
    <main class="main">

      <!--=============== DETAILS ===============-->
      <section class="details section--lg">
        <div class="details__container container grid">
          <div class="details__group">
            <img
              src="https://product.hstatic.net/200000287255/product/ac_quy_gs_gt9a_12v-9ah_8cee7263e49b47f3bd28188e961bda47_master.png"
              alt=""
              class="details__img"
            />
          </div>
          <div class="details__group">
            <h3 class="details__title">Tên sản phẩm</h3>
            <p class="details__brand">Danh mục: <span>bình điện</span></p>
            <div class="details__price flex">
              <span class="new__price">900.000 VNĐ</span>
              <span class="old__price">1.000.000 VNĐ</span>
              <span class="save__price">Flash sale</span>
            </div>
            <p class="short__description">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Voluptate, fuga. Quo blanditiis recusandae facere nobis cum optio,
              inventore aperiam placeat, quis maxime nam officiis illum? Optio
              et nisi eius, inventore impedit ratione sunt, cumque, eligendi
              asperiores iste porro non error?
            </p>
            <ul class="products__list">
              <li class="list__item flex">
                <i class="fi-rs-crown"></i> Chính sách bảo hành: 6 tháng nếu có hư hỏng do nhà sản xuất.
              </li>
              <li class="list__item flex">
                <i class="fi-rs-refresh"></i> 3 ngày đổi trả.
              </li>
              <li class="list__item flex">
                <i class="fi-rs-credit-card"></i> Nhận hàng, kiểm tra hàng và thanh toán
              </li>
            </ul>
            <div class="details__action">
              <input type="number" class="quantity" value="3" />
              <a href="#" class="btn btn--sm">Thêm vào giỏ hàng</a>
            </div>
            <ul class="details__meta">
              <li class="meta__list flex"><span>SKU:</span>BDN00001</li>
              <li class="meta__list flex">
                <span>Tồn kho:</span>1000
              </li>
            </ul>
          </div>
        </div>
      </section>

      <!--=============== DETAILS TAB ===============-->
      <section class="details__tab container">
  <div class="detail__tabs">
    <span class="detail__tab active-tab" data-target="#reviews">Đánh giá(3)</span>
  </div>
  <div class="details__tabs-content">
    <div class="details__tab-content active-tab" id="reviews">
      <div class="reviews__container grid">
        <div class="review__single">
          <div>
            <img src="./assets/img/avt1.jpg" alt="" class="review__img" />
            <h4 class="review__title">Nine Naphat</h4>
          </div>
          <div class="review__data">
            <div class="review__rating">
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
            </div>
            <p class="review__description">
              Sản phẩm chính hãng, chất lượng.
            </p>
            <span class="review__date">10:00 ngày 22 tháng 10 năm 2024</span>
          </div>
        </div>
        <div class="review__single">
          <div>
            <img src="./assets/img/avt2.jpg" alt="" class="review__img" />
            <h4 class="review__title">Srettha Thavisin</h4>
          </div>
          <div class="review__data">
            <div class="review__rating">
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
            </div>
            <p class="review__description">
              Sản phẩm tốt, giao hàng qua Thái Lan nhanh hơn cả việc tôi mất chức.
            </p>
            <span class="review__date">10:00 ngày 22 tháng 10 năm 2024</span>
          </div>
        </div>
        <div class="review__single">
          <div>
            <img src="./assets/img/avt3.jpg" alt="" class="review__img" />
            <h4 class="review__title">Engfa Waraha</h4>
          </div>
          <div class="review__data">
            <div class="review__rating">
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
            </div>
            <p class="review__description">
              Thật sự không thích sản phẩm này lắm, thích sầu riêng hơn.
            </p>
            <span class="review__date">10:00 ngày 22 tháng 10 năm 2024</span>
          </div>
        </div>
      </div>
      <div class="review__form">
        <h4 class="review__form-title">Thêm đánh giá</h4>
        <div class="rate__product">
          <i class="fi fi-rs-star"></i>
          <i class="fi fi-rs-star"></i>
          <i class="fi fi-rs-star"></i>
          <i class="fi fi-rs-star"></i>
          <i class="fi fi-rs-star"></i>
        </div>
        <form action="" class="form grid">
          <textarea
            class="form__input textarea"
            placeholder="Viết đánh giá"
          ></textarea>
          <div class="form__group grid">
            <input type="text" placeholder="Tên" class="form__input">
            <input type="email" placeholder="Địa chỉ email" class="form__input">
          </div>
          <div class="form__btn">
            <button class="btn">Gửi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


      <!--=============== PRODUCTS ===============-->
      <section class="products container section--lg">
        <h3 class="section__title">Sản phẩm <span>cùng danh mục</span></h3>
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
                <a href="#" class="action__btn" aria-label="Xem chi tiết">
                  <i class="fi fi-rs-eye"></i>
                </a>
              </div>
              <div class="product__badge light-pink">Hot</div>
            </div>
            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.php">
                <h3 class="product__title">Colorful Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
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
      </section>

      <!--=============== NEWSLETTER ===============-->
<?php include 'footer.php' ?>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>