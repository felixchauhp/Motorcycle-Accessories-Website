<?php
session_start();
include 'sql_config.php';

// Xác nhận id người đăng nhập
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

//Xác nhận mã số khách hàng
$stmt = $pdo->prepare("SELECT CustomerID FROM customers WHERE AccountID = ?");
$stmt->execute([$_SESSION['user_id']]);
$customer_id = $stmt->fetchColumn();
$_SESSION['customer_id'] = $customer_id;

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $form_type = $_POST['form_type'];
//Cập nhật thông tin khách hàng
    if ($form_type == 'update_info') {
      $fullname = $_POST['fullname'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      
      $fields = [];
      $values = [];

      if(!empty($fullname)) {
        $name_parts = explode(' ', $fullname);
        $fname = array_pop($name_parts);
        $lname = implode(' ', $name_parts);

        $fields[] = "Lname = ?";
        $fields[] = "Fname = ?";
        $values[] = $lname;
        $values[] = $fname;
        $_SESSION['username'] = $fullname;
      }

      if (!empty($email)) {
        $fields[] = "Email = ?";
        $values[] = $email;
      }

      if (!empty($phone)) {
        $fields[] = "Tel = ?";
        $values[] = $phone;
      }

      if (!empty($fields)) {
        $values[] = $_SESSION['user_id'];
        $sql_code = "UPDATE customers SET " . implode(", ", $fields) . " WHERE AccountID = ?";
        $stmt = $pdo->prepare($sql_code);
        $stmt->execute($values);
      }
    }
//Chọn địa chỉ giao hàng mặc định
    if ($form_type == 'address_default') {
      $address = $_POST['address'];
      $stmt = $pdo->prepare("UPDATE address_list SET `default` = 'no' WHERE CustomerID = ?");
      $stmt->execute([$_SESSION['customer_id']]);
      $stmt = $pdo->prepare("UPDATE address_list SET `default` = 'yes' WHERE Address = ?");
      $stmt->execute([$address]);
    }
//Thêm địa chỉ giao hàng
    if($form_type == 'add_address'){
      // Sanitize and validate the input
      $new_address = trim($_POST['new_address']);

      if (!empty($new_address)) {
        // Check if the address already exists for the customer
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM address_list WHERE Address = ? AND CustomerID = ?");
        $stmt->execute([$new_address, $_SESSION['customer_id']]);
        $address_exists = $stmt->fetchColumn();

        if($address_exists) {
          $error = "Địa chỉ này đã tồn tại trong danh sách của bạn.";
        } else {
          // Insert the new address into the database
          $stmt = $pdo->prepare("INSERT INTO address_list (Address, CustomerID, `default`) VALUES (?, ?, 'no')");
          $stmt->execute([$new_address, $_SESSION['customer_id']]);
        }
      } else {
        $error = "Vui lòng nhập địa chỉ trước khi xác nhận";
      }
    }
// Thay đổi mật khẩu khách hàng
    if ($form_type == 'change_password') {
      $cur_password = $_POST['current_pass'];
      $new_password = $_POST['new_pass'];
      $confirm_password = $_POST['re_pass'];

      //Kiểm tra mật khẩu hiện tại có đúng không
      $stmt = $pdo->prepare("SELECT Password FROM customers WHERE AccountID = ?");
      $stmt->execute([$_SESSION['user_id']]);
      $pass = $stmt->fetchColumn();

      if(!password_verify($cur_password, $pass)){
        $error = "Mật khẩu hiện tại không đúng.";
      } else if ($new_password != $confirm_password) {
        $error = "Mật khẩu nhập lại không khớp.";
      } else {
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        // Update password in the database
        $stmt = $pdo->prepare("UPDATE customers SET Password = ? WHERE AccountID = ?");
        if ($stmt->execute([$new_password, $_SESSION['user_id']])) {
          session_unset();
          session_destroy();
          header("Location: login.php");
          exit;
        } else {
          $error = "Có lỗi xảy ra. Vui lòng thử lại.";
        }
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
          <li><a href="index.php" class="breadcrumb__link">Trang chủ</a></li>
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
                  <?php
                  // Thiết lập locale cho tiếng Việt
                    setlocale(LC_TIME, 'vi_VN.UTF-8');
                  // Lấy thông tin các đơn hàng từ database
                    $stmt = $pdo->prepare("
                        SELECT OrderID, OrderDate, OrderStatus, PaymentStatus, TotalDue 
                        FROM orders 
                        WHERE CustomerID = ?
                        ORDER BY OrderDate DESC"
                    );
                    $stmt->execute([$_SESSION['customer_id']]);
                    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  ?>
                  <thead>
                    <tr>
                      <th>Orders</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Payment</th>
                      <th>Totals</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Nếu không có đơn hàng nào -->
                    <?php
                      if(empty($orders))
                        echo "<tr><td colspan='6'>Không có đơn hàng nào.</td></tr>";
                    ?>
                    <!-- Hiển thị thông tin đơn hàng -->
                    <?php foreach ($orders as $order): ?>
                      <tr>
                        <td>#<?php echo $order['OrderID']; ?></td>
                        <td><?php echo strftime('%d tháng %m, %Y', strtotime($order['OrderDate'])); ?></td>
                        <td><?php echo $order['OrderStatus']; ?></td>
                        <td><?php echo $order['PaymentStatus']; ?></td>
                        <td><?php echo number_format($order['TotalDue'], 2); ?> VNĐ</td>
                        <td><a href="show-order.php?OrderID=<?php echo $order['OrderID']; ?>" class="view__order">View</a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab__content" content id="update-profile">
              <h3 class="tab__header">Cập nhật thông tin</h3>
              <div class="tab__body">
                <form id="Update_form" class="form grid" method="POST">
                  <input type="hidden" name="form_type" value="update_info">
                  <input
                    type="text"
                    name="fullname" id="fullname"
                    placeholder="Họ và tên khách hàng"
                    class="form__input"
                    required
                  />
                  <input
                    type="text"
                    name="phone" id="phone"
                    placeholder="Số điện thoại"
                    class="form__input"
                    required
                  />
                  <input
                    type="text"
                    name="email" id="email"
                    placeholder="Địa chỉ email"
                    class="form__input"
                    required
                  />
                  <div class="form__btn">
                    <button type="button" id="saveUBtn" class="btn btn--md">Lưu</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="tab__content" content id="address">
              <h3 class="tab__header">Địa chỉ giao hàng mặc định</h3>
              <div class="tab__body">
                <p>
                  <?php echo $_SESSION['username']; ?><br />
                  <?php
                    $stmt = $pdo->prepare("SELECT Tel FROM customers WHERE AccountID = ?");
                    $stmt->execute([$_SESSION['user_id']]);
                    $tel = $stmt->fetchColumn();
                    echo $tel;
                  ?><br />
                  <?php
                    // Lấy địa chỉ giao hàng mặc định từ database
                    $stmt = $pdo->prepare("SELECT Address FROM address_list WHERE CustomerID = ? AND `default` = 'yes'");
                    $stmt->execute([$_SESSION['customer_id']]);
                    $default_address = $stmt->fetchColumn();
                    
                    if(!empty($default_address)) {
                      echo $default_address;
                    } else {
                      echo "Chưa có địa chỉ giao hàng mặc định.";
                    }
                  ?>
                </p>
                <br>
                <div class="form__btn">
                  <button class="btn btn--md" onclick="showAddressModel()">Thay đổi</button>
                  <button class="btn btn--md" onclick="showAddAddressModel()">Thêm địa chỉ</button>
                </div>
                <br>
                <!-- Scroll dùng để thay đổi lựa chọn default address -->
                <div id="addressModel" style="display:none;">
                  <form method="POST" action="accounts.php">
                  <input type="hidden" name="form_type" value="address_default">
                    <div class="address-list-container">
                      <?php
                        $stmt = $pdo->prepare("SELECT Address FROM address_list WHERE CustomerID = ?");
                        $stmt->execute([$_SESSION['customer_id']]);
                        $addresses = $stmt->fetchAll();
                        foreach ($addresses as $address) {
                          echo '<label class="address-option">';
                          echo '<input type="radio" name="address" value="'.$address['Address'].'">';
                          echo '<span>'.$address['Address'].'</span>';
                          echo '</label>';
                        }
                      ?>
                    </div>
                    <br>
                    <button type="submit" class="btn btn--md">Xác nhận</button>
                    <button type="button" class="btn btn--md" onclick="hideAddressModel()">Hủy</button>
                  </form>
                </div>
                <!-- Bảng để thêm địa chỉ giao hàng -->
                <div id="addAddressModel" style="display:none;">
                  <form method="POST" action="accounts.php">
                  <input type="hidden" name="form_type" value="add_address">
                  <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>
                    <div class="form-group">
                      <label for="new_address">Địa chỉ mới:</label>
                      <input type="text" name="new_address" id="new_address" class="form__input" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn--md">Thêm</button>
                    <button type="button" class="btn btn--md" onclick="hideAddAddressModel()">Hủy</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="tab__content" content id="change-password">
              <h3 class="tab__header">Thay đổi mật khẩu</h3>
              <div class="tab__body">
                <form class="form grid" id="Changepass_form" method="POST" >
                  <input type="hidden" name="form_type" value="change_password">
                  <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>
                  <input
                    type="password"
                    name="current_pass" id="curr_pass"
                    placeholder="Mật khẩu hiện tại"
                    class="form__input"
                  />
                  <input
                    type="password"
                    name="new_pass" id="new_pass"
                    placeholder="Mật khẩu mới"
                    class="form__input"
                  />
                  <input
                    type="password"
                    name="re_pass" id="re_pass"
                    placeholder="Xác nhận lại mật khẩu"
                    class="form__input"
                  />
                  <div class="form__btn">
                    <button type="button" id="savePBtn" class="btn btn--md">Lưu</button>
                  </div>
                </form>
              </div>    
            </div>
          </div>
        </div>
      </section>

      <!--=============== CONFIRMATION BOX ===============-->
      <div id ="overlay" class="overlay hidden">
          <div class="confirmation-box">
              <h3>Xác nhận thay đổi</h3>
              <p>Bạn có chắc chắn muốn lưu những thay đổi này?</p>
              <button id="confirmBtn" class="confirm">Xác nhận</button>
              <button id="cancelBtn" class="cancel">Hủy</button>
          </div>
      </div>
    </main>

    <!--=============== FOOTER ===============-->
<?php include 'footer.php' ?>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
