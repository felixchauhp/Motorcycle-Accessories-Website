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
          <li><a href="index.php" class="breadcrumb__link">Home</a></li>
          <li><span class="breadcrumb__link">></span></li>
          <li><span class="breadcrumb__link">Đăng nhập</span></li>
        </ul>
      </section>

      <!--=============== LOGIN-REGISTER ===============-->
      <section class="login-register section--lg">
        <div class="login__container container grid">
          <div class="login">
            <h3 class="section__title">Đăng nhập</h3>
            <form class="form grid" id="loginForm">
              <input
                type="username"
                id="username" name="username"
                placeholder="Số điện thoại/ Email"
                class="form__input"
              />
              <input
                type="password"
                id="password" name="password"
                placeholder="Mật khẩu"
                class="form__input"
              />
              <div class="form__btn">
                <button class="btn">
                   Đăng nhập
                </button>
              </div>
              <p>
                <li><a href="forgetpass.php">Quên mật khẩu ?</a></li>
                <li><a href="register.php">Chưa có tài khoản ? Đăng ký ngay.</a></li>
              </p>
            </form>
          </div>
        </div>
      </section>
    </main>

    <!--=============== FOOTER ===============-->
    <?php include 'footer.php'; ?>

    <!--=============== SWIPER JS ===============-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->

    <!--=============== MAIN JS ===============-->
    <script src="script.js"></script>
  </body>
</html>
