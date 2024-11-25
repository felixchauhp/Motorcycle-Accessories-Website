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
            <p class="details__brand">Phân loại: <span>bình điện</span></p>
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
                <i class="fi-rs-crown"></i> <a href="#">Chính sách bảo hành</a>6 tháng nếu có hư hỏng do nhà sản xuất.
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
              <a href="#" class="btn btn--sm">Add To Card</a>
              <a href="#" class="details__action-btn">
                <i class="fi fi-rs-heart"></i>
              </a>
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
        <h3 class="section__title"><span>Related</span> Products</h3>
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
              <span class="product__category">Clothing</span>
              <a href="details.html">
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
              <span class="product__category">Clothing</span>
              <a href="details.html">
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
              <span class="product__category">Clothing</span>
              <a href="details.html">
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
              <span class="product__category">Clothing</span>
              <a href="details.html">
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
      <section class="newsletter section home__newsletter">
        <div class="newsletter__container container grid">
          <h3 class="newsletter__title flex">
            <img
              src="./assets/img/icon-email.svg"
              alt=""
              class="newsletter__icon"
            />
            Đăng ký nhận tin sản phẩm mới
          </h3>
          <form action="" class="newsletter__form">
            <input
              type="text"
              placeholder="Nhập địa chỉ Email"
              class="newsletter__input"
            />
            <button type="submit" class="newsletter__btn">Đăng ký</button>
          </form>
        </div>
      </section>
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer container">
      <div class="footer__container grid">
        <div class="footer__content">
          <a href="index.html" class="footer__logo">
            <img src="./assets/img/logo.png" alt="" class="footer__logo-img" />
          </a>
          <h4 class="footer__subtitle">Thông tin liên hệ</h4>
          <p class="footer__description">
            <span>Địa chỉ:</span> Công ty CP-TM-DV Xe Gắn Máy, 100 phường Đông Hòa, TP. Dĩ An, tỉnh Bình Dương, Việt Nam.
          </p>
          <p class="footer__description">
            <span>Hotline:</span> +84 001 929 992
          </p>
          <p class="footer__description">
            <span>Email:</span> contact@motorcycle.vn
          </p>
          <div class="footer__social">
            <h4 class="footer__subtitle">MotorCycle đã có mặt trên:</h4>
            <div class="footer__links flex">
              <a href="#">
                <img
                  src="./assets/img/icon-facebook.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-twitter.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-instagram.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-pinterest.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-youtube.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
            </div>
          </div>
        </div>
        <div class="footer__content">
          <h3 class="footer__title">Thông tin chi tiết</h3>
          <ul class="footer__links">
            <li><a href="#" class="footer__link">Về chúng tôi</a></li>
            <li><a href="#" class="footer__link">Chính sách giao hàng</a></li>
            <li><a href="#" class="footer__link">Điều khoản bảo mật</a></li>
            <li><a href="#" class="footer__link">Quy định cung cấp dịch vụ</a></li>
          </ul>
        </div>
        <div class="footer__content">
          <h3 class="footer__title">Tải khoản của tôi</h3>
          <ul class="footer__links">
            <li><a href="#" class="footer__link">Đăng nhập</a></li>
            <li><a href="#" class="footer__link">Xem giỏ hàng</a></li>
            <li><a href="#" class="footer__link">Danh sách sản phẩm yêu thích</a></li>
            <li><a href="#" class="footer__link">Tra cứu đơn hàng</a></li>
          </ul>
        </div>
        <div class="footer__content">
          <h3 class="footer__title">Đối tác thanh toán</h3>
          <img
            src="./assets/img/payment-method.png"
            alt=""
            class="payment__img"
          />
        </div>
      </div>
      <div class="footer__bottom">
        <p class="copyright">&copy; 2024. All right reserved</p>
        <span class="designer">Website created by Group 4</span>
      </div>
    </footer>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>