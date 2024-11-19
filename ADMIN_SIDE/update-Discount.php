<?php
// Kết nối cơ sở dữ liệu
include 'db_connection.php';

// Khởi tạo các biến và lỗi
$promo_name = $promo_code = $start_date = $end_date = $percent_discount = "";
$min_order = $max_discount = $quantity = "";
$errors = [];

// Lấy mã giảm giá từ URL
if (isset($_GET['promoCode'])) {
    $promo_code = urldecode($_GET['promoCode']);

    // Truy vấn lấy dữ liệu khuyến mãi
    $query = "SELECT * FROM promotion WHERE PromoCode = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $promo_code);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $promotion = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    }

    // Nếu không tìm thấy mã giảm giá
    if (!$promotion) {
        die("Mã giảm giá không tồn tại!");
    }

    // Gán giá trị từ cơ sở dữ liệu vào biến
    $promo_name = $promotion['PromoName'];
    $start_date = $promotion['StartDate'];
    $end_date = $promotion['EndDate'];
    $percent_discount = $promotion['PromoRate'];
    $min_order = $promotion['MinValue'];
    $max_discount = $promotion['MaxAmount'];
    $quantity = $promotion['Quantity'];
} else {
    die("Không tìm thấy mã giảm giá!");
}

// Xử lý khi biểu mẫu được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra và cập nhật dữ liệu
    $promo_name = trim($_POST["promo-name"]);
    $start_date = $_POST["promotion-start-date"];
    $end_date = $_POST["promotion-end-date"];
    $percent_discount = $_POST["percent-discount"];
    $min_order = $_POST["min-order"];
    $max_discount = $_POST["max-discount"];
    $quantity = $_POST["quantity"];

    // Kiểm tra lỗi
    if (empty($promo_name)) {
        $errors['promo_name'] = "Vui lòng nhập tên mã khuyến mãi.";
    }
    if (empty($start_date)) {
        $errors['start_date'] = "Vui lòng chọn ngày bắt đầu.";
    }
    if (empty($end_date) || strtotime($end_date) < strtotime($start_date)) {
        $errors['end_date'] = "Ngày kết thúc phải sau ngày bắt đầu.";
    }
    // if (empty($percent_discount) || !is_numeric($percent_discount) || $percent_discount <= 0 || $percent_discount > 100) {
    //     $errors['percent_discount'] = "Giá trị giảm phải từ 1 đến 100.";
    // }
    // if (empty($min_order) || !is_numeric($min_order) || $min_order <= 0) {
    //     $errors['min_order'] = "Giá trị đơn hàng tối thiểu phải lớn hơn 0.";
    // }
    // if (empty($max_discount) || !is_numeric($max_discount) || $max_discount <= 0) {
    //     $errors['max_discount'] = "Số tiền giảm tối đa phải lớn hơn 0.";
    // }
    if (empty($quantity) || !is_numeric($quantity) || $quantity <= 0) {
        $errors['quantity'] = "Số lượng phải lớn hơn 0.";
    }

    // Nếu không có lỗi, cập nhật dữ liệu
    if (empty($errors)) {
        $query = "UPDATE promotion 
                  SET PromoName = ?, StartDate = ?, EndDate = ?, PromoRate = ?, MinValue = ?, MaxAmount = ?, Quantity = ? 
                  WHERE PromoCode = ?";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, "sssdiiis", $promo_name, $start_date, $end_date, $percent_discount, $min_order, $max_discount, $quantity, $promo_code);
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Cập nhật mã khuyến mãi thành công!"); window.location.href = "discount.php";</script>';
            } else {
                echo '<p class="text-danger">Đã xảy ra lỗi khi cập nhật mã khuyến mãi: ' . mysqli_error($conn) . '</p>';
            }
            mysqli_stmt_close($stmt);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="stylesheet" href="./assets/css/styles2.css" />
    <title>Chỉnh sửa mã giảm giá</title>
