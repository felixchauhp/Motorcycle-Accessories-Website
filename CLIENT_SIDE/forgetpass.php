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
          <li><span class="breadcrumb__link">Quên mật khẩu</span></li>
        </ul>
      </section>

      <!--=============== LOGIN-REGISTER ===============-->
      <section class="login-register section--lg">
        <div class="login__container container grid">
          <div class="login">
            <h3 class="section__title">Quên mật khẩu ?</h3>
            <p> Vui lòng nhập thông tin để nhận đường dẫn kích hoạt mật khẩu.</p>
            <br>
            <form class="form grid">
              <input
                type="text"
                placeholder="Số điện thoại/ Email"
                class="form__input"
              />
              <div class="form__btn">
                <button class="btn">Gửi</button>
              </div>
              <p>
                <li><a href="login.php">Đăng nhập ngay.</a></li>
                <li><a href="register.php">Chưa có tài khoản ? Đăng ký ngay.</a></li>
              </p>
            </form>
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