<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = $_POST['identifier'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Kiểm tra có tồn tại tên đăng nhập trong database không
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM employees WHERE AccountName = ?");
    $stmt->execute([$identifier]);
    $userExists = $stmt->fetchColumn();

    if (!$userExists) {
        $error = "Tên đăng nhập không tồn tại.";
    } else if ($new_password != $confirm_password) {
        $error = "Mật khẩu nhập lại không khớp.";
    } else {
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        // Update password in the database
        $stmt = $pdo->prepare("UPDATE employees SET Password = ? WHERE AccountName = ?");
        if ($stmt->execute([$new_password, $identifier])) {
          header("Location: login.php");
          exit;
        } else {
          $error = "Có lỗi xảy ra. Vui lòng thử lại.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <!--=============== DOCUMENT HEAD ===============-->
  <?php include 'head.php'; ?>

<body>
   <!--=============== HEADER ===============-->
<header class="header">
    
    <nav class="nav container">

      <a href="login.php" class="nav__logo">
        <img class="nav__logo-img" 
        src="assets/img/logo.png" 
        alt="website logo" 
      />
      </a>

      <div class="nav__menu" id="nav-menu">

        <div class="nav__menu-top">
          <a href="login.php" class="nav__menu-logo">
            <img src="./assets/img/logo.png" alt="">
          </a>

          <div class="nav__close" id="nav-close">
            <i class="fi fi-rs-cross-small"></i>
          </div>
        </div>

        <ul class="nav__list">
          <li class="nav__item">
            <a href="login.php" class="nav__link">Đăng nhập</a>
          </li>
        </ul>
      </div>

        <div class="header__user-actions">
          <a href="login.php" class="header__action-btn" title="Notification">
            <img src="assets/img/icon-user.svg" alt="" />
          </a>
        <div class="header__action-btn nav__toggle" id="nav-toggle">
            <img src="./assets//img/menu-burger.svg" alt="">
        </div>
        </div>

    </nav>
  </header>

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== BREADCRUMB ===============-->
      <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
          <li><span class="breadcrumb__link">Quên mật khẩu</span></li>
        </ul>
      </section>

      <!--=============== LOGIN-REGISTER ===============-->
      <section class="login-register section--lg">
        <div class="login__container container grid">
          <div class="login">
            <h3 class="section__title">Quên mật khẩu ?</h3>
            <p> Vui lòng nhập thông tin tài khoản để thay đổi mật khẩu</p>
            <br>
            <form class="form grid" method="POST">
            <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>
              <input
                type="text"
                name="identifier"
                placeholder="Tên đăng nhập"
                class="form__input"
                required
              />
              <input
                type="password"
                name="new_password"
                placeholder="Mật khẩu mới"
                class="form__input"
                required
              />
              <input
                type="password"
                name="confirm_password"
                placeholder="Nhập lại mật khẩu mới"
                class="form__input"
                required
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