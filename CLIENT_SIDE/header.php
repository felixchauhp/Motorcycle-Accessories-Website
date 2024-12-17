<?php
if (session_id() == '') {
  session_start();
}
?>
<!--=============== HEADER ===============-->
   <header class="header">
    <div class="header__top">
      <div class="header__container container">
        <div class="header__contact">
          <span>Gọi đặt hàng:</span>
          <span>+84 001 929 992</span>
        </div>
        <p class="header__alert-news">
          Dịch vụ giao hàng và lắp ráp tận nơi !
        </p>
        <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="login.php" class="header__top-action">
          Đăng nhập ngay để mua hàng!
        </a>
        <?php endif; ?>
      </div>
    </div>

    <nav class="nav container">
      <a href="index.php" class="nav__logo">
        <img
          class="nav__logo-img"
          src="assets/img/logo.png"
          alt="website logo"
        />
      </a>

      <div class="nav__menu" id="nav-menu">

        <div class="nav__menu-top">
          <a href="index.php" class="nav__menu-logo">
            <img src="./assets/img/logo.png" alt="">
          </a>
          <div class="nav__close" id="nav-close">
            <i class="fi fi-rs-cross-small"></i>
          </div>
        </div>

        <ul class="nav__list">
          <li class="nav__item">
            <a href="index.php" class="nav__link active-link">Trang chủ</a>
          </li>
          <li class="nav__item">
            <a href="shop.php" class="nav__link">Sản phẩm</a>
          </li>
          <li class="nav__item">
            <a href="about.php" class="nav__link">Giới thiệu</a>
          </li>
        </ul>
      </div>
      
      <div class="header__user-actions">
        <a href="" class="header__action-btn" title="Wishlist">
          <img src="assets/img/bell.svg" alt="" />
        </a>
        <?php if (isset($_SESSION['user_id'])): ?>
        <a href="cart.php" class="header__action-btn" title="Cart">
          <img src="assets/img/icon-cart.svg" alt="" />
        </a>
        <?php endif; ?>
      <div class="dropdown w-100 mt-2">
        <a
          href="#"
          class="header__action-btn dropdown-toggle"
          id="userDropdown"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
          title="User"
        >
          <img src="assets/img/icon-user.svg" alt=""/>
        </a>
        
        <ul class="dropdown-menu dropdown-menu-right text-center p-2" style="width: 150px;" aria-labelledby="userDropdown">
        <?php if (isset($_SESSION['user_id'])): ?>
          <li>
            <a class="dropdown-item d-flex align-items-center justify-content-center" href="accounts.php">
              <i class="fi fi-rs-settings mr-2"></i> Cá nhân
            </a>
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center justify-content-center" href="logout.php">
              <i class="fi fi-rs-exit mr-2"></i> Đăng xuất
            </a>
          </li>
        <?php else: ?>
          <li>
            <a class="dropdown-item d-flex align-items-center justify-content-center" href="login.php">
              <i class="fi fi-rs-user mr-2"></i> Đăng nhập
            </a>
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center justify-content-center" href="register.php">
              <i class="fi fi-rs-user-add mr-2"></i> Đăng ký
            </a>
          </li>
        <?php endif; ?>
        </ul>
      </div>
        <div class="header__action-btn nav__toggle" id="nav-toggle">
          <img src="./assets//img/menu-burger.svg" alt="">
        </div>
      </div>
    </nav>
  </header>