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
          <li><a href="index.html" class="breadcrumb__link">Home</a></li>
          <li><span class="breadcrumb__link"></span></li>
          <li><span class="breadcrumb__link">Đăng nhập</span></li>
        </ul>
      </section>

      <!--=============== LOGIN-REGISTER ===============-->
      <section class="login-register section--lg">
        <div class="login-register__container container grid">
          <div class="login">
            <h3 class="section__title">Đăng nhập</h3>
            <form class="form grid" id="loginForm">
              <input
                type="email"
                id="email"
                placeholder="Số điện thoại/ Email"
                class="form__input"
              />
              <div id="emailNull" style="color: #e25555; display: none">
                Sai tài khoản hoặc mật khẩu
              </div>
              <input
                type="password"
                id="password"
                placeholder="Mật khẩu"
                class="form__input"
              />
              <div id="passNull" style="color: #e25555; display: none">
                Sai tài khoản hoặc mật khẩu
              </div>
              <div class="form__btn">
                <button class="btn" type="submit">Đăng nhập</button>
              </div>
              <p>
                <li><a href="forgetpass.html">Quên mật khẩu ?</a></li>
                <li>
                  <a href="forgetpass.html"
                    >Chưa có tài khoản ? Đăng ký ngay.</a
                  >
                </li>
              </p>
            </form>
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
            <span>Địa chỉ:</span> Công ty CP-TM-DV Xe Gắn Máy, 100 phường Đông
            Hòa, TP. Dĩ An, tỉnh Bình Dương, Việt Nam.
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
            <li>
              <a href="#" class="footer__link">Quy định cung cấp dịch vụ</a>
            </li>
          </ul>
        </div>
        <div class="footer__content">
          <h3 class="footer__title">Tải khoản của tôi</h3>
          <ul class="footer__links">
            <li><a href="#" class="footer__link">Đăng nhập</a></li>
            <li><a href="#" class="footer__link">Xem giỏ hàng</a></li>
            <li>
              <a href="#" class="footer__link">Danh sách sản phẩm yêu thích</a>
            </li>
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

    <!--=============== SCRIPT JS ===============-->
    <script type="module" src="./assets/js/login.js"></script>

    <!--=============== MAIN JS ===============-->
    <!-- <script src="assets/js/main.js"></script> -->
  </body>
</html>
