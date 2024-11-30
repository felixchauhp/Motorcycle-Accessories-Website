<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

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
          </div>
          <div class="tabs__content">
            <div class="tab__content active-tab" content id="dashboard">
              <h3 class="tab__header">Xin chào <?php echo $_SESSION['username']; ?></h3> 
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
    </main>

    <!--=============== FOOTER ===============-->
<?php include 'footer.php' ?>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>