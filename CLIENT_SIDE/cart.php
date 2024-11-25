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
          <li><a href="index.html" class="breadcrumb__link">Trang chủ</a></li>
          <li><span class="breadcrumb__link"></span>></li>
          <li><span class="breadcrumb__link">Sản phẩm</span></li>
          <li><span class="breadcrumb__link"></span>></li>
          <li><span class="breadcrumb__link">Giỏ hàng</span></li>
        </ul>
      </section>

      <!--=============== CART ===============-->
      <section class="cart section--lg container">
        <div class="table__container">
          <table class="table">
            <thead>
              <tr>
                <th>Sản phẩm</th>
                <th>Tên</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <img
                    src="./assets//img/product-1-2.jpg"
                    alt=""
                    class="table__img"
                  />
                </td>
                <td>
                  <h3 class="table__title">
                    Sản phẩm
                  </h3>
                  <p class="table__description">
                    Mô tả.
                  </p>
                </td>
                <td>
                  <span class="table__price">110.000 VNĐ</span>
                </td>
                <td><input type="number" value="3" class="quantity" /></td>
                <td><span class="subtotal">330.000 VNĐ</span></td>
                <td><i class="fi fi-rs-trash table__trash"></i></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="cart__actions">
          <a href="#" class="btn flex btn__md">
            <i class="fi-rs-shuffle"></i> Cập nhật giỏ hàng
          </a>
          <a href="#" class="btn flex btn__md">
            <i class="fi-rs-shopping-bag"></i> Tiếp tục mua hàng
          </a>
        </div>

        <div class="divider">
          <i class="fi fi-rs-fingerprint"></i>
        </div>

        <div class="cart__group grid">
          <div>
            <div class="cart__coupon">
              <h3 class="section__title">Mã giảm giá</h3>
              <form action="" class="coupon__form form grid">
                <div class="form__group grid">
                  <input
                    type="text"
                    class="form__input"
                    placeholder="Enter Your Coupon"
                  />
                  <div class="form__btn">
                    <button class="btn flex btn--sm">
                      <i class="fi-rs-label"></i> Sử dụng
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="cart__total">
            <h3 class="section__title">Tổng thanh toán</h3>
            <table class="cart__total-table">
                <tr>
                  <td><span class="cart__total-title">Thành tiền</span></td>
                  <td><span class="cart__total-price">990.000 VNĐ</span></td>
                </tr>
                <tr>
                  <td><span class="cart__total-title">Phí vận chuyển</span></td>
                  <td><span class="cart__total-price">10.000 VNĐ</span></td>
                </tr>
                <tr>
                  <td><span class="cart__total-title">Tổng cộng</span></td>
                  <td><span class="cart__total-price">1.000.000 VNĐ</span></td>
                </tr>
            </table>
            <a href="checkout.html" class="btn flex btn--md">
              <i class="fi fi-rs-box-alt"></i> Tiến hành thanh toán
            </a>
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