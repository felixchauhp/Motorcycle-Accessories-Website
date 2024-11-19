<?php
// Kết nối cơ sở dữ liệu
include 'db_connection.php';

// Lấy mã giảm giá từ URL
if (isset($_GET['promoCode'])) {
    $promo_code = urldecode($_GET['promoCode']);

    // Truy vấn dữ liệu khuyến mãi
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
} else {
    die("Không tìm thấy mã giảm giá!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/styles2.css">
    <title>Chi tiết mã giảm giá</title>
</head>
<body>
    <!--=============== HEADER ===============-->
    <header>
        <nav class="nav container">
            <a href="index-manage.html" class="nav__logo">
                <img class="nav__logo-img" src="assets/img/logo.png" alt="website logo">
            </a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="productManage.html" class="nav__link">Sản phẩm</a></li>
                    <li class="nav__item"><a href="quanlydonhang.html" class="nav__link">Đơn hàng</a></li>
                    <li class="nav__item"><a href="discount.html" class="nav__link active-link">Khuyến mãi</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main">
        <section class="promotions container section--lg">
            <div id="promotionForm">
                <h2 style="text-align: center;">Chi tiết mã giảm giá</h2>
                <br>
                <form id="view-promotion" method="POST" action="">
                    <label for="promo-name">Tên mã:</label>
                    <input 
                        type="text" 
                        id="promo-name" 
                        value="<?= htmlspecialchars($promotion['PromoName']); ?>" 
                        readonly
                    />

                    <label for="promo-code">Mã khuyến mãi:</label>
                    <input 
                        type="text" 
                        id="promo-code" 
                        value="<?= htmlspecialchars($promotion['PromoCode']); ?>" 
                        readonly
                    />

                    <div id="promotion-dates">
                        <div>
                            <label for="promotion-start-date">Ngày bắt đầu:</label>
                            <input 
                                type="date" 
                                id="promotion-start-date" 
                                value="<?= htmlspecialchars($promotion['StartDate']); ?>" 
                                readonly
                            />
                        </div>
                        <div>
                            <label for="promotion-end-date">Ngày kết thúc:</label>
                            <input 
                                type="date" 
                                id="promotion-end-date" 
                                value="<?= htmlspecialchars($promotion['EndDate']); ?>" 
                                readonly
                            />
                        </div>
                    </div>

                    <div class="percent-input">
                        <label for="percent-discount">Giá trị giảm (%):</label>
                        <input 
                            type="number" 
                            id="percent-discount" 
                            value="<?= htmlspecialchars($promotion['PromoRate']); ?>" 
                            readonly
                        />
                    </div>

                    <label for="min-order">Giá trị đơn hàng tối thiểu:</label>
                    <input 
                        type="number" 
                        id="min-order" 
                        value="<?= htmlspecialchars($promotion['MinValue']); ?>" 
                        readonly
                    />

                    <label for="max-discount">Số tiền giảm tối đa:</label>
                    <input 
                        type="number" 
                        id="max-discount" 
                        value="<?= htmlspecialchars($promotion['MaxAmount']); ?>" 
                        readonly
                    />

                    <label for="quantity">Số lượng:</label>
                    <input 
                        type="number" 
                        id="quantity" 
                        value="<?= htmlspecialchars($promotion['Quantity']); ?>" 
                        readonly
                    />

                    <br>
                    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                    <!-- Nút quay lại -->
                    <button
                        type="button" 
                        class="btn-submit btn flex btn--md" 
                        style="flex: 1; margin-right: 10px;"
                        onclick="window.location.href='discount.php'">
                        Quay lại danh sách khuyến mãi
                    </button>

                    <!-- Nút chỉnh sửa -->
                    <button 
                        type="button" 
                        class="btn-submit btn flex btn--md" 
                        style="flex: 1;"
                        onclick="window.location.href='update-Discount.php?promoCode=<?= urlencode($promotion['PromoCode']); ?>'">
                        Chỉnh sửa mã giảm giá
                    </button>
                </div>

                </form>
            </div>
        </section>
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer container">
        <div class="footer__container grid">
            <div class="footer__content">
                <a href="index.html" class="footer__logo">
                    <img src="./assets/img/logo.png" alt="" class="footer__logo-img">
                </a>    
                <div class="footer__social">
                    <h4 class="footer__subtitle">MotorCycle đã có mặt trên:</h4>
                    <div class="footer__links flex">
                        <a href="#"><img src="./assets/img/icon-facebook.svg" alt="" class="footer__social-icon"></a>
                        <a href="#"><img src="./assets/img/icon-twitter.svg" alt="" class="footer__social-icon"></a>
                        <a href="#"><img src="./assets/img/icon-instagram.svg" alt="" class="footer__social-icon"></a>
                        <a href="#"><img src="./assets/img/icon-pinterest.svg" alt="" class="footer__social-icon"></a>
                        <a href="#"><img src="./assets/img/icon-youtube.svg" alt="" class="footer__social-icon"></a>
                    </div>
                </div>
            </div> 
            <div class="footer__content">
                <h4 class="footer__subtitle">Thông tin liên hệ</h4>
                <p class="footer__description"><span>Địa chỉ:</span> Công ty CP-TM-DV Xe Gắn Máy, 100 phường Đông Hòa, TP. Dĩ An, tỉnh Bình Dương, Việt Nam.</p>
                <p class="footer__description"><span>Hotline:</span> +84 001 929 992</p>
                <p class="footer__description"><span>Email:</span> contact@motorcycle.vn</p>
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
