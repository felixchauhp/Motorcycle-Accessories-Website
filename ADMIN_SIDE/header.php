<!--=============== HEADER ===============-->
<header class="header">
    
    <nav class="nav container">

      <a href="index.php" class="nav__logo">
        <img class="nav__logo-img" 
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
            <a href="index.php" class="nav__link">Trang chủ</a>
          </li>
          <li class="nav__item">
            <a href="products.php" class="nav__link">Sản phẩm</a>
          </li>
          <li class="nav__item">
            <a href="orders.php" class="nav__link">Đơn hàng</a>
          </li>
          <li class="nav__item">
            <a href="discount.php" class="nav__link active-link">Khuyến mãi</a>
          </li>
          <li class="nav__item">
            <a href="customers.php" class="nav__link active-link">Khách hàng</a>
          </li>
          <li class="nav__item">
            <a href="rating.php" class="nav__link active-link">Đánh giá</a>
          </li>
          <li class="nav__item">
            <a href="blog.php" class="nav__link active-link">Bài viết</a>
          </li>
        </ul>
      </div>

        <div class="header__user-actions">
          <a href="#" class="header__action-btn" title="Notification">
            <img src="assets/img/bell.svg" alt="" />
            <span class="count">3</span>
          </a>
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
            <li>
              <a class="dropdown-item d-flex align-items-center justify-content-center" href="account.php">
                <i class="fi fi-rs-settings mr-2"></i> Cá nhân
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center justify-content-center" href="logout.php">
                <i class="fi fi-rs-user-add mr-2"></i> Đăng xuất
              </a>
            </li>
          </ul>
        </div>
        <div class="header__action-btn nav__toggle" id="nav-toggle">
            <img src="./assets//img/menu-burger.svg" alt="">
        </div>
        </div>

    </nav>
  </header>