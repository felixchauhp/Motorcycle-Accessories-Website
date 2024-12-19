<?php
include 'cart_handle.php';
?>
<?php include 'checkout_handle.php'; 
?>

<!DOCTYPE html>
<html lang="en">
  <!--=============== DOCUMENT HEAD ===============-->
  <?php include 'head.php'; ?>

<body>
   <!--=============== HEADER ===============-->
   <?php include 'header.php'; ?>

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== BREADCRUMB ===============-->
      <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
          <li><a href="index.html" class="breadcrumb__link">Trang chủ</a></li>
          <li><span class="breadcrumb__link">></span></li>
          <li><span class="breadcrumb__link">Đặt hàng</span></li>
        </ul>
      </section>

      <!--=============== CHECKOUT ===============-->
      <section class="checkout section--lg">
        <div class="checkout__container container grid">
          <div class="checkout__group">
            <h3 class="section__title">Thông tin cá nhân</h3>
            <form id="checkoutForm" class="form grid" method="POST" action="checkout_handle.php" onsubmit="return confirmOrder()" >
              <input type="text" name="customer_name" placeholder="Họ và tên" class="form__input" required/>
              <input type="text" name="address" placeholder="Địa chỉ" class="form__input" required/>
              <input type="text" name="phone" placeholder="Số điện thoại" class="form__input" required/>
              <input type="email" name="email" placeholder="Email" class="form__input" required/>
              <input type="hidden" name="payment_method" id="payment_method">
              <input type="hidden" name="cart" id="cart" value='<?= json_encode($_SESSION['cart']) ?>'>
            </form> 
          </div>
          <div class="checkout__group">
            <h3 class="section__title">Chi tiết đơn hàng</h3>
            <?php if (empty($_SESSION['cart'])): ?>
            <p>Không có sản phẩm trong đơn hàng.</p>
            <?php else: ?>
            <table class="order__table">
              <thead>
                <tr>
                  <th colspan="2">Sản phẩm</th>
                  <th>Thành tiền</th>
                </tr>
              </thead>
              <?php foreach ($_SESSION['cart'] as $id => $item): ?>
              <tbody>
                <tr>
                  <td>
                    <img
                      src="<?= htmlspecialchars($item['image']) ?>"
                      alt=""
                      class="order__img"
                    />
                  </td>
                  <td>
                    <h3 class="table__title"><?= htmlspecialchars($item['name']) ?></h3>
                    <p class="table__quantity">x <?= $item['quantity'] ?></p>
                  </td>
                  <td><span class="table__price"><?= number_format($item['price'] * $item['quantity'] ) ?> VNĐ</span></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <h3 class="section__title" style="margin-top:25px; margin-left: 300px">Tổng số tiền: <span><?= number_format($_SESSION['total'] - ($_SESSION['discount'] ?? 0) , 0, ',', '.') ?> VNĐ</span></h3>
            <?php endif; ?>
            <div class="payment__methods" >
              <h3 class="checkout__title payment__title">Phương thức thanh toán</h3>
              <div class="payment__option flex">
                <input
                  type="radio"
                  name="radio"
                  value="chuyen_khoan"
                  id="l1"
                  checked
                  class="payment__input"

                />
                <label for="l1" class="payment__label"
                  >Chuyển khoản</label
                >
              </div>
              <div class="payment__option flex">
                <input
                  type="radio"
                  name="radio"
                  value="tien_mat"
                  id="l2"
                  class="payment__input"
                />
                <label for="l2" class="payment__label">Tiền mặt</label>
              </div>
            </div>
            <button type="submit" id="confirmOrderBtn" form="checkoutForm" name="place_order" class="btn btn--md" >Đặt hàng</button>
          </div>
        </div>
      </section>
  </main>

  <!--=============== FOOTER ===============-->
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-----------------------xử lí pop up đặt hàng------------------------------>
  <!-- <script>
    document.getElementById('confirmOrderBtn').addEventListener('click', function (event) {
    event.preventDefault(); // Ngăn chặn hành vi mặc định của nút

    Swal.fire({
        title: 'Xác nhận đặt hàng',
        text: 'Bạn có chắc chắn muốn đặt hàng không?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Đặt hàng thành công!',
                'Đơn hàng của bạn đã được gửi.',
                'success'
            ).then(() => {
                // Gửi form bằng JavaScript
                document.getElementById('checkoutForm').submit();
                indow.location.href = 'order_success.php';
            });
        } else {
            Swal.fire(
                'Hủy đặt hàng',
                'Bạn đã hủy đơn hàng.',
                'info'
            );
        }
    });
});
</script> -->
<?php include 'footer.php'; ?>
  <!--=============== SWIPER JS ===============-->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script src="assets/js/main.js"></script>

</body>
</html>