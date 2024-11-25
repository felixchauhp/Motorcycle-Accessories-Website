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
 <!--=============== HEAD ===============-->
 <?php include 'head.php'; ?>
<body>
  <!--=============== HEADER ===============-->
  <?php include 'header.php'; ?>

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
                        type="submit" 
                        class="btn flex btn__md" 
                        onclick="window.location.href='discount.php'">
                        Quay lại
                    </button>

                    <!-- Nút chỉnh sửa -->
                    <button 
                        type="button" 
                        class="btn flex btn__md" 
                        onclick="window.location.href='update-Discount.php?promoCode=<?= urlencode($promotion['PromoCode']); ?>'">
                        Chỉnh sửa
                    </button>
                </div>

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
