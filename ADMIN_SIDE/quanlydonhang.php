<?php
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
     <!-- Bootstrap JS (for dropdown functionality) -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
    <link rel="stylesheet" href="./assets/css/styles.css" />

    <title>Ecommerce Website</title>
</head>

    <!--=============== HEADER ===============-->
    <header>
        <nav class="nav container">
            <a href="index-manage.php" class="nav__logo">
                <img class="nav__logo-img" src="assets/img/logo.png" alt="website logo" />
            </a>
            <div class="nav__menu" id="nav-menu">
                <div class="nav__menu-top">
                    <a href="index-manage.php" class="nav__menu-logo">
                        <img src="./assets/img/logo.png" alt="">
                    </a>
                    <div class="nav__close" id="nav-close">
                        <i class="fi fi-rs-cross-small"></i>
                    </div>
                </div>
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="productManage.php" class="nav__link">Sản phẩm</a>
                    </li>
                    <li class="nav__item">
                        <a href="quanlydonhang.php" class="nav__link">Đơn hàng</a>
                    </li>
                    <li class="nav__item">
                        <a href="discount.php" class="nav__link active-link">Khuyến mãi</a>
                    </li>
                </ul>
                <div class="header__user-actions">
                    <a href="#" class="header__action-btn" title="Notification">
                        <img src="assets/img/bell.svg" alt="" />
                        <span class="count">3</span>
                    </a>
                    <a href="accounts-manager.php" class="header__action-btn" id="user-icon" title="User">
                        <img src="assets/img/icon-user.svg" alt="" />
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <!--=============== ORDER ===============-->   
<body>
    <main class="main">
        <section class="wishlist section--lg container">
            <div class="table__container">
              <table class="table">
                <thead>
                  <tr>
                    <th>Mã</th>
                    <th>Sản phẩm</th>
                    <th>Thành tiền</th>
                    <th>Ngày tạo đơn</th>
                    <th>Trạng thái</th>
                    <th>Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($orders as $order): ?>
                  <tr>  
                  <td>
                            <?= htmlspecialchars($order['OrderID']) ?>
                  </td>  
                  <td>
                        <p class="table__description">
                              <?= htmlspecialchars($order['OrderID']) ?>
                        </p>
                  </td>
                    <td>
                      <span class="table__price">
                              <?= htmlspecialchars($order['TotalDue']) ?>
                      </span>
                    </td>
                    <td><span class="table__stock">
                              <?= htmlspecialchars($order['OrderDate']) ?>
                        </span>
                    </td>
                    <td>
                                <select id="status" onchange="removeSelectedOption()">
                                    <option value="">-- Chọn trạng thái --</option>
                                    <option value="confirmed">Đã xác nhận</option>
                                    <option value="packed">Đã đóng gói</option>
                                    <option value="delivered">Đã giao</option>
                                    <option value="canceled">Đã hủy</option>
                                </select>
                    
                                <script>
                                    function removeSelectedOption() {
                                        const select = document.getElementById("status");
                                        const selectedIndex = select.selectedIndex;
                            
                                        if (selectedIndex > 0) { // Bỏ qua option đầu tiên
                                            select.options[selectedIndex].disabled = true; // Loại bỏ option đã chọn
                                        }
                                    }
                                </script>
                    </td>
                    <td>
                        <i class="fi fi-rs-trash table__trash"></i>
                        <!-- Nút In -->
                        <button onclick="window.print()">
                          <i class="fi fi-rs-print table__trash "></i>
                        </button>
                        <i class="fi fi-rs-menu-dots table__trash"></i>
                    </td>
                  </tr>
                <?php endforeach; ?>                    
                </tbody>
              </table>
              <ul class="pagination" id="pagination">
                <!-- Sẽ được điền bằng JavaScript -->
            </ul>
            </div>
          </section>
  </main>
  <!--=============== FOOTER ===============-->
  <footer class="footer container">
    <div class="footer__container grid">
      <div class="footer__content">
            <a href="index.php" class="footer__logo">
                <img src="./assets/img/logo.png" alt="" class="footer__logo-img" />
            </a>    
            <div class="footer__social">
                <h4 class="footer__subtitle">MotorCycle đã có mặt trên:</h4>
                <div class="footer__links flex">
                    <a href="#"><img src="./assets/img/icon-facebook.svg" alt="" class="footer__social-icon" /></a>
                    <a href="#"><img src="./assets/img/icon-twitter.svg" alt="" class="footer__social-icon" /></a>
                    <a href="#"><img src="./assets/img/icon-instagram.svg" alt="" class="footer__social-icon" /></a>
                    <a href="#"><img src="./assets/img/icon-pinterest.svg" alt="" class="footer__social-icon" /></a>
                    <a href="#"><img src="./assets/img/icon-youtube.svg" alt="" class="footer__social-icon" /></a>
                </div>
              </div>
      </div> 
      <div class="footer__content">
              <h4 class="footer__subtitle">Thông tin liên hệ</h4>
              <p class="footer__description">
                  <span>Địa chỉ:</span> Công ty CP-TM-DV Xe Gắn Máy, 100 phường Đông Hòa, TP. Dĩ An, tỉnh Bình Dương, Việt Nam.
              </p>
              <p class="footer__description">
                  <span>Hotline:</span> +84 001 929 992
              </p>
              <p class="footer__description">
                  <span>Email:</span> contact@motorcycle.vn
              </p>
        </div>
      </div>
    <div class="footer__bottom">
        <p class="copyright">&copy; 2024. All right reserved</p>
        <span class="designer">Website created by Group 4</span>
    </div>
