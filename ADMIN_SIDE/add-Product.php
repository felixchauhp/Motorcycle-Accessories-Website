<!DOCTYPE html>
<html lang="en">
   <!--=============== HEADER ===============-->
 <?php include 'head.php'; ?>
<body>
  <!--=============== HEADER ===============-->
  <?php include 'header.php'; ?>

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== BREADCRUMB ===============-->

      <!--=============== Product Management ===============-->
      <section class="products container section--lg">
        <!-- Button to add a new product -->
        <div id="productForm">
          <h2 style="text-align: center;">Thêm sản phẩm</h2>
          <br>
          <form id="add-product">
            <label for="product-id">Mã sản phẩm:</label>
            <input type="text" id="product-id" required />

            <label for="product-name">Tên sản phẩm:</label>
            <input type="text" id="product-name" required />

            <label for="product-supplier">Nhà cung cấp:</label>
            <input type="text" id="product-supplier" required />

            <label for="product-category">Danh mục:</label>
            <select id="filter-input">
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
            <textarea id="product-info" required></textarea>

            <label for="product-function">Công dụng:</label>
            <input type="text" id="product-function" required />
      
            <label for="product-quantity">Tồn kho:</label>
            <input type="number" id="product-quantity" required />
            
            <label for="product-unit">Đơn vị tính:</label>
            <input type="text" id="product-unit" required />
      
            <div id="product-prices">
              <div>
                <label for="product-original-price">Giá gốc:</label>
                <input type="number" id="product-original-price" required />
              </div>
              <div>
                <label for="product-price">Giá bán:</label>
                <input type="number" id="product-price" required />
              </div>
            </div>

            <div id="product-dates">
              <div>
                <label for="product-discount-price">Giá khuyến mãi:</label>
                <input type="number" id="product-discount-price" required />
              </div>
              <div>
                  <label for="product-start-date">Ngày bắt đầu:</label>
                  <input type="date" id="product-start-date" required />
              </div>
              <div>
                  <label for="product-end-date">Ngày kết thúc:</label>
                  <input type="date" id="promotion-end-date" required />
              </div>
            </div>
            
            <label for="product-image">Ảnh sản phẩm (tối đa 2):</label>
            <div id="image-upload-container" style="border: 1px solid #ccc; padding: 10px; border-radius: 8px; display: flex; align-items: center; gap: 10px;">
                <input type="file" id="product-image" accept="image/*" multiple required style="display: none;" />
                <label for="product-image" style="cursor: pointer; padding: 10px; background-color: #f0f0f0; border-radius: 8px;">
                    Chọn ảnh
                </label>
                <div id="image-preview" style="display: flex; flex-wrap: nowrap; gap: 10px;"></div> <!-- Preview container for images -->
            </div>
            <label for="product-note">Ghi chú:</label>
            <textarea id="product-info" required></textarea>
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
