<!DOCTYPE html>
<html lang="en">
  <!--=============== DOCUMENT HEAD ===============-->
  <?php include 'head.php'; ?>

<body>
   <!--=============== HEADER ===============-->
   <?php include 'header.php'; ?>

    <!--=============== BREADCRUMB ===============-->
      <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
          <li><a href="index.php" class="breadcrumb__link">Trang chủ</a></li>
          <li><span class="breadcrumb__link">></span></li>
          <li><span class="breadcrumb__link">Chính sách giao hàng</span></li>
        </ul>
      </section>
    <!--=============== MAIN ===============-->
    <main class="main">
      <div class="product__content">
          <h1>Chính sách giao hàng</h1>
          <img src="./assets/img/logo.png" alt="Shipping Policy" class="logo__image" />
          <br>

          <h2 class="product__title">1. Khu vực giao hàng</h2>
          <p class="short__description">
              Motor Cycle cung cấp dịch vụ giao hàng trên toàn quốc. Chúng tôi hợp tác với các đơn vị vận chuyển uy tín để đảm bảo hàng hóa được giao đến tay khách hàng một cách nhanh chóng và an toàn.
          </p>

          <h2 class="product__title">2. Thời gian giao hàng</h2>
          <p class="short__description">
              Thời gian giao hàng tùy thuộc vào vị trí địa lý:
              <ul>
                  <li>Khu vực nội thành TP. Hồ Chí Minh: 1-2 ngày làm việc.</li>
                  <li>Khu vực tỉnh thành khác: 3-5 ngày làm việc.</li>
                  <li>Khu vực vùng sâu, vùng xa: 5-7 ngày làm việc.</li>
              </ul>
              <strong>Lưu ý:</strong> Thời gian giao hàng có thể thay đổi do điều kiện thời tiết, tình trạng giao thông, hoặc các sự cố bất khả kháng.
          </p>

          <h2 class="product__title">3. Phí giao hàng</h2>
          <p class="short__description">
              Phí giao hàng được tính dựa trên vị trí giao hàng và khối lượng đơn hàng. Cụ thể:
              <ul>
                  <li>Miễn phí giao hàng với đơn hàng từ 1.000.000 VNĐ trở lên.</li>
                  <li>Đơn hàng dưới 1.000.000 VNĐ: Phí giao hàng dao động từ 20.000 - 50.000 VNĐ tùy khu vực.</li>
              </ul>
              Phí giao hàng sẽ được hiển thị rõ trong quá trình thanh toán.
          </p>

          <h2 class="product__title">4. Quy trình giao hàng</h2>
          <p class="short__description">
              Sau khi đặt hàng thành công, đơn hàng của bạn sẽ được xử lý như sau:
              <ul>
                  <li><strong>Xác nhận đơn hàng:</strong> Nhân viên của chúng tôi sẽ liên hệ qua điện thoại hoặc email để xác nhận đơn hàng.</li>
                  <li><strong>Chuẩn bị hàng:</strong> Hàng hóa được đóng gói cẩn thận để đảm bảo an toàn trong quá trình vận chuyển.</li>
                  <li><strong>Giao hàng:</strong> Đơn hàng được chuyển đến đơn vị vận chuyển và giao đến địa chỉ khách hàng cung cấp.</li>
              </ul>
          </p>

          <h2 class="product__title">5. Chính sách kiểm tra hàng</h2>
          <p class="short__description">
              Khi nhận hàng, khách hàng có quyền kiểm tra sản phẩm trước khi thanh toán (nếu sử dụng dịch vụ COD). Nếu phát hiện sản phẩm bị lỗi, hỏng, hoặc không đúng với đơn hàng, bạn có thể từ chối nhận hàng và liên hệ với Motor Cycle để được hỗ trợ.
          </p>

          <h2 class="product__title">6. Trách nhiệm khi giao hàng</h2>
          <p class="short__description">
              <ul>
                  <li><strong>Motor Cycle:</strong> Chịu trách nhiệm về hàng hóa trong suốt quá trình vận chuyển cho đến khi giao đến tay khách hàng.</li>
                  <li><strong>Khách hàng:</strong> Kiểm tra kỹ hàng hóa khi nhận và phản hồi ngay lập tức nếu có vấn đề. Chúng tôi không chịu trách nhiệm với các khiếu nại liên quan đến hàng hóa sau khi khách hàng đã xác nhận nhận hàng thành công.</li>
              </ul>
          </p>

          <h2 class="product__title">7. Thay đổi thông tin giao hàng</h2>
          <p class="short__description">
              Nếu bạn muốn thay đổi địa chỉ hoặc thông tin giao hàng sau khi đặt hàng, vui lòng liên hệ với chúng tôi trong vòng 12 giờ kể từ khi đặt hàng. Thay đổi chỉ được chấp nhận nếu đơn hàng chưa được bàn giao cho đơn vị vận chuyển.
          </p>

          <h2 class="product__title">8. Liên hệ hỗ trợ</h2>
          <p class="short__description">
              Nếu có bất kỳ thắc mắc hoặc vấn đề liên quan đến giao hàng, xin vui lòng liên hệ:
              <br>
              <strong>Email:</strong> support@motorcycle.vn <br>
              <strong>Hotline:</strong> 0123 456 789
          </p>
      </div>
      <br>
    </main>

   <!--=============== FOOTER ===============-->
   <?php include 'footer.php'; ?>

  <!--=============== SWIPER JS ===============-->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script src="assets/js/main.js"></script>
</body>
</html>
