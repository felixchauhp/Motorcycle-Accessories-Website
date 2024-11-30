<?php include 'dashboard_data.php' ?>
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
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
  <div class="content">
    <div class="dashboard">
    <div class="date-picker">
      <form method="GET" action="" class="date-form">
        <label for="start_date">Từ:</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo $start_date; ?>">
        <label for="end_date">Đến:</label>
        <input type="date" id="end_date" name="end_date" value="<?php echo $end_date; ?>">
        <button type="submit" class="btn__md flex btn">Xem dữ liệu</button>
      </form>
    </div>
      <!-- Danh sách cần làm -->
      <h2>Danh sách cần làm</h2>
      <div class="grid-container">
        <div class="info-box">
          <h3><?php echo $confirmed_orders; ?></h3>
          <p>Đã xác nhận</p>
        </div>
        <div class="info-box">
          <h3><?php echo $packed_orders; ?></h3>
          <p>Đã đóng gói</p>
        </div>
        <div class="info-box">
          <h3><?php echo $delivered_orders; ?></h3>
          <p>Đã giao</p>
        </div>
        <div class="info-box">
          <h3><?php echo $canceled_orders; ?></h3>
          <p>Đơn Hủy</p>
        </div>
        <div class="info-box">
          <h3><?php echo $out_of_stock; ?></h3>
          <p>Sản Phẩm Hết Hàng</p>
        </div>
        <div class="info-box">
          <h3><?php echo $active_promotions; ?></h3>
          <p>Chương Trình Khuyến Mãi</p>
        </div>
      </div>

      <!-- Phân Tích Bán Hàng -->
      <br>
      <h2>Phân Tích Bán Hàng</h2>
      <div class="grid-container">
        <div class="info-box">
          <h3><?php echo number_format($total_sales, 0, ',', '.'); ?> VNĐ</h3>
          <p>Doanh số</p>
        </div>
        <div class="info-box">
          <h3><?php echo $total_orders; ?></h3>
          <p>Đơn hàng</p>
        </div>
        <div class="info-box">
          <h3><?php echo number_format($success_rate, 2); ?>%</h3>
          <p>Tỷ lệ đơn hàng thành công</p>
        </div>
        <div class="info-box">
          <h3><?php echo number_format($cancellation_rate, 2); ?>%</h3>
          <p>Tỷ lệ đơn hàng hủy</p>
        </div>
      </div>
    </div>
  </div>

    <!--=============== FOOTER ===============-->
    <?php include 'footer.php'; ?>
    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>
</html>
