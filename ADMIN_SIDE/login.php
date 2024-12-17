<?php
session_start();
include 'db_connection.php'; // Tệp kết nối cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $password = password_hash($password, PASSWORD_DEFAULT);

    // Kiểm tra thông tin trong bảng employees
    $query = "SELECT * FROM employees WHERE AccountName = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
 <!--=============== HEAD ===============-->
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
      <!--=============== LOGIN-REGISTER ===============-->
      <section class="login-register section--lg">
        <div class="login__container container grid">
          <div class="login">
            <h3 class="section__title">Đăng nhập</h3>
            <form class="form grid" id="loginForm" method="POST" action="login.php">
                  <input type="text" id="username" name="username" placeholder="Tên đăng nhập" class="form__input" required />
                  <input type="password" id="password" name="password" placeholder="Mật khẩu" class="form__input" required />
                  <div class="form__btn">
                      <button type="submit" class="btn flex btn__md">Đăng nhập</button>
                  </div>
            </form>
            <?php if (isset($error_message)) : ?>
                  <p style="color: red;"><?= $error_message ?></p>
            <?php endif; ?>
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