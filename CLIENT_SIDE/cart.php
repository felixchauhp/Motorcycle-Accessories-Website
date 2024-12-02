<?php
include 'db_connection.php';
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
          <li><span class="breadcrumb__link">Giỏ hàng</span></li>
        </ul>
      </section>

      <!--=============== CART ===============-->
      <section class="cart section--lg container">
        <div class="table__container">
          <table class="table">
            <thead>
              <tr>
                <th>Sản phẩm</th>
                <th>Tên</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <img
                    src="./assets//img/product-1-2.jpg"
                    alt=""
                    class="table__img"
                  />
                </td>
                <td>
                  <h3 class="table__title">
                    Sản phẩm
                  </h3>
                  <p class="table__description">
                    Mô tả.
                  </p>
                </td>
                <td>
                  <span class="table__price">110.000 VNĐ</span>
                </td>
                <td><input type="number" value="3" class="quantity" /></td>
                <td><span class="subtotal">330.000 VNĐ</span></td>
                <td><i class="fi fi-rs-trash table__trash"></i></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="cart__actions">
          <a href="#" class="btn flex btn__md">
            <i class="fi-rs-shuffle"></i> Cập nhật giỏ hàng
          </a>
          <a href="#" class="btn flex btn__md">
            <i class="fi-rs-shopping-bag"></i> Tiếp tục mua hàng
          </a>
        </div>

        <div class="divider">
          <i class="fi fi-rs-fingerprint"></i>
        </div>

        <div class="cart__group grid">
          <div>
            <div class="cart__coupon">
              <h3 class="section__title">Mã giảm giá</h3>
              <form action="" class="coupon__form form grid">
                <div class="form__group grid">
                  <input
                    type="text"
                    class="form__input"
                    placeholder="Enter Your Coupon"
                  />
                  <div class="form__btn">
                    <button class="btn flex btn--sm">
                      <i class="fi-rs-label"></i> Sử dụng
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="cart__total">
            <h3 class="section__title">Tổng thanh toán</h3>
            <table class="cart__total-table">
                <tr>
                  <td><span class="cart__total-title">Thành tiền</span></td>
                  <td><span class="cart__total-price">990.000 VNĐ</span></td>
                </tr>
                <tr>
                  <td><span class="cart__total-title">Phí vận chuyển</span></td>
                  <td><span class="cart__total-price">10.000 VNĐ</span></td>
                </tr>
                <tr>
                  <td><span class="cart__total-title">Tổng cộng</span></td>
                  <td><span class="cart__total-price">1.000.000 VNĐ</span></td>
                </tr>
            </table>
            <a href="checkout.html" class="btn flex btn--md">
              <i class="fi fi-rs-box-alt"></i> Tiến hành thanh toán
            </a>
          </div>
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