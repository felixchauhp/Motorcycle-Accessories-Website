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
          <li><span class="breadcrumb__link">></span></li>
          <li><span class="breadcrumb__link">Đăng ký tài khoản</span></li>
        </ul>
      </section>

      <!--=============== LOGIN-REGISTER ===============-->
      <section class="login-register section--lg">
        <div class="login-register__container container grid">
          <div class="register">
            <h3 class="section__title">Tạo tài khoản mới</h3>
            <form class="form grid">
              <input
                type="text"
                placeholder="Họ và tên"
                class="form__input"
              />
              <input
                type="email"
                placeholder="Email"
                class="form__input"
              />
              <input
                type="phone"
                placeholder="Số điện thoại"
                class="form__input"
              />
              <input
                type="password"
                placeholder="Mật khẩu"
                class="form__input"
              />
              <input
                type="password"
                placeholder="Nhập lại mật khẩu"
                class="form__input"
              />
              <div class="form__btn">
                <button class="btn">Đăng ký</button>
              </div>
              <p>
                <a href="login.html">Đã có tài khoản ? Đăng nhập ngay.</a>
              </p>
            </form>
          </div>
          <div class="register">
            <img href="shop.php" src="assets/img/RIGHTBANNER.png" class="home__img" alt="hats" />
          </div>
        </div>
      </section>
    </main>

    <!--=============== FOOTER ===============-->
    <?php include 'footer.php' ?>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
