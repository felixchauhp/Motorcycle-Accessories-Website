<?php
// Kết nối cơ sở dữ liệu
include 'db_connection.php';

// Khởi tạo các biến rỗng cho dữ liệu và lỗi
$promo_name = $promo_code = $start_date = $end_date = "";
$percent_discount = $min_order = $max_discount = $quantity = "";
$errors = [];

// Xử lý dữ liệu khi biểu mẫu được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra tên mã khuyến mãi
    $promo_name = trim($_POST["promo-name"]);
    if (empty($promo_name)) {
        $errors['promo_name'] = "Vui lòng nhập tên mã khuyến mãi.";
    }

    // Kiểm tra mã khuyến mãi
    $promo_code = trim($_POST["promo-code"]);
    if (empty($promo_code)) {
        $errors['promo_code'] = "Vui lòng nhập mã khuyến mãi.";
    }

    // Kiểm tra ngày bắt đầu
    $start_date = $_POST["promotion-start-date"];
    if (empty($start_date)) {
        $errors['start_date'] = "Vui lòng chọn ngày bắt đầu.";
    }

    // Kiểm tra ngày kết thúc
    $end_date = $_POST["promotion-end-date"];
    if (empty($end_date)) {
        $errors['end_date'] = "Vui lòng chọn ngày kết thúc.";
    } elseif (strtotime($end_date) < strtotime($start_date)) {
        $errors['end_date'] = "Ngày kết thúc phải sau ngày bắt đầu.";
    }

    // Kiểm tra giảm giá theo phần trăm
    $percent_discount = $_POST["percent-discount"];
    if (empty($percent_discount) || !is_numeric($percent_discount) || $percent_discount <= 0 || $percent_discount > 100) {
        $errors['percent_discount'] = "Giá trị giảm phải là số hợp lệ từ 1 đến 100.";
    }

    //Kiểm tra giá trị đơn hàng tối thiểu
    $min_order = $_POST["min_order"];
    if (empty($min_order) || !is_numeric($min_order) || $min_order <= 0) {
        $errors['min_order'] = "Giá trị đơn hàng tối thiểu phải là số hợp lệ lớn hơn 0.";
    }

    // Kiểm tra số tiền giảm tối đa
    $max_discount = $_POST["max_discount"];
    if (empty($max_discount) || !is_numeric($max_discount) || $max_discount <= 0) {
        $errors['max_discount'] = "Số tiền giảm tối đa phải là số hợp lệ lớn hơn 0.";
    }

    // Kiểm tra số lượng
    $quantity = $_POST["quantity"];
    if (empty($quantity) || !is_numeric($quantity) || $quantity <= 0) {
        $errors['quantity'] = "Số lượng phải là số hợp lệ lớn hơn 0.";
    }

    // Nếu không có lỗi, thêm vào cơ sở dữ liệu
    if (empty($errors)) {
        $query = "INSERT INTO promotion (PromoName, PromoCode, StartDate, EndDate, PromoRate, MinValue, MaxAmount, Quantity)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($conn, $query)) {
            // Liên kết các giá trị với câu lệnh SQL
            mysqli_stmt_bind_param($stmt, "ssssdiid", $promo_name, $promo_code, $start_date, $end_date, $percent_discount, $min_order, $max_discount, $quantity);
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Thêm mã khuyến mãi thành công!");window.location.href = "discount.php";</script>';
            } else {
                echo '<p class="text-danger">Đã xảy ra lỗi khi thêm mã khuyến mãi: ' . mysqli_error($conn) . '</p>';
            }
            mysqli_stmt_close($stmt);
        }
    }
}
?>

    <!--========================================================================-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FLATICON ===============-->
    <link
      rel="stylesheet"
      href="https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css"
    />
     <!-- Bootstrap JS (for dropdown functionality) -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
    <!--=============== SWIPER CSS ===============-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="stylesheet" href="./assets/css/styles2.css" />
    <title>Ecommerce Website</title>
  </head>
  <body>
    
   <!--=============== HEADER ===============-->
   <?php include 'header.php'; ?>

    <!--=============== MAIN ===============-->
    <main class="main">

      <!--=============== Promotion Management ===============-->
      <section class="promotions container section--lg">
        <!-- Button to add a new promotion -->
        <div id="promotionForm">
          <h2 style="text-align: center;">Thêm mã khuyến mãi</h2>
          <br>
    <form id="add-promotion" method="POST" action="add-Discount.php">
    <label for="promo-name">Tên mã:</label>
    <input type="text" id="promo-name" name="promo-name" required />
    <p class="error"><?php echo $errors['promo_name'] ?? ''; ?></p>

    <label for="promo-code">Mã khuyến mãi:</label>
    <input type="text" id="promo-code" name="promo-code" required />
    <p class="error"><?php echo $errors['promo_code'] ?? ''; ?></p>

    <div id="promotion-dates">
        <div>
            <label for="promotion-start-date">Ngày bắt đầu:</label>
            <input type="date" id="promotion-start-date" name="promotion-start-date" required />
            <p class="error"><?php echo $errors['start_date'] ?? ''; ?></p>
        </div>
        <div>
            <label for="promotion-end-date">Ngày kết thúc:</label>
            <input type="date" id="promotion-end-date" name="promotion-end-date" required />
            <p class="error"><?php echo $errors['end_date'] ?? ''; ?></p>
        </div>
    </div>
    <div class="percent-input">
        <label for="percent-discount">Giá trị giảm (%):</label>
        <input type="number" id="percent-discount" name="percent-discount" />
        <p class="error"><?php echo $errors['percent_discount'] ?? ''; ?></p>
    </div>

    <label for="min-input">Giá trị đơn hàng tối thiểu:</label>
    <input type="number" id="min_order" name="min_order" required />
    <p class="error"><?php echo $errors['min_order'] ?? ''; ?></p>

    <label for="max-input">Số tiền giảm tối đa:</label>
    <input type="number" id="max_discount" name="max_discount" required />
    <p class="error"><?php echo $errors['max_discount'] ?? ''; ?></p>

    <label for="quantity">Số lượng:</label>
    <input type="number" id="quantity" name="quantity" required />
    <p class="error"><?php echo $errors['quantity'] ?? ''; ?></p>
    <br>
    <button type="submit" class="btn-submit">Thêm</button>
</form>

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
