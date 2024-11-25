<!DOCTYPE html>
<html lang="en">
 <!--=============== HEADER ===============-->
 <?php include 'head.php'; ?>
<body>
  <!--=============== HEADER ===============-->
  <?php include 'header.php'; ?>

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== BREADCRUMB ===============-->

      <!--=============== ACCOUNTS ===============-->
      <section class="accounts section--lg">
        <div class="accounts__container container grid">
          <div class="account__tabs">
            <p class="account__tab" data-target="#address">
              <i class="fi fi-rs-marker"></i> Thông tin cá nhân
            </p>
            <p class="account__tab" data-target="#change-password">
              <i class="fi fi-rs-settings-sliders"></i> Thay đổi mật khẩu
            </p>
            <p class="account__tab"><i class="fi fi-rs-exit"></i> Đăng xuất</p>
          </div>
          <div class="tabs__content">
            <div class="tab__content active-tab" content id="dashboard">
              <h3 class="tab__header">Xin chào Nguyễn Văn A</h3>
              <div class="tab__body">
                <p class="tab__description personal-info">
                  Vị trí hiện tại của bạn trong công ty là: <strong>Nhân viên</strong> </p>
                </p>
              </div>
            </div>
            <div class="tab__content" content id="update-profile">
              <h3 class="tab__header">Update Profile</h3>
              <div class="tab__body">
                <form class="form grid">
                  <input
                    type="text"
                    placeholder="Username"
                    class="form__input"
                  />
                  <div class="form__btn">
                    <button class="btn btn--md">Save</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="tab__content" content id="address">
              <h3 class="tab__header">Thông tin cá nhân</h3>
              <div class="tab__body">
                <p class="tab__description">
                  <ul class="personal-info">
                    <li><strong>Mã số nhân viên:</strong> 12345</li>
                    <li><strong>Họ và tên:</strong> Nguyễn Văn A</li>
                    <li><strong>Giới tính:</strong> Nam</li>
                    <li><strong>Ngày sinh:</strong> 01/01/1990</li>
                    <li><strong>Email:</strong> nguyen.vana@example.com</li>
                    <li><strong>SĐT:</strong> 0919191919</li>
                    <li><strong>Địa chỉ:</strong> 09 Đồng Hới, Quảng Bình</li>
                    <li><strong>Ngày bắt đầu làm việc:</strong> 01/01/2020</li>
                    <li><strong>Mức Lương:</strong> 10,000,000 VND</li>
                  </ul>
                </p>
              </div>
            </div>
            <div class="tab__content" content id="change-password">
              <h3 class="tab__header">Đổi mật khẩu</h3>
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
                    placeholder="Xác nhận mật khẩu mới"
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
  <?php include 'footer.php'; ?>

<!--=============== SWIPER JS ===============-->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!--=============== MAIN JS ===============-->
<script src="assets/js/main.js"></script>
</body>
</html>