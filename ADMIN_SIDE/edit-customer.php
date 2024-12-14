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
        <h2 style="text-align: center;">Chỉnh sửa mã khuyến mãi</h2>
        <br>
        <form id="edit-promotion" method="POST" action="">
          <label for="promo-name">Tên mã:</label>
          <input 
            type="text" 
            id="promo-name" 
            name="promo-name" 
            value="" 
            required 
          />
          <p class="error"></p>

          <label for="promo-code">Mã khuyến mãi:</label>
          <input 
            type="text" 
            id="promo-code" 
            name="promo-code" 
            value="" 
            required 
          />
          <p class="error"></p>

          <div id="promotion-dates">
            <div>
              <label for="promotion-start-date">Ngày bắt đầu:</label>
              <input 
                type="date" 
                id="promotion-start-date" 
                name="promotion-start-date" 
                value="" 
                required 
              />
              <p class="error"></p>
            </div>
            <div>
              <label for="promotion-end-date">Ngày kết thúc:</label>
              <input 
                type="date" 
                id="promotion-end-date" 
                name="promotion-end-date" 
                value="" 
                required 
              />
              <p class="error"></p>
            </div>
          </div>

          <div class="percent-input">
            <label for="percent-discount">Giá trị giảm (%):</label>
            <input 
              type="number" 
              id="percent-discount" 
              name="percent-discount" 
              value="" 
            />
            <p class="error"></p>
          </div>

          <label for="discount">Giá trị đơn hàng tối thiểu:</label>
          <input 
            type="number" 
            id="min_order" 
            name="min_order" 
            value="" 
            required 
          />
          <p class="error"></p>

          <label for="max-discount">Số tiền giảm tối đa:</label>
          <input 
            type="number" 
            id="max_discount" 
            name="max_discount" 
            value="" 
            required 
          />
          <p class="error"></p>

          <label for="quantity">Số lượng:</label>
          <input 
            type="number" 
            id="quantity" 
            name="quantity" 
            value="" 
            required 
          />
          <p class="error"></p>

          <br>
          <button type="submit" class="btn flex btn__md">Cập nhật</button>
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
