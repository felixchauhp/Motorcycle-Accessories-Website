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
          <li><span class="breadcrumb__link">></span></li>
          <li><span class="breadcrumb__link">Về tôi</span></li>
        </ul>
      </section>

      <!--=============== ACCOUNTS ===============-->
      <section class="accounts section--lg">
        <div class="accounts__container container grid">
          <div class="account__tabs">
            <p class="account__tab active-tab" data-target="#dashboard">
              <i class="fi fi-rs-settings-sliders"></i> Bảng điều khiển
            </p>
            <p class="account__tab" data-target="#orders">
              <i class="fi fi-rs-shopping-bag"></i> Đơn hàng
            </p>
            <p class="account__tab" data-target="#update-profile">
              <i class="fi fi-rs-user"></i> Cập nhật thông tin
            </p>
            <p class="account__tab" data-target="#address">
              <i class="fi fi-rs-marker"></i> Danh sách địa chỉ
            </p>
            <p class="account__tab" data-target="#change-password">
              <i class="fi fi-rs-settings-sliders"></i> Thay đổi mật khẩu
            </p>
            <p class="account__tab"><i class="fi fi-rs-exit"></i> Đăng xuất</p>
          </div>
          <div class="tabs__content">
            <div class="tab__content active-tab" content id="dashboard">
              <h3 class="tab__header">Xin chào User</h3>
              <div class="tab__body">
                <p class="tab__description">
                  Từ bảng điều khiển tài khoản của bạn. bạn có thể dễ dàng kiểm tra & xem
                  đơn hàng gần đây của mình, quản lý địa chỉ giao hàng và thanh toán và
                  chỉnh sửa mật khẩu và thông tin tài khoản của bạn
                </p>
              </div>
            </div>
            <div class="tab__content" content id="orders">
              <h3 class="tab__header">Your Orders</h3>
              <div class="tab__body">
                <table class="placed__order-table">
                  <thead>
                    <tr>
                      <th>Orders</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Totals</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>#1357</td>
                      <td>March 19, 2022</td>
                      <td>Processing</td>
                      <td>$125.00</td>
                      <td><a href="#" class="view__order">View</a></td>
                    </tr>
                    <tr>
                      <td>#2468</td>
                      <td>June 29, 2022</td>
                      <td>Completed</td>
                      <td>$364.00</td>
                      <td><a href="#" class="view__order">View</a></td>
                    </tr>
                    <tr>
                      <td>#2366</td>
                      <td>August 02, 2022</td>
                      <td>Completed</td>
                      <td>$280.00</td>
                      <td><a href="#" class="view__order">View</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab__content" content id="update-profile">
              <h3 class="tab__header">Cập nhật thông tin</h3>
              <div class="tab__body">
                <form class="form grid">
                  <input
                    type="text"
                    placeholder="Họ và tên khách hàng"
                    class="form__input"
                  />
                  <input
                    type="text"
                    placeholder="Số điện thoại"
                    class="form__input"
                  />
                  <input
                    type="text"
                    placeholder="Địa chỉ email"
                    class="form__input"
                  />
                  <div class="form__btn">
                    <button class="btn btn--md">Lưu</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="tab__content" content id="address">
              <h3 class="tab__header">Địa chỉ giao hàng mặc định</h3>
              <div class="tab__body">
                <p>
                  Nguyễn Thị A <br />
                  0919191919<br />
                  09 Nguyễn Thị Đinh, phường An Phú, TP. Thủ Đức <br />
                  TP. Hồ Chí Minh
                </p>
                <br>
                <div class="form__btn">
                  <button class="btn btn--md">Thay đổi</button>
                </div>
              </div>
            </div>
            <div class="tab__content" content id="change-password">
              <h3 class="tab__header">Thay đổi mật khẩu</h3>
              <div class="tab__body">
                <form class="form grid">
                  <input
                    type="password"
                    placeholder="Mật khẩu hiện tại"
                    class="form__input"
                  />
                  <input
                    type="password"
                    placeholder="Mật khẩu mới"
                    class="form__input"
                  />
                  <input
                    type="password"
                    placeholder="Xác nhận lại mật khẩu"
                    class="form__input"
                  />
                  <div class="form__btn">
                    <button class="btn btn--md">Lưu</button>
                  </div>
                </form>
              </div>
            </div>
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