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
  <link rel="stylesheet" href="assets/css/styles.css" />

  <style>
    /* Đặt toàn bộ trang với Flexbox để căn giữa nội dung */
    body {
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
      background-color: #f9f9f9;
    }

    /* Đảm bảo nội dung nằm giữa header và footer */
    .content {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Container bảng */
    .dashboard {
      width: 100%;
      max-width: 900px;
      padding: 20px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      box-sizing: border-box;
    }

    /* Tiêu đề */
    .dashboard h2 {
      font-size: 1.2em;
      color: #054c2a;
      margin-bottom: 10px;
    }

    /* Layout dạng grid */
    .grid-container {
      display: grid;
      gap: 15px;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    }

    /* Ô thông tin */
    .info-box {
      padding: 15px;
      text-align: center;
      background: #f3f3f3;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Style cho số liệu */
    .info-box h3 {
      font-size: 1.5em;
      color: #054c2a;
      margin: 5px 0;
    }

    .info-box p {
      font-size: 0.9em;
      color: #666;
      margin: 0;
    }
  </style>

  <title>MotorCycle Manager</title>
</head>
<body>
  <!--=============== HEADER ===============-->
  <?php include 'header.php'; ?>
  <!--=============== MAIN ===============-->
  <div class="content">
    <div class="dashboard">
      <!-- Danh sách cần làm -->
      <h2>Danh sách cần làm</h2>
      <div class="grid-container">
        <div class="info-box">
          <h3>0</h3>
          <p>Chờ Xác Nhận</p>
        </div>
        <div class="info-box">
          <h3>0</h3>
          <p>Chờ Lấy Hàng</p>
        </div>
        <div class="info-box">
          <h3>0</h3>
          <p>Đã Xử Lý</p>
        </div>
        <div class="info-box">
          <h3>0</h3>
          <p>Đơn Hủy</p>
        </div>
        <div class="info-box">
          <h3>0</h3>
          <p>Trả Hàng / Hoàn Tiền</p>
        </div>
        <div class="info-box">
          <h3>0</h3>
          <p>Sản Phẩm Bị Tạm Khóa</p>
        </div>
        <div class="info-box">
          <h3>0</h3>
          <p>Sản Phẩm Hết Hàng</p>
        </div>
        <div class="info-box">
          <h3>0</h3>
          <p>Chương Trình Khuyến Mãi</p>
        </div>
      </div>

      <!-- Phân Tích Bán Hàng -->
      <br>
      <h2>Phân Tích Bán Hàng</h2>
      <div class="grid-container">
        <div class="info-box">
          <h3>0</h3>
          <p>Doanh số</p>
        </div>
        <div class="info-box">
          <h3>0</h3>
          <p>Lượt truy cập</p>
        </div>
        <div class="info-box">
          <h3>0</h3>
          <p>Lượt xem</p>
        </div>
        <div class="info-box">
          <h3>0</h3>
          <p>Đơn hàng</p>
        </div>
        <div class="info-box">
          <h3>0,00%</h3>
          <p>Tỷ lệ chuyển đổi</p>
        </div>
      </div>
    </div>
  </div>

  <!--=============== FOOTER ===============-->
<?php include 'footer.php'; ?>
</body>
</html>
