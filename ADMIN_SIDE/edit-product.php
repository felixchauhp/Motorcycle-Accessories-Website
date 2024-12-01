<?php
// Kết nối cơ sở dữ liệu
include 'db_connection.php';

// Lấy thông tin sản phẩm cần chỉnh sửa
$product_id = $_GET['product-id'] ?? '';
$product = null;

if ($product_id) {
    $query = "SELECT * FROM products WHERE ProductID = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $product_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $product = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
    $product_name = $_POST['product-name'];
    $product_supplier = $_POST['product-supplier'];
    $product_category = $_POST['product-category'];
    $product_info = $_POST['product-info'];
    $product_function = $_POST['product-function'];
    $product_quantity = $_POST['product-quantity'];
    $product_unit = $_POST['product-unit'];
    $product_original_price = $_POST['product-original-price'];
    $product_price = $_POST['product-price'];
    $product_note = $_POST['product-note'];

    // Xử lý ảnh từ link thay vì file upload
    $product_image = '';
    if (!empty($_POST['product-image-link'])) {
        $image_links = explode(',', $_POST['product-image-link']);
        $product_image = trim($image_links[0]); // Lấy link ảnh đầu tiên làm ảnh chính
    }

    // Cập nhật sản phẩm vào bảng products
    $update_product_query = "
        UPDATE products 
        SET 
            ProductName = ?, 
            BasePrice = ?, 
            SalePrice = ?, 
            Supplier = ?, 
            InStock = ?, 
            `Usage` = ?, 
            `Description` = ?, 
            Unit = ?, 
            Notes = ?, 
            Image = ? 
        WHERE ProductID = ?";

    if ($stmt = mysqli_prepare($conn, $update_product_query)) {
        mysqli_stmt_bind_param(
            $stmt,
            "ssdsiisssss",
            $product_name,
            $product_original_price,
            $product_price,
            $product_supplier,
            $product_quantity,
            $product_function,
            $product_info,
            $product_unit,
            $product_note,
            $product_image,
            $product_id
        );

        if (mysqli_stmt_execute($stmt)) {
            // Cập nhật danh mục vào bảng products_in_category
            $update_category_query = "
                INSERT INTO products_in_category (ProductID, Category)
                VALUES (?, ?)
                ON DUPLICATE KEY UPDATE Category = ?";
            if ($category_stmt = mysqli_prepare($conn, $update_category_query)) {
                mysqli_stmt_bind_param($category_stmt, "sss", $product_id, $product_category, $product_category);
                mysqli_stmt_execute($category_stmt);
                mysqli_stmt_close($category_stmt);
            }

            // Chuyển hướng sau khi cập nhật thành công
            header("Location: productManage.php?message=Sản phẩm đã được cập nhật thành công!");
            exit();
        } else {
            echo "Lỗi khi cập nhật sản phẩm: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Lỗi khi chuẩn bị truy vấn: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
   <!--=============== HEADER ===============-->
   <?php include 'head.php'; ?>
<body>
  <!--=============== HEADER ===============-->
  <?php include 'header.php'; ?>

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== Product Management ===============-->
      <section class="products container section--lg">
        <div id="productForm">
          <h2 style="text-align: center;">Chỉnh sửa sản phẩm</h2>
          <br>
          <form id="edit-product" method="POST">
            <label for="product-id">Mã sản phẩm:</label>
            <input type="text" id="product-id" name="product-id" value="<?= htmlspecialchars($product['ProductID'] ?? '') ?>" readonly />

            <label for="product-name">Tên sản phẩm:</label>
            <input type="text" id="product-name" name="product-name" value="<?= htmlspecialchars($product['ProductName'] ?? '') ?>" required />

            <label for="product-supplier">Nhà cung cấp:</label>
            <input type="text" id="product-supplier" name="product-supplier" value="<?= htmlspecialchars($product['Supplier'] ?? '') ?>" required />

            <label for="product-category">Danh mục:</label>
            <select id="filter-input" name="product-category" required>
              <option value="" disabled>Chọn</option>
              <option value="vo-xe-ruot-xe" <?= ($product['Category'] ?? '') === 'vo-xe-ruot-xe' ? 'selected' : '' ?>>Vỏ xe và ruột xe</option>
              <option value="nhong-sen-dia" <?= ($product['Category'] ?? '') === 'nhong-sen-dia' ? 'selected' : '' ?>>Nhông sên dĩa</option>
              <!-- Thêm các danh mục khác -->
            </select>

            <label for="product-info">Mô tả:</label>
            <textarea id="product-info" name="product-info" required><?= htmlspecialchars($product['Description'] ?? '') ?></textarea>

            <label for="product-function">Công dụng:</label>
            <input type="text" id="product-function" name="product-function" value="<?= htmlspecialchars($product['Usage'] ?? '') ?>" required />

            <label for="product-quantity">Tồn kho:</label>
            <input type="number" id="product-quantity" name="product-quantity" value="<?= htmlspecialchars($product['InStock'] ?? 0) ?>" required />

            <label for="product-unit">Đơn vị tính:</label>
            <input type="text" id="product-unit" name="product-unit" value="<?= htmlspecialchars($product['Unit'] ?? '') ?>" required />

            <div id="product-prices">
              <div>
                <label for="product-original-price">Giá gốc:</label>
                <input type="number" id="product-original-price" name="product-original-price" value="<?= htmlspecialchars($product['BasePrice'] ?? 0) ?>" required />
              </div>
              <div>
                <label for="product-price">Giá bán:</label>
                <input type="number" id="product-price" name="product-price" value="<?= htmlspecialchars($product['SalePrice'] ?? 0) ?>" required />
              </div>
            </div>

            <label for="product-image-link">Link ảnh sản phẩm:</label>
            <textarea id="product-image-link" name="product-image-link" required><?= htmlspecialchars($product['Image'] ?? '') ?></textarea>

            <label for="product-note">Ghi chú:</label>
            <textarea id="product-note" name="product-note" required><?= htmlspecialchars($product['Notes'] ?? '') ?></textarea>

            <br>
            <button type="submit">Cập nhật</button>
          </form>
        </div>
      </section>
    </main>

     <!--=============== FOOTER ===============-->
  <?php include 'footer.php'; ?>

    <script src="assets/js/main.js"></script>
  </body>
</html>
