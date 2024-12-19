<?php
include 'db_admin_connection.php';

//function to generate unique id
function generateUniqueId($prefix, $pdo, $column, $table) {
  do {
      $id = $prefix . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
      $stmt = $pdo->prepare("SELECT COUNT(*) FROM $table WHERE $column = ?");
      $stmt->execute([$id]);
      $count = $stmt->fetchColumn();
  } while ($count > 0);
  return $id;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $Sex = $_POST['gender'];
    $Birthday = $_POST['birthday'];
    $Email = $_POST['email'];
    $Tel = $_POST['phone'];
    $Address = $_POST['address'];
    $Position = 'Nhân viên';
    $Status = 'Đang làm việc';
    $StartDate = date('Y-m-d');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    $name_parts = explode(' ', $fullname);
    $lname = array_pop($name_parts);
    $fname = implode(' ', $name_parts);

    $employeeID = generateUniqueId('EMP', $pdo, 'EmployeeID', 'employees');
    $accountID = generateUniqueId('NV', $pdo, 'AccountID', 'employees');

  
    // Kiểm tra xem tên đăng nhập đã tồn tại chưa và mật khẩu nhập lại có đúng không 
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM employees WHERE AccountName = ?");
    $stmt->execute([$username]);
    $userExists = $stmt->fetchColumn();

    if ($userExists) {
        $error = "Tên đăng nhập đã tồn tại.";
    } else 
    if ($password != $re_password) {
        $error = "Mật khẩu nhập lại không khớp.";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        // Thêm người dùng mới
        $stmt = $pdo->prepare("INSERT INTO employees (EmployeeID, Lname, Fname, Sex, Birthday, Email, Tel, Address, Position, Status, StartDate, AccountID, AccountName, Password) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$employeeID, $lname, $fname, $Sex, $Birthday, $Email, $Tel, $Address, $Position, $Status, $StartDate, $accountID, $username, $password])) {
        
        //Tạo user mới cho database
        $stmt = $pdo->prepare("
          CREATE USER '$username'@'%' IDENTIFIED BY '$re_password';
          GRANT ALL PRIVILEGES ON motorcycle.address_list TO '$username'@'%';
          GRANT ALL PRIVILEGES ON motorcycle.category TO '$username'@'%';
          GRANT ALL PRIVILEGES ON motorcycle.customers TO '$username'@'%';
          GRANT ALL PRIVILEGES ON motorcycle.employees TO '$username'@'%';
          GRANT ALL PRIVILEGES ON motorcycle.payment TO '$username'@'%';
          GRANT ALL PRIVILEGES ON motorcycle.products_in_category TO '$username'@'%';
          GRANT ALL PRIVILEGES ON motorcycle.products_in_orders TO '$username'@'%';
          GRANT ALL PRIVILEGES ON motorcycle.supporter_of_orders TO '$username'@'%';
          GRANT ALL PRIVILEGES ON motorcycle.used_promocodes TO '$username'@'%';
          GRANT ALL PRIVILEGES ON motorcycle.vehicle TO '$username'@'%';
          FLUSH PRIVILEGES;
        ");
        $stmt->execute();
        
          // In ra thông tin dữ liệu đã được thêm
            // echo "<script>console.log('Người dùng đã được thêm: " . json_encode([
            //     'CustomerID' => $customerID,
            //     'Lname' => $lname,
            //     'Fname' => $fname,
            //     'Email' => $Email,
            //     'Tel' => $Tel,
            //     'AccountID' => $accountID,
            //     'Username' => $username,
            //     'Password' => $password 
            // ]) . "');</script>";

            //Chuyển hướng đến trang đăng nhập sau khi báo đăng ký thành công
            header("Location: login.php");
            exit;
        } else {
            $error = "Có lỗi xảy ra khi thêm người dùng.";
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
          <li><span class="breadcrumb__link">Đăng ký tài khoản</span></li>
        </ul>
      </section>

      <!--=============== LOGIN-REGISTER ===============-->
      <section class="login-register section--lg">
        <div class="login-register__container container grid">
          <div class="register">
            <h3 class="section__title">Tạo tài khoản mới</h3>
            <form class="form grid" method="POST">
            <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>
              <input
                type="text"
                name="fullname"
                placeholder="Họ và tên"
                class="form__input"
              />
              <input
                type="email"
                name="email"
                placeholder="Email"
                class="form__input"
              />
              <input
                type="phone"
                name="phone"
                placeholder="Số điện thoại"
                class="form__input"
                required
              />
              <div class="form__input">
                </br>
                <input type="radio" id="gender_male" name="gender" value="Nam" required>
                <label for="gender_male">Nam</label>

                <input type="radio" id="gender_female" name="gender" value="Nữ" required>
                <label for="gender_female">Nữ</label>
              </div>
              <input
                type="date"
                name="birthday"
                placeholder="Sinh nhật (yyyy-mm-dd)"
                class="form__input"
              />
              <input
                type="text"
                name="address"
                placeholder="Địa chỉ"
                class="form__input"
              />
              <input
                type="username"
                name="username"
                placeholder="Tên tài khoản"
                class="form__input"
                required
              />
              <input
                type="password"
                name="password"
                placeholder="Mật khẩu"
                class="form__input"
                required
              />
              <input
                type="password"
                name="re_password"
                placeholder="Nhập lại mật khẩu"
                class="form__input"
                required
              />
              <div class="form__btn">
                <button class="btn">Đăng ký</button>
              </div>
              <p>
                <a href="login.php">Đã có tài khoản ? Đăng nhập ngay.</a>
              </p>
            </form>
          </div>
          <div class="register">
            <img href="login.php" src="assets/img/Khichlenhanvien.jpg" class="home__img" alt="hats" />
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