</head>
<body>
    <!--=============== HEADER ===============-->
    <header>
        <nav class="nav container">
            <a href="index-manage.html" class="nav__logo">
                <img class="nav__logo-img" src="assets/img/logo.png" alt="website logo" />
            </a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="productManage.html" class="nav__link">Sản phẩm</a>
                    </li>
                    <li class="nav__item">
                        <a href="quanlydonhang.html" class="nav__link">Đơn hàng</a>
                    </li>
                    <li class="nav__item">
                        <a href="discount.html" class="nav__link active-link">Khuyến mãi</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main">
        <section class="promotions container section--lg">
            <div id="promotionForm">
                <h2 style="text-align: center;">Chỉnh sửa mã khuyến mãi</h2>
                <br>
                <form id="edit-promotion" method="POST" action="">
                    <label for="promo-name">Tên mã:</label>
                    <input 
                        type="text" 
                        id="promo-name" 
                        name="promo-name" 
                        value="<?php echo htmlspecialchars($promo_name); ?>" 
                        required 
                    />
                    <p class="error"><?php echo $errors['promo_name'] ?? ''; ?></p>

                    <label for="promo-code">Mã khuyến mãi:</label>
                    <input 
                        type="text" 
                        id="promo-code" 
                        name="promo-code" 
                        value="<?php echo htmlspecialchars($promo_code); ?>" 
                        required 
                    />
                    <p class="error"><?php echo $errors['promo_code'] ?? ''; ?></p>

                    <div id="promotion-dates">
                        <div>
                            <label for="promotion-start-date">Ngày bắt đầu:</label>
                            <input 
                                type="date" 
                                id="promotion-start-date" 
                                name="promotion-start-date" 
                                value="<?php echo htmlspecialchars($start_date); ?>" 
                                required 
                            />
                            <p class="error"><?php echo $errors['start_date'] ?? ''; ?></p>
                        </div>
                        <div>
                            <label for="promotion-end-date">Ngày kết thúc:</label>
                            <input 
                                type="date" 
                                id="promotion-end-date" 
                                name="promotion-end-date" 
                                value="<?php echo htmlspecialchars($end_date); ?>" 
                                required 
                            />
                            <p class="error"><?php echo $errors['end_date'] ?? ''; ?></p>
                        </div>
                    </div>

                    <div class="percent-input">
                        <label for="percent-discount">Giá trị giảm (%):</label>
                        <input 
                            type="number" 
                            id="percent-discount" 
                            name="percent-discount" 
                            value="<?php echo htmlspecialchars($percent_discount); ?>" 
                        />
                        <p class="error"><?php echo $errors['percent_discount'] ?? ''; ?></p>
                    </div>

                    <label for="discount">Giá trị đơn hàng tối thiểu:</label>
                    <input 
                        type="number" 
                        id="discount" 
                        name="discount" 
                        value="<?php echo htmlspecialchars($min_order); ?>" 
                        required 
                    />
                    <p class="error"><?php echo $errors['min_order'] ?? ''; ?></p>

                    <label for="max-discount">Số tiền giảm tối đa:</label>
                    <input 
                        type="number" 
                        id="max-discount" 
                        name="max-discount" 
                        value="<?php echo htmlspecialchars($max_discount); ?>" 
                        required 
                    />
                    <p class="error"><?php echo $errors['max_discount'] ?? ''; ?></p>

                    <label for="quantity">Số lượng:</label>
                    <input 
                        type="number" 
                        id="quantity" 
                        name="quantity" 
                        value="<?php echo htmlspecialchars($quantity); ?>" 
                        required 
                    />
                    <p class="error"><?php echo $errors['quantity'] ?? ''; ?></p>

                    <br>
                    <button type="submit" class="btn-submit">Cập nhật</button>
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

      <!--=============== SWIPER JS ===============-->
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>
      </body>
      </html>