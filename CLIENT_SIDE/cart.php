<?php include 'cart_handle.php'; ?>
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
      <?php if (empty($_SESSION['cart'])): ?>
            <p>Hic, giỏ hàng của bạn đang trống.</p>
        <?php else: ?>
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
            <?php foreach ($_SESSION['cart'] as $id => $item): ?>
              <tr>
                <td>
                  <img
                  src="<?= htmlspecialchars($item['image']) ?>"
                    alt="Product Image"
                    class="table__img"
                  />
                </td>
                <td>
                  <h3 class="table__title">
                  <?= htmlspecialchars($item['name']) ?>
                  </h3>
                  <p class="table__description">
                    Mô tả.
                  </p>
                </td>
                <td>
                  <span class="table__price"><?= number_format($item['price']) ?> VNĐ</span>
                </td>
                <td><input type="number" value="<?= $item['quantity'] ?>" class="quantity" readonly /></td>
                <td><span class="subtotal"><?= number_format($item['price'] * $item['quantity']) ?> VNĐ</span></td>

                <td>
                <a href="cart.php?action=remove&ProductID=<?= $id ?>" class="table__trash">
                        <i class="fi fi-rs-trash"></i>
                      </a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?php endif; ?>
        </div>

        <div class="cart__actions">
          <a href="#" class="btn flex btn__md">
            <i class="fi-rs-shuffle"></i> Cập nhật giỏ hàng
          </a>
          <a href="shop.php" class="btn flex btn__md">
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
              <form action="" method = "POST" class="coupon__form form grid">
                <div class="form__group grid">
                  <input
                    type="text"
                    name="promo_code"
                    class="form__input"
                    placeholder="Enter Your Coupon"
                  />
                  <div class="form__btn">
                    <button class="btn flex btn--sm" type="submit" name="apply_promo">
                      <i class="fi-rs-label"></i> Sử dụng
                    </button>
                  </div>
                </div>
              </form>
              <?php if (isset($message)): ?>
                <p><?= $message ?></p>
              <?php endif; ?>
            </div>
          </div>

          <div class="cart__total">
            <h3 class="section__title">Tổng thanh toán</h3>
            <table class="cart__total-table">
                <tr>
                  <td><span class="cart__total-title">Thành tiền</span></td>
                  <td><span class="cart__total-price"><?= number_format($totalbefore, 0, ',', '.') ?> VNĐ</span></td>
                </tr>
                <tr>
                  <td><span class="cart__total-title">Số tiền giảm giá</span></td>
                  <td><span class="cart__total-price"><?= number_format($discount, 0, ',', '.') ?> VNĐ</span></td>
                  </tr>
                <tr>
                  <td><span class="cart__total-title">Tổng cộng</span></td>
                  <td><span class="cart__total-price"><?= number_format($total, 0, ',', '.') ?> VNĐ</span></td>
                </tr>
            </table>
            <a href="checkout.php" class="btn flex btn--md">
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