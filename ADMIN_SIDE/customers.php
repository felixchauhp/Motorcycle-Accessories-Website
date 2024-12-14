<?php
session_start();
include 'checklogin.php';
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'head.php' ?>
   <!--=============== HEADER ===============-->
<?php include 'header.php' ?>
    <!--=============== CUSTOMERS ===============-->   
<body>
    <main class="main">
    <section class="products section--lg container">
      <div class="search-container">
        <form class="right-actions">
          <input type="text" id="search-input" name="search" placeholder="Tìm kiếm..." style="margin-right: auto;" />
          <!-- Lọc trạng thái -->
          <select id="status-filter" name="status" style="font-family: inherit; font-size: inherit;">
            <option>Tất cả trạng thái</option>
            <option>Đã xác nhận</option>
            <option>Đã đóng gói</option>
            <option>Đã giao</option>
            <option>Đã hủy</option>
          </select>
          <!-- Lọc thanh toán -->
          <select id="payment-filter" name="payment" style="font-family: inherit; font-size: inherit;">
            <option>Tất cả thanh toán</option>
            <option>Thành công</option>
            <option>Thất bại</option>
            <option>Đang chờ</option>
          </select>
          <button type="submit" class="btn flex btn__md" style="cursor: pointer;">Áp dụng</button>
          <a href="orders.php" class="btn flex btn__md" style="cursor: pointer;">Nhập lại</a>
        </form>
      </div>
            <div>
              <table class="product-table">
                <thead>
                  <tr>
                    <th>Mã khách hàng</th>
                    <th>Họ tên </th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ mặc định</th>
                    <th>Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>CUST0001</td>
                    <td>Nguyễn Châu Hoài Phúc </td>
                    <td>0354302484</td>
                    <td>felixchauhp@gmail.com</td>
                    <td>09 Nguyễn Thị Định, An Phú, Thủ Đức</td>
                    <td>
                        <a href="edit-customer.php">
                            <i class="fi fi-rs-edit table__trash"></i>
                        </a>
                        <a href="#">
                            <i class="fi fi-rs-trash table__trash"></i>
                        </a>
                    </td>
                  </tr>
                </tbody>
              </table>
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
