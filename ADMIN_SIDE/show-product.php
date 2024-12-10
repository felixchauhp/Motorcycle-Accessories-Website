<?php
session_start();
include 'checklogin.php';
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
        $product_id = isset($_GET['product-id']) ? $_GET['product-id'] : '';
        if (empty($product_id)) {
            die("Không tìm thấy sản phẩm!");
        }
        
        // Truy vấn thông tin sản phẩm
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
        <div class="details__container container grid">
          <div class="details__group">
            <img
              src="<?= htmlspecialchars($product['Image']) ?>"
              alt="<?= htmlspecialchars($product['ProductName']) ?>"
              class="details__img"
            />
          </div>
          <div class="details__group">
            <h3 class="details__title"><?= htmlspecialchars($product['ProductName']) ?></h3>
            <p class="details__brand">Danh mục: <span><?= htmlspecialchars($productCategory) ?></span></p>
            <div class="details__price flex">
            <span class="new__price"><?= number_format($product['SalePrice'], 0, ',', '.') ?> VNĐ</span>
            <span class="new__price" style="color: gray"><?= number_format($product['BasePrice'], 0, ',', '.') ?> VNĐ</span>
            </div>
            <p class="short__description">Mô tả: <?= htmlspecialchars($product['Description']) ?></p>
            <p class="short__description">Công dung: <?= htmlspecialchars($product['Usage']) ?></p>
            <p class="short__description">Nhà cung cấp: <?= htmlspecialchars($product['Supplier']) ?></p>
            <p class="short__description">Đon vị tính: <?= htmlspecialchars($product['Unit']) ?></p>
            <p class="short__description" style="color: red">Ghi chú: <?= htmlspecialchars($product['Notes']) ?></p>
            <ul class="details__meta">
              <li class="meta__list flex"><span>SKU:</span><?= htmlspecialchars($product['ProductID']) ?></li>
              <li class="meta__list flex">
                <span>Tồn kho:</span><?= htmlspecialchars($product['InStock']) ?>
              </li>
            </ul>
          </div>
        </div>
      </section>

<?php include 'footer.php' ?>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
