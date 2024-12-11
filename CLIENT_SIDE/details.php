<?php
session_start();
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
      <?php
        // Lấy ID sản phẩm từ URL
        $product_id = isset($_GET['id']) ? $_GET['id'] : '';
<<<<<<< HEAD
=======
        // echo "<pre>";
        // print_r($product_id); // Hiển thị toàn bộ nội dung của $_SESSION
        // echo "</pre>";
        if (empty($product_id)) {
            die("Không tìm thấy sản phẩm!");
        }
>>>>>>> 58ec59198d565fd35cc6058fc3d6b98ea1c65fe0
        //truy vấn thông tin sản phẩm   
        $sql = "SELECT * FROM products WHERE ProductID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        } else {
            die("Sản phẩm không tồn tại!");
        }
      ?>
      <!--=============== DETAILS ===============-->
      <section class="details section--lg">
      <div id="product" data-id="<?= htmlspecialchars($product_id) ?>"></div>
        <div class="details__container container grid">
          <div class="details__group">
            <img
              src="<?= htmlspecialchars($product['Image']) ?>"
              alt=""
              class="details__img"
            />
          </div>
          <div class="details__group">
            <h3 class="details__title"><?= htmlspecialchars($product['ProductName']) ?></h3>
            <p class="details__brand">Danh mục: <span>Bình điện</span></p>
            <div class="details__price flex">
              <span class="new__price"><?= htmlspecialchars($product['SalePrice']) ?> VNĐ</span>
            </div>
            <p class="short__description">
            Mô tả:
            <?= htmlspecialchars($product['Description']) ?>
            </p>
            <p class="short__description" >
            Công dụng:
            <?= htmlspecialchars($product['Usage']) ?>
            </p>

            <ul class="products__list">
              <li class="list__item flex">
                <i class="fi-rs-crown"></i> Chính sách bảo hành cho tất cả các sản phẩm: 6 tháng nếu có hư hỏng do nhà sản xuất.
              </li>
              <li class="list__item flex">
                <i class="fi-rs-refresh"></i> Chính sách đổi trả: 3 ngày kể từ ngày giao hàng.
              </li>
              <li class="list__item flex">
                <i class="fi-rs-credit-card"></i> Với mọi đơn hàng, quý khách được quyền kiểm tra hàng rồi thanh toán.
              </li>
            </ul>
            <div class="details__action">
              <input type="number" class="quantity" value="3" />
              <a href="#" class="btn btn--sm">Thêm vào giỏ hàng</a>
            </div>
            <ul class="details__meta">
              <li class="meta__list flex"><span>SKU:</span><?= htmlspecialchars($product['ProductID']) ?></li>
              <li class="meta__list flex">
                <span>Tồn kho:</span><?= htmlspecialchars($product['InStock']) ?>
              </li>
            </ul>
          </div>
        </div>
      </section>

      <!--=============== DETAILS TAB ===============-->
      <section class="details__tab container">
  <div class="detail__tabs">
    <span class="detail__tab active-tab" data-target="#reviews">Đánh giá:</span>
  </div>
  <div class="details__tabs-content">
    <div class="details__tab-content active-tab" id="reviews">
      <div class="reviews__container grid">
        <div class="review__single">
          <div>
            <img src="./assets/img/avt1.jpg" alt="" class="review__img" />
            <h4 class="review__title">Nine Naphat</h4>
          </div>
          <div class="review__data">
            <div class="review__rating">
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
            </div>
            <p class="review__description">
              Sản phẩm chính hãng, chất lượng.
            </p>
            <span class="review__date">10:00 ngày 22 tháng 10 năm 2024</span>
          </div>
        </div>
        <div class="review__single">
          <div>
            <img src="./assets/img/avt2.jpg" alt="" class="review__img" />
            <h4 class="review__title">Srettha Thavisin</h4>
          </div>
          <div class="review__data">
            <div class="review__rating">
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
            </div>
            <p class="review__description">
              Sản phẩm tốt, giao hàng qua Thái Lan nhanh hơn cả việc tôi mất chức.
            </p>
            <span class="review__date">10:00 ngày 22 tháng 10 năm 2024</span>
          </div>
        </div>
        <div class="review__single">
          <div>
            <img src="./assets/img/avt3.jpg" alt="" class="review__img" />
            <h4 class="review__title">Engfa Waraha</h4>
          </div>
          <div class="review__data">
            <div class="review__rating">
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
              <i class="fi fi-rs-star"></i>
            </div>
            <p class="review__description">
              Thật sự không thích sản phẩm này lắm, thích sầu riêng hơn.
            </p>
            <span class="review__date">10:00 ngày 22 tháng 10 năm 2024</span>
          </div>
        </div>
      </div>
      <div class="review__form">
        <h4 class="review__form-title">Thêm đánh giá</h4>
        <div class="rate__product">
  <i class="fi fi-rs-star" data-value="1"></i>
  <i class="fi fi-rs-star" data-value="2"></i>
  <i class="fi fi-rs-star" data-value="3"></i>
  <i class="fi fi-rs-star" data-value="4"></i>
  <i class="fi fi-rs-star" data-value="5"></i>
</div>
        <form action="" class="form grid">
          <textarea
            class="form__input textarea"
            placeholder="Viết đánh giá"
            id="reviewText"
          ></textarea>
          <div class="form__group grid">
            <input type="text" placeholder="Tên" class="form__input" id="reviewName">
            <input type="email" placeholder="Địa chỉ email" class="form__input"  id="reviewEmail">
          </div>
          <div class="form__btn">
            <button class="btn" type="submit">Gửi</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


      <!--=============== PRODUCTS ===============-->
      <section class="products container section--lg">
        <h3 class="section__title">Sản phẩm <span>cùng danh mục</span></h3>
        <div class="products__container grid">
          <div class="product__item">
            <div class="product__banner">
              <a href="details.php" class="product__images">
                <img
                  src="assets/img/product-1-1.jpg"
                  alt=""
                  class="product__img default"
                />
                <img
                  src="assets/img/product-1-2.jpg"
                  alt=""
                  class="product__img hover"
                />
              </a>
              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Xem chi tiết">
                  <i class="fi fi-rs-eye"></i>
                </a>
              </div>
              <div class="product__badge light-pink">Hot</div>
            </div>
            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.php">
                <h3 class="product__title">Colorful Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>
              <a
                href="#"
                class="action__btn cart__btn"
                aria-label="Add To Cart"
              >
                <i class="fi fi-rs-shopping-bag-add"></i>
              </a>
            </div>
          </div>
        </div>
      </section>
      <script>
      // Truyền ProductID từ PHP sang JS
      var productId = <?php echo json_encode($product_id); ?>;
      </script>
      <!--=============== NEWSLETTER ===============-->
<?php include 'footer.php' ?>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>\
    <script src="reviews.js"></script>
  </body>
</html>