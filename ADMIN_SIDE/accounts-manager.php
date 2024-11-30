<?php include 'change-password.php' ?>
<?php
// Tệp kết nối cơ sở dữ liệu

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Lấy tên đăng nhập từ session
$username = $_SESSION['username'];

// Lấy thông tin người dùng từ cơ sở dữ liệu
$query = "SELECT * FROM employees WHERE AccountName = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Kiểm tra nếu có dữ liệu
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // Nếu không tìm thấy người dùng, chuyển hướng về trang đăng nhập
    header("Location: login.php");
    exit();
}
?>

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
          </div>
          <div class="tabs__content">
            <div class="tab__content active-tab" content id="dashboard">
              <h3 class="tab__header">Xin chào, <?php echo $user['FName'] . ' ' . $user['LName']; ?></h3>
              <div class="tab__body">
                <p class="tab__description personal-info">
                  Vị trí hiện tại của bạn trong công ty là: <strong><?php echo $user['Position']; ?></strong>
                </p>
              </div>
            </div>
            <div class="tab__content" content id="update-profile">
              <h3 class="tab__header">Cập nhật hồ sơ</h3>
              <div class="tab__body">
                <form class="form grid">
                  <input type="text" placeholder="Username" class="form__input" value="<?php echo $user['AccountName']; ?>" disabled />
                  <div class="form__btn">
                    <button class="btn btn--md">Lưu</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="tab__content" content id="address">
              <h3 class="tab__header">Thông tin cá nhân</h3>
              <div class="tab__body">
                <p class="tab__description">
                  <ul class="personal-info">
                    <li><strong>Mã số nhân viên:</strong> <?php echo $user['EmployeeID']; ?></li>
                    <li><strong>Họ và tên:</strong> <?php echo $user['FName'] . ' ' . $user['LName']; ?></li>
                    <li><strong>Giới tính:</strong> <?php echo $user['Sex']; ?></li>
                    <li><strong>Ngày sinh:</strong> <?php echo date('d/m/Y', strtotime($user['Birthday'])); ?></li>
                    <li><strong>Email:</strong> <?php echo $user['Email']; ?></li>
                    <li><strong>SĐT:</strong> <?php echo $user['Tel']; ?></li>
                    <li><strong>Địa chỉ:</strong> <?php echo $user['Address']; ?></li>
                    <li><strong>Ca làm việc:</strong> <?php echo $user['WorkShift']; ?></li>
                    <li><strong>Ngày bắt đầu làm việc:</strong> <?php echo date('d/m/Y', strtotime($user['StartDate'])); ?></li>
                    <li><strong>Mức Lương:</strong> <?php echo number_format($user['Salary'], 0, ',', '.') . ' VND'; ?></li>
                  </ul>
                </p>
              </div>
            </div>
            <div class="tab__content" content id="change-password">
            <h3 class="tab__header">Đổi mật khẩu</h3>
            <div class="tab__body">
              <form class="form grid" method="POST" action="change-password.php">
                <input
                  type="password"
                  name="current_password"
                  placeholder="Mật khẩu hiện tại"
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
                  placeholder="Xác nhận mật khẩu mới"
                  class="form__input"
                  required
                />
                <div class="form__btn">
                  <button type="submit" class="btn btn--md">Lưu</button>
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