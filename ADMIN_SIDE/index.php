<?php include 'dashboard_data.php'; ?>
<a?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Lấy ngày hiện tại
$today = date('Y-m-d');
$start_date = $today;
$end_date = $today;
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
  <div class="content">

    <div class="dashboard">
      <!-- Ẩn thanh chọn ngày -->
      <style>
        .date-picker {
          display: none;
        }
      </style>

      <h2>Danh sách cần làm</h2>
      <div class="grid-container">
        <a href="quanlydonhang.php?status=<?= urlencode('Đã xác nhận') ?>&start_date=<?= date('Y-m-d') ?>">
        <div class="info-box">
          <h3><?php echo $confirmed_orders; ?></h3>
          <p>Đã xác nhận</p>
        </div>
        </a>
        <a href="quanlydonhang.php?status=<?= urlencode('Đã đóng gói') ?>&start_date=<?= date('Y-m-d') ?>">
        <div class="info-box">
          <h3><?php echo $packed_orders; ?></h3>
          <p>Đã đóng gói</p>
        </div>
        </a>
        <a href="quanlydonhang.php?status=<?= urlencode('Đã giao') ?>&start_date=<?= date('Y-m-d') ?>">
        <div class="info-box">
          <h3><?php echo $delivered_orders; ?></h3>
          <p>Đã giao</p>
        </div>
        </a>
        <a href="quanlydonhang.php?status=<?= urlencode('Đã hủy') ?>&start_date=<?= date('Y-m-d') ?>">
        <div class="info-box">
          <h3><?php echo $canceled_orders; ?></h3>
          <p>Đơn Hủy</p>
        </div>
        </a>
        <a href="productManage.php?filter=out_of_stock">
        <div class="info-box">
          <h3><?php echo $out_of_stock; ?></h3>
          <p>Hết Hàng</p>
        </div>
        </a>
        <a href="discount.php?start_date=<?php echo date('Y-m-d'); ?>&end_date=<?php echo date('Y-m-d'); ?>&custom_var=value">
        <div class="info-box">
          <h3><?php echo $active_promotions; ?></h3>
          <p>Khuyến Mãi</p>
        </div>
        </a>
      </div>

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
          <p>Tỷ lệ đơn hàng bàn giao</p>
        </div>
        <div class="info-box">
          <h3><?php echo number_format($cancellation_rate, 2); ?>%</h3>
          <p>Tỷ lệ đơn hàng hủy</p>
        </div>
      </div>
    </div>
    </div>

    <div class="control-container">
        <!-- Nút Tab -->
        <div class="tab-buttons">
            <button class="tab-button" onclick="showTab('combined')">Tổng hợp</button>
            <button class="tab-button active-tab" onclick="showTab('orders')">Đơn hàng</button>
            <button class="tab-button" onclick="showTab('revenue')">Doanh thu</button>
        </div>

        <!-- Bộ chọn phạm vi ngày -->
        <div class="date-range">
            <label for="start-date">Ngày bắt đầu:</label>
            <input type="date" id="start-date" name="start-date">
            <label for="end-date">Ngày kết thúc:</label>
            <input type="date" id="end-date" name="end-date">
            <button onclick="updateChart()">Cập nhật</button>
        </div>
    </div>
        <!-- Vùng chứa biểu đồ -->
        <div class="tab-content">
            <div id="combined-tab" class="chart-container" style="display:none;">
                <canvas id="combinedChart"></canvas>
            </div>
            <div id="orders-tab" class="chart-container">
                <canvas id="ordersChart"></canvas>
            </div>
            <div id="revenue-tab" class="chart-container" style="display:none;">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
</main>

  <!--=============== FOOTER ===============-->
  <?php include 'footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="assets/js/get_data_test.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
