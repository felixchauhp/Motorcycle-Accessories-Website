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
          <li><span class="breadcrumb__link">Chính sách thanh toán</span></li>
        </ul>
      </section>
    <!--=============== MAIN ===============-->
    <main class="main">
      <div class="product__content">
          <h1>Chính sách thanh toán</h1>
          <img src="./assets/img/logo.png" alt="Payment Policy" class="logo__image" />
          <br>

          <h2>1. Phương thức thanh toán</h2>
          <p >
              Để tạo điều kiện thuận lợi và linh hoạt cho khách hàng, Motor Cycle hỗ trợ các phương thức thanh toán sau:
              <ul>
                  <li>Thanh toán khi nhận hàng (COD).</li>
                  <li>Chuyển khoản ngân hàng.</li>
                  <li>Thanh toán qua thẻ tín dụng/thẻ ghi nợ.</li>
                  <li>Thanh toán qua ví điện tử (Momo, ZaloPay, VNPay, v.v.).</li>
              </ul>
          </p>

          <h2 >2. Thanh toán khi nhận hàng (COD)</h2>
          <p >
              Khách hàng có thể chọn thanh toán bằng tiền mặt khi nhận hàng. Vui lòng kiểm tra kỹ thông tin đơn hàng trước khi thanh toán cho nhân viên giao hàng. 
              <br><strong>Lưu ý:</strong> COD chỉ áp dụng cho đơn hàng trong phạm vi hỗ trợ giao hàng.
          </p>

          <h2 >3. Chuyển khoản ngân hàng</h2>
          <p >
              Thông tin tài khoản ngân hàng của Motor Cycle sẽ được cung cấp trong email xác nhận đơn hàng. Khi thực hiện chuyển khoản, vui lòng ghi rõ mã đơn hàng trong nội dung chuyển khoản để chúng tôi xác nhận nhanh chóng.
              <br>
              <strong>Lưu ý:</strong> Đơn hàng sẽ được xử lý sau khi nhận được thanh toán thành công.
          </p>

          <h2 >4. Thanh toán qua thẻ tín dụng/thẻ ghi nợ</h2>
          <p >
              Chúng tôi chấp nhận thanh toán qua các loại thẻ tín dụng/thẻ ghi nợ của các ngân hàng nội địa và quốc tế. Hệ thống thanh toán được tích hợp với các cổng thanh toán uy tín, đảm bảo an toàn tuyệt đối cho thông tin của khách hàng.
          </p>

          <h2 >5. Thanh toán qua ví điện tử</h2>
          <p >
              Thanh toán qua ví điện tử như Momo, ZaloPay, hoặc VNPay giúp bạn nhanh chóng và tiện lợi hơn. Sau khi đặt hàng, bạn sẽ nhận được mã QR để quét và hoàn tất giao dịch.
          </p>

          <h2 >6. Quy định về thời gian thanh toán</h2>
          <p>
              <ul>
                  <li>Đối với thanh toán trực tiếp (COD), khách hàng thanh toán toàn bộ khi nhận hàng.</li>
                  <li>Đối với chuyển khoản ngân hàng, thanh toán phải được thực hiện trong vòng 24 giờ kể từ khi đặt hàng. Nếu không, đơn hàng sẽ tự động bị hủy.</li>
              </ul>
          </p>

          <h2 >7. Chính sách hoàn tiền</h2>
          <p >
              Motor Cycle cam kết hoàn tiền trong các trường hợp sau:
              <ul>
                  <li>Sản phẩm giao sai hoặc bị lỗi không thể sử dụng.</li>
                  <li>Khách hàng hủy đơn hàng trước khi sản phẩm được giao.</li>
              </ul>
              Quá trình hoàn tiền sẽ được thực hiện qua phương thức thanh toán ban đầu trong vòng 7-10 ngày làm việc.
          </p>

          <h2 >8. Bảo mật thông tin thanh toán</h2>
          <p >
              Motor Cycle áp dụng các tiêu chuẩn bảo mật cao nhất để bảo vệ thông tin thanh toán của khách hàng. Mọi giao dịch đều được mã hóa và xử lý an toàn qua các cổng thanh toán uy tín.
              <br><strong>Lưu ý:</strong> Chúng tôi không lưu trữ thông tin thẻ tín dụng/thẻ ghi nợ của khách hàng.
          </p>

          <h2 >9. Liên hệ</h2>
          <p >
              Nếu bạn gặp khó khăn trong quá trình thanh toán, vui lòng liên hệ với chúng tôi để được hỗ trợ:
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
