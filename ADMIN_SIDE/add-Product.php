<?php
// Kết nối cơ sở dữ liệu
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
    $product_id = $_POST['product-id'];
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

    // Xử lý ảnh
    $product_images = [];
    if (isset($_FILES['product-image']) && $_FILES['product-image']['error'][0] === UPLOAD_ERR_OK) {
        $files = $_FILES['product-image'];
        for ($i = 0; $i < count($files['name']); $i++) {
            $tmp_name = $files['tmp_name'][$i];
            $name = basename($files['name'][$i]);
            $target_path = 'https://drive.google.com/drive/folders/1Wl8jCnbRd_lzSM0kN0v6y0Cv_2wv1uxB?usp=sharing' . $name; // Đảm bảo thư mục uploads tồn tại

            if (move_uploaded_file($tmp_name, $target_path)) {
                $product_images[] = $target_path;
            }
        }
    }

    // Chèn dữ liệu sản phẩm vào cơ sở dữ liệu
    $insert_product_query = "
        INSERT INTO products (ProductID, ProductName, Supplier, Category, Description, Functionality, InStock, Unit, OriginalPrice, SalePrice, DiscountPrice, StartDate, EndDate, Notes)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $insert_product_query)) {
        mysqli_stmt_bind_param($stmt, "ssssssisssssss", $product_id, $product_name, $product_supplier, $product_category, $product_info, $product_function, $product_quantity, $product_unit, $product_original_price, $product_price, $product_discount_price, $product_start_date, $product_end_date, $product_note);
        if (mysqli_stmt_execute($stmt)) {
            // Lưu các ảnh vào bảng images nếu có
            if ($product_images) {
                $product_id = mysqli_insert_id($conn); // Lấy ProductID vừa insert
                $insert_images_query = "INSERT INTO product_images (ProductID, ImagePath) VALUES (?, ?)";
                foreach ($product_images as $image_path) {
                    if ($image_stmt = mysqli_prepare($conn, $insert_images_query)) {
                        mysqli_stmt_bind_param($image_stmt, "is", $product_id, $image_path);
                        mysqli_stmt_execute($image_stmt);
                    }
                }
            }
            echo "Sản phẩm đã được thêm thành công!";
        } else {
            echo "Có lỗi xảy ra trong quá trình thêm sản phẩm!";
        }
        mysqli_stmt_close($stmt);
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
        <!-- Button to add a new product -->
        <div id="productForm">
          <h2 style="text-align: center;">Thêm sản phẩm</h2>
          <br>
          <form id="add-product" method="POST" enctype="multipart/form-data">
            <label for="product-id">Mã sản phẩm:</label>
            <input type="text" id="product-id" name="product-id" required />

            <label for="product-name">Tên sản phẩm:</label>
            <input type="text" id="product-name" name="product-name" required />

            <label for="product-supplier">Nhà cung cấp:</label>
            <input type="text" id="product-supplier" name="product-supplier" required />

            <label for="product-category">Danh mục:</label>
            <select id="filter-input" name="product-category" required>
              <option value="" disabled selected>Chọn</option>
              <option value="vo-xe-ruot-xe">Vỏ xe và ruột xe</option>
              <option value="nhong-sen-dia">Nhông sên dĩa</option>
              <option value="bac-dan">Bạc đạn</option>
              <option value="nhot">Nhớt</option>
              <option value="ac-quy">Ắc quy</option>
              <option value="bo-dia-bo-thang">Bố đĩa và bố thắng</option>
              <option value="phu-kien-khac">Các phụ kiện khác</option>
            </select>

            <label for="product-info">Mô tả:</label>
            <textarea id="product-info" name="product-info" required></textarea>

            <label for="product-function">Công dụng:</label>
            <input type="text" id="product-function" name="product-function" required />

            <label for="product-quantity">Tồn kho:</label>
            <input type="number" id="product-quantity" name="product-quantity" required />

            <label for="product-unit">Đơn vị tính:</label>
            <input type="text" id="product-unit" name="product-unit" required />

            <div id="product-prices">
              <div>
                <label for="product-original-price">Giá gốc:</label>
                <input type="number" id="product-original-price" name="product-original-price" required />
              </div>
              <div>
                <label for="product-price">Giá bán:</label>
                <input type="number" id="product-price" name="product-price" required />
              </div>
            </div>

            <label for="product-image">Ảnh sản phẩm (tối đa 1):</label>
            <div id="image-upload-container" style="border: 1px solid #ccc; padding: 10px; border-radius: 8px; display: flex; align-items: center; gap: 10px;">
                <input type="file" id="product-image" name="product-image[]" accept="image/*" multiple required style="display: none;" />
                <label for="product-image" style="cursor: pointer; padding: 10px; background-color: #f0f0f0; border-radius: 8px;">
                    Chọn ảnh
                </label>
                <div id="image-preview" style="display: flex; flex-wrap: nowrap; gap: 10px;"></div> <!-- Preview container for images -->
            </div>

            <label for="product-note">Ghi chú:</label>
            <textarea id="product-note" name="product-note" required></textarea>

            <br>
            <button type="submit">Thêm</button>
          </form>
        </div>   
      
    </main>

     <!--=============== FOOTER ===============-->
  <?php include 'footer.php'; ?>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
