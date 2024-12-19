<?php
session_start();
include 'checklogin.php';
// Kết nối cơ sở dữ liệu
include 'db_staff_connection.php';

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

    // Xử lý ảnh từ link thay vì file upload
    $product_image = '';
    if (!empty($_POST['product-image-link'])) {
        $image_links = explode(',', $_POST['product-image-link']);
        $product_image = trim($image_links[0]); // Lấy link ảnh đầu tiên làm ảnh chính
    }

    // Chèn dữ liệu sản phẩm vào bảng products
    $insert_product_query = "
        INSERT INTO products (`ProductID`, `ProductName`, `BasePrice`, `SalePrice`, `Supplier`, `InStock`, `Usage`, `Description`, `Unit`, `Notes`, `Image`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $insert_product_query)) {
        mysqli_stmt_bind_param(
            $stmt,
            "ssdsiisssss",
            $product_id,
            $product_name,
            $product_original_price,
            $product_price,
            $product_supplier,
            $product_quantity,
            $product_function,
            $product_info,
            $product_unit,
            $product_note,
            $product_image
        );

        if (mysqli_stmt_execute($stmt)) {
            // Lấy ProductID vừa thêm
            $new_product_id = mysqli_insert_id($conn);

            // Thêm liên kết danh mục vào bảng products_in_category
            $insert_category_query = "INSERT INTO products_in_category (`ProductID`, `Category`) VALUES (?, ?)";
            if ($category_stmt = mysqli_prepare($conn, $insert_category_query)) {
                mysqli_stmt_bind_param($category_stmt, "is", $new_product_id, $product_category);
                mysqli_stmt_execute($category_stmt);
                mysqli_stmt_close($category_stmt);
            }

            // Chuyển hướng sau khi thêm thành công
            header("Location: products.php?message=Sản phẩm đã được thêm thành công!");
            exit();
        } else {
            echo "Lỗi khi thêm sản phẩm: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Lỗi khi chuẩn bị truy vấn: " . mysqli_error($conn);
    }
}
?>


<?php
if (isset($_GET['message'])) {
    echo "<script>alert('" . htmlspecialchars($_GET['message']) . "');</script>";
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
          <form id="add-product" method="POST">
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

            <label for="product-image-link">Link ảnh sản phẩm:</label>
            <textarea id="product-image-link" name="product-image-link" placeholder="Nhập một hoặc nhiều link ảnh, cách nhau bởi dấu phẩy" required></textarea>

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
