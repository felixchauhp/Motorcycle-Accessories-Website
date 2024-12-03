<?php
include 'sql_config.php';

//function to generate unique id
function generateUniqueId($prefix, $pdo, $column, $table) {
  do {
      $id = $prefix . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
      $stmt = $pdo->prepare("SELECT COUNT(*) FROM $table WHERE $column = ?");
      $stmt->execute([$id]);
      $count = $stmt->fetchColumn();
  } while ($count > 0);
  return $id;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $Email = $_POST['email'];
    $Tel = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    $name_parts = explode(' ', $fullname);
    $fname = array_pop($name_parts);
    $lname = implode(' ', $name_parts);

    $customerID = generateUniqueId('CUST', $pdo, 'CustomerID', 'customers');
    $accountID = generateUniqueId('ACC', $pdo, 'AccountID', 'customers');

  
    // Kiểm tra xem tên đăng nhập đã tồn tại chưa và mật khẩu nhập lại có đúng không 
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM customers WHERE AccountName = ?");
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
        $stmt = $pdo->prepare("INSERT INTO customers (CustomerID, Lname, Fname, Email, Tel, AccountID, AccountName, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$customerID, $lname, $fname, $Email, $Tel, $accountID, $username, $password])) {
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
   <?php include 'header.php'; ?>
    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== BREADCRUMB ===============-->
      <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
          <li><a href="index.html" class="breadcrumb__link">Home</a></li>
          <li><span class="breadcrumb__link">></span></li>
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
            <img href="shop.php" src="assets/img/RIGHTBANNER.png" class="home__img" alt="hats" />
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