</footer>

<script>
Truyền dữ liệu sản phẩm từ PHP sang JavaScript
 const orders = <?php echo json_encode($orders); ?>;
 console.log(orders);   Để kiểm tra xem dữ liệu có được truyền đúng không                                                
 const itemsPerPage = 20;   Số sản phẩm hiển thị mỗi trang
 let currentPage = 1;   Trang hiện tại
 let filteredorders = [...orders];   Mảng sản phẩm đã được lọc (nếu có lọc)

 function renderorders(page) {
     const start = (page - 1) * itemsPerPage;
     const end = start + itemsPerPage;

      Lấy các sản phẩm cần hiển thị cho trang hiện tại
     const ordersToRender = filteredorders.slice(start, end);
     const tableBody = document.querySelector('table.product-table tbody');
     tableBody.innerHTML = '';   Xóa danh sách sản phẩm cũ

      Render các sản phẩm cho trang hiện tại
     ordersToRender.forEach((product) => {
         const row = document.createElement('tr');
         row.innerHTML = `
             <td><img src="${product.ProductImage}" alt="${product.ProductName}" /></td>
             <td>${product.ProductID}</td>
             <td>${product.ProductName}</td>
             <td>${product.BasePrice}</td>
             <td>${product.SalePrice}</td>
             <td>${product.InStock}</td>
             <td>${product.Notes}</td>
             <td>${product.Category}</td>
             <td>
                 <button onclick="editProduct('${product.ProductID}')"><i class="fi fi-rs-edit edit-icon"></i></button>
                 <button onclick="deleteProduct('<?= $product['ProductID'] ?>')">
                     <i class="fi fi-rs-trash trash-icon"></i>
                 </button>

                 <button onclick="goToDetail('${product.ProductID}')"><i class="fi fi-rs-menu-dots go-to-icon"></i></button>
             </td>
         `;
         tableBody.appendChild(row);
     });

      Render phân trang
     renderPagination(filteredorders.length);
 }

  Hàm render phân trang
 function renderPagination(filteredProductCount) {
     const pagination = document.getElementById('pagination');
     pagination.innerHTML = '';   Xóa phân trang cũ

     const totalPages = Math.ceil(filteredProductCount / itemsPerPage);   Tính tổng số trang

      Thêm nút Prev nếu không phải trang đầu tiên
     if (currentPage > 1) {
         const prevButton = document.createElement('li');
         prevButton.innerHTML = `<a href="#" class="pagination__link" onclick="goToPage(${currentPage - 1})">«</a>`;
         pagination.appendChild(prevButton);
     }

      Thêm nút trang đầu tiên
     const firstPage = document.createElement('li');
     firstPage.innerHTML = `<a href="#" class="pagination__link ${currentPage === 1 ? 'active' : ''}" onclick="goToPage(1)">1</a>`;
     pagination.appendChild(firstPage);

      Dấu ba chấm nếu cần
     if (currentPage > 3) {
         const dots = document.createElement('li');
         dots.innerHTML = `<span class="pagination__dots">...</span>`;
         pagination.appendChild(dots);
     }

      Thêm các nút trang ở giữa
     for (let i = Math.max(2, currentPage - 1); i <= Math.min(totalPages - 1, currentPage + 1); i++) {
         const pageItem = document.createElement('li');
         pageItem.innerHTML = `<a href="#" class="pagination__link ${currentPage === i ? 'active' : ''}" onclick="goToPage(${i})">${i}</a>`;
         pagination.appendChild(pageItem);
     }

      Dấu ba chấm trước trang cuối nếu cần
     if (currentPage < totalPages - 2) {
         const dots = document.createElement('li');
         dots.innerHTML = `<span class="pagination__dots">...</span>`;
         pagination.appendChild(dots);
     }

      Thêm nút trang cuối cùng
     if (totalPages > 1) {
         const lastPage = document.createElement('li');
         lastPage.innerHTML = `<a href="#" class="pagination__link ${currentPage === totalPages ? 'active' : ''}" onclick="goToPage(${totalPages})">${totalPages}</a>`;
         pagination.appendChild(lastPage);
     }

      Thêm nút Next nếu không phải trang cuối cùng
     if (currentPage < totalPages) {
         const nextButton = document.createElement('li');
         nextButton.innerHTML = `<a href="#" class="pagination__link" onclick="goToPage(${currentPage + 1})">»</a>`;
         pagination.appendChild(nextButton);
     }
 }

  Hàm chuyển đến trang khác
 function goToPage(page) {
     if (page >= 1 && page <= Math.ceil(filteredorders.length / itemsPerPage)) {
         currentPage = page;
         renderorders(currentPage);
     }
 }

  Hàm xem chi tiết sản phẩm
 function goToDetail(productId) {
     window.location.href = `details.php?id=${productId}`;
 }

  Ban đầu, render trang đầu tiên
 renderorders(currentPage);







 document.querySelectorAll('.delete-btn').forEach(button => {
     button.addEventListener('click', function() {
         const productId = this.dataset.productId;  Lấy productId từ data attribute
         deleteProduct(productId);  Gọi hàm xóa sản phẩm
     });
 });

 function deleteProduct(productId) {
     console.log("Bắt đầu xóa sản phẩm với ID: " + productId);   Debug log
      Hiển thị hộp thoại xác nhận
     const confirmDelete = confirm("Bạn có chắc chắn muốn xóa sản phẩm này?");
     if (!confirmDelete) {
         return;   Nếu người dùng không xác nhận, thoát khỏi hàm
     }

      Tạo đối tượng XMLHttpRequest
     const xhr = new XMLHttpRequest();
    
      Cấu hình yêu cầu AJAX
     xhr.open("POST", "delete_product.php", true);
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      Xử lý phản hồi từ máy chủ
     xhr.onload = function() {
         if (xhr.status === 200) {
             const response = JSON.parse(xhr.responseText);
             if (response.success) {
                 alert("Sản phẩm đã được xóa thành công!");

                  Cập nhật lại giao diện sau khi xóa sản phẩm
                  Loại bỏ sản phẩm khỏi mảng filteredorders
                 filteredorders = filteredorders.filter(product => product.ProductID !== productId);
                
                  Gọi lại hàm render để cập nhật giao diện
                 renderorders(currentPage);
                 renderPagination(filteredorders.length);
             } else {
                 alert("Lỗi khi xóa sản phẩm: " + response.message);
             }
         } else {
             alert("Đã xảy ra lỗi khi xóa sản phẩm.");
         }
     };

      Gửi dữ liệu (product_id) đến máy chủ
     xhr.send("product_id=" + productId);
 }



  Render orders for the current page
 function renderorders(page) {
     const startIndex = (page - 1) * itemsPerPage;
     const endIndex = startIndex + itemsPerPage;
     const productTableBody = document.getElementById('product-table-body');

     if (!productTableBody) {
         console.error("Element with ID 'product-table-body' not found");
         return;
     }

     productTableBody.innerHTML = '';

     const currentorders = filteredorders.slice(startIndex, endIndex);  Lấy sản phẩm từ filteredorders
     currentorders.forEach(product => {
         productTableBody.innerHTML += createProductRow(product);
     });

     renderPagination(filteredorders.length);  Gọi renderPagination với số sản phẩm đã lọc
 }
  Lắng nghe sự kiện cho nút "Áp dụng"
 document.getElementById('apply-button').addEventListener('click', function() {
     const searchValue = document.getElementById('search-input').value.toLowerCase();  Lấy giá trị tìm kiếm
     const selectedCategory = document.getElementById('filter-input').value.toLowerCase();  Lấy giá trị lọc danh mục

      Lọc dữ liệu và cập nhật filteredorders
     filteredorders = orders.filter(product => {
         const hasId = product.id && product.id.trim() !== '';  Kiểm tra xem mã sản phẩm có tồn tại không
         const hasName = product.name && product.name.trim() !== '';  Kiểm tra xem tên sản phẩm có tồn tại không
         const hasCategory = product.category && product.category.trim() !== '';  Kiểm tra xem danh mục có tồn tại không

         const matchesId = hasId && product.id.toLowerCase().includes(searchValue);  Lọc theo mã
         const matchesName = hasName && product.name.toLowerCase().includes(searchValue);  Lọc theo tên
         const matchesCategory = selectedCategory === '' || product.category.toLowerCase().includes(selectedCategory);  Lọc theo danh mục

          Trả về sản phẩm nếu có mã, tên hoặc danh mục phù hợp
         return (matchesId || matchesName) && matchesCategory && hasId && hasName; 
     });

     currentPage = 1;  Reset về trang đầu
     renderorders(currentPage);  Hiển thị sản phẩm đã lọc
 });

  Thêm sự kiện lắng nghe cho nút "Nhập lại"
 document.getElementById('reset-button').addEventListener('click', function() {
     document.getElementById('search-input').value = '';  Xóa ô tìm kiếm
     document.getElementById('filter-input').value = '';  Reset lại giá trị danh mục
     filteredorders = [...orders];  Reset lại filteredorders
     currentPage = 1;  Reset về trang đầu
     renderorders(currentPage);  Hiển thị lại tất cả sản phẩm
 });

  Lọc theo danh mục
 function renderCategoryFilter() {
     const categorySelect = document.getElementById('filter-input');
     const categories = ["", "Vỏ xe và ruột xe", "Nhông sên dĩa", "Bạc đạn", "Nhớt", "Ắc quy", "Bố đĩa và bố thắng", "Các phụ kiện khác"];
    
     categories.forEach(category => {
         const option = document.createElement('option');
         option.value = category.toLowerCase();
         option.textContent = category || "Tất cả";
         categorySelect.appendChild(option);
     });
 }

 document.addEventListener('DOMContentLoaded', function() {
     renderCategoryFilter();  Tạo các tùy chọn danh mục khi trang được tải
     renderorders(currentPage);  Hiển thị sản phẩm mặc định
 });




         Image upload and preview logic
        const fileInput = document.getElementById('product-image');
         const imagePreview = document.getElementById('image-preview');
         let selectedFiles = [];

         fileInput.addEventListener('change', function() {
             const files = Array.from(fileInput.files);

             if (files.length + selectedFiles.length > 2) {
                 alert('Bạn chỉ được chọn tối đa 2 hình ảnh.');
                 fileInput.value = '';
                 return;
             }

             selectedFiles = selectedFiles.concat(files);
             updateImagePreviews();
         });

         function updateImagePreviews() {
             imagePreview.innerHTML = '';
             selectedFiles.forEach((file, index) => {
                 const reader = new FileReader();
                 reader.onload = function(e) {
                     const imgWrapper = document.createElement('div');
                     imgWrapper.style.position = 'relative';

                     const img = document.createElement('img');
                     img.src = e.target.result;
                     img.style.width = '100px';
                     img.style.height = 'auto';
                     img.style.borderRadius = '4px';
                     img.style.border = '1px solid #ccc';

                     const deleteIcon = document.createElement('span');
                     deleteIcon.innerHTML = '<i class="fi fi-rs-trash"></i>';
                     deleteIcon.style.position = 'absolute';
                     deleteIcon.style.top = '5px';
                     deleteIcon.style.right = '5px';
                     deleteIcon.style.cursor = 'pointer';
                     deleteIcon.style.display = 'none';
                     deleteIcon.style.opacity = '0.7';

                     imgWrapper.addEventListener('mouseenter', () => {
                         deleteIcon.style.display = 'block';
                     });
                     imgWrapper.addEventListener('mouseleave', () => {
                         deleteIcon.style.display = 'none';
                     });

                     deleteIcon.addEventListener('click', () => {
                         selectedFiles.splice(index, 1);
                         imgWrapper.remove();
                         updateImagePreviews();
                     });

                     imgWrapper.appendChild(img);
                     imgWrapper.appendChild(deleteIcon);
                     imagePreview.appendChild(imgWrapper);
                 };
                 reader.readAsDataURL(file);
             });
         }


 function editProduct(productId, event) {
     event.preventDefault();  Prevent default link behavior
     const productData = orders.find(product => product.id === productId);
     if (!productData) {
         alert('Product not found');
         return;
     }

      Điền dữ liệu vào form
     document.getElementById('product-id').value = productData.id;
     document.getElementById('product-name').value = productData.name;
     document.getElementById('product-note').value = productData.notes;
     document.getElementById('product-quantity').value = productData.stock;
     document.getElementById('product-original-price').value = productData.originalPrice.replace('$', '');
     document.getElementById('product-price').value = productData.salePrice.replace('$', '');

      Hiển thị modal
     toggleModalVisibility(true);  Hiển thị modal và overlay

      Thêm lớp navigation
     document.querySelector('.nav').classList.add('form-navigation');
 }

  Toggle modal visibility
 function toggleModalVisibility(isVisible) {
     const productForm = document.getElementById('productForm');
     productForm.style.display = isVisible ? 'block' : 'none';
     document.getElementById('overlay').style.display = isVisible ? 'block' : 'none';

      Cuộn đến form nếu nó đang được hiển thị
     if (isVisible) {
         setTimeout(() => {
             productForm.scrollIntoView({ behavior: 'smooth', block: 'center' });
         }, 100);  Một chút độ trễ để đảm bảo modal được hiển thị hoàn toàn
     }
 }

  Close modal
 function closeModal() {
     toggleModalVisibility(false);
     document.querySelector('.nav').classList.remove('form-navigation');
 }
 function updateProductImage(productId, newImage) {
     const productIndex = orders.findIndex(product => product.id === productId);
     if (productIndex > -1) {
         orders[productIndex].image = newImage;  Cập nhật đường dẫn hình ảnh mới
         renderorders(currentPage);  Cập nhật lại bảng sản phẩm
     }
 }

  Handle form submission
 document.getElementById('save-product').addEventListener('submit', function (event) {
     event.preventDefault();  Ngừng hành động mặc định của form

      Lấy dữ liệu từ các trường input trong form
     const productId = document.getElementById('product-id').value;
     const productData = {
         name: document.getElementById('product-name').value,
         notes: document.getElementById('product-note').value,
         stock: parseInt(document.getElementById('product-quantity').value, 10),
         salePrice: `$${document.getElementById('product-price').value}`,
         originalPrice: `$${document.getElementById('product-original-price').value}`
     };

      Gọi hàm cập nhật thông tin sản phẩm
     updateProduct(productId, productData);

      Đóng modal sau khi lưu
     closeModal();
 });

 function updateProduct(productId, productData) {
     const productIndex = orders.findIndex(product => product.id === productId);
     if (productIndex > -1) {
          Cập nhật dữ liệu trong mảng orders
         orders[productIndex] = { ...orders[productIndex], ...productData };

          Cập nhật lại danh sách sản phẩm đã lọc và render lại bảng
         filteredorders = [...orders];
         renderorders(currentPage);   Gọi lại renderorders
     }
 }

  Close modal when overlay is clicked
 document.getElementById('overlay').addEventListener('click', closeModal);

  Initialize first page render
 document.addEventListener('DOMContentLoaded', function () {
     renderorders(currentPage);
 });

</script>


</body>
</html>