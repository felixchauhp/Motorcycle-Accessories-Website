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
            <p class="account__tab active-tab" data-target="#dashboard">
              <i class="fi fi-rs-settings-sliders"></i> Bảng điều khiển
            </p>
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
                <p class="tab__description">
                  Bạn được phân quyền là: Nhân viên
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
                <address class="address">
                  Họ và tên: Nguyễn Văn A <br />
                  MSNV: 2218299 <br />
                  SĐT: 0919191919 <br />
                  Địa chỉ: 09 Đồng Hới, Quảng Bình.
                </address>
              </div>
            </div>
            <div class="tab__content" content id="change-password">
              <h3 class="tab__header">Change Password</h3>
              <div class="tab__body">
                <form class="form grid">
                  <input
                    type="password"
                    placeholder="Current Password"
                    class="form__input"
                  />
                  <input
                    type="password"
                    placeholder="New Password"
                    class="form__input"
                  />
                  <input
                    type="password"
                    placeholder="Confirm Password"
                    class="form__input"
                  />
                  <div class="form__btn">
                    <button class="btn btn--md">Save</button>
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