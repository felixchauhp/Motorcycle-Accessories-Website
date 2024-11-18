<?php
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
     <!-- Bootstrap JS (for dropdown functionality) -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
    <link rel="stylesheet" href="./assets/css/styles.css" />

    <title>Ecommerce Website</title>
</head>

    <!--=============== HEADER ===============-->
    <header>
        <nav class="nav container">
            <a href="index-manage.php" class="nav__logo">
                <img class="nav__logo-img" src="assets/img/logo.png" alt="website logo" />
            </a>
            <div class="nav__menu" id="nav-menu">
                <div class="nav__menu-top">
                    <a href="index-manage.php" class="nav__menu-logo">
                        <img src="./assets/img/logo.png" alt="">
                    </a>
                    <div class="nav__close" id="nav-close">
                        <i class="fi fi-rs-cross-small"></i>
                    </div>
                </div>
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="productManage.php" class="nav__link">Sản phẩm</a>
                    </li>
                    <li class="nav__item">
                        <a href="quanlydonhang.php" class="nav__link">Đơn hàng</a>
                    </li>
                    <li class="nav__item">
                        <a href="discount.php" class="nav__link active-link">Khuyến mãi</a>
                    </li>
                </ul>
                <div class="header__user-actions">
                    <a href="#" class="header__action-btn" title="Notification">
                        <img src="assets/img/bell.svg" alt="" />
                        <span class="count">3</span>
                    </a>
                    <a href="accounts-manager.php" class="header__action-btn" id="user-icon" title="User">
                        <img src="assets/img/icon-user.svg" alt="" />
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <!--=============== ORDER ===============-->   
<body>
    <main class="main">
        <section class="wishlist section--lg container">
            <div class="table__container">
              <table class="table">
                <thead>
                  <tr>
                    <th>Mã</th>
                    <th>Sản phẩm</th>
                    <th>Thành tiền</th>
                    <th>Ngày tạo đơn</th>
                    <th>Trạng thái</th>
                    <th>Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($orders as $order): ?>
                  <tr>  
                  <td>
                            <?= htmlspecialchars($order['OrderID']) ?>
                  </td>  
                  <td>
                        <p class="table__description">
                              <?= htmlspecialchars($order['OrderID']) ?>
                        </p>
                  </td>
                    <td>
                      <span class="table__price">
                              <?= htmlspecialchars($order['TotalDue']) ?>
                      </span>
                    </td>
                    <td><span class="table__stock">
                              <?= htmlspecialchars($order['OrderDate']) ?>
                        </span>
                    </td>
                    <td>
                                <select id="status" onchange="removeSelectedOption()">
                                    <option value="">-- Chọn trạng thái --</option>
                                    <option value="confirmed">Đã xác nhận</option>
                                    <option value="packed">Đã đóng gói</option>
                                    <option value="delivered">Đã giao</option>
                                    <option value="canceled">Đã hủy</option>
                                </select>
                    
                                <script>
                                    function removeSelectedOption() {
                                        const select = document.getElementById("status");
                                        const selectedIndex = select.selectedIndex;
                            
                                        if (selectedIndex > 0) { // Bỏ qua option đầu tiên
                                            select.options[selectedIndex].disabled = true; // Loại bỏ option đã chọn
                                        }
                                    }
                                </script>
                    </td>
                    <td>
                        <i class="fi fi-rs-trash table__trash"></i>
                        <!-- Nút In -->
                        <button onclick="window.print()">
                          <i class="fi fi-rs-print table__trash "></i>
                        </button>
                        <i class="fi fi-rs-menu-dots table__trash"></i>
                    </td>
                  </tr>
                <?php endforeach; ?>                    
                </tbody>
              </table>
              <ul class="pagination" id="pagination">
                <!-- Sẽ được điền bằng JavaScript -->
            </ul>
            </div>
          </section>
  </main>
  <!--=============== FOOTER ===============-->
  <footer class="footer container">
    <div class="footer__container grid">
      <div class="footer__content">
            <a href="index.php" class="footer__logo">
                <img src="./assets/img/logo.png" alt="" class="footer__logo-img" />
            </a>    
            <div class="footer__social">
                <h4 class="footer__subtitle">MotorCycle đã có mặt trên:</h4>
                <div class="footer__links flex">
                    <a href="#"><img src="./assets/img/icon-facebook.svg" alt="" class="footer__social-icon" /></a>
                    <a href="#"><img src="./assets/img/icon-twitter.svg" alt="" class="footer__social-icon" /></a>
                    <a href="#"><img src="./assets/img/icon-instagram.svg" alt="" class="footer__social-icon" /></a>
                    <a href="#"><img src="./assets/img/icon-pinterest.svg" alt="" class="footer__social-icon" /></a>
                    <a href="#"><img src="./assets/img/icon-youtube.svg" alt="" class="footer__social-icon" /></a>
                </div>
              </div>
      </div> 
      <div class="footer__content">
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
        </div>
      </div>
    <div class="footer__bottom">
        <p class="copyright">&copy; 2024. All right reserved</p>
        <span class="designer">Website created by Group 4</span>
    </div>
</footer>
</body>
</html>