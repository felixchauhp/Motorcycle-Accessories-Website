<?php
include 'db_connection.php';
?>
!<!DOCTYPE html>
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
    <link rel="stylesheet" href="./assets/css/styles2.css" />
    

    <title>Ecommerce Website</title>
</head>
<body>
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
            <a href="discount.php" class="nav__link">Khuyến mãi</a>
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


    <main class="main">
        <section class="products container section--lg">
            <div class="search-container">
                <a href="add-Product.php" class="btn flex btn__md">
            <i class="fi fi-rs-plus"></i> Thêm 1 sản phẩm mới
        </a>
        <div class="right-actions">
                <input type="text" id="search-input" placeholder="Tìm kiếm...">
                <select id="filter-input">
                  <option value="" disabled selected>Lọc...</option>
                </select>
                <button id="apply-button" class="btn flex btn__md">Áp dụng</button>
                <button id="reset-button" class="btn flex btn__md">Nhập lại</button>
            </div>
        </div>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Danh mục</th>
                        <th>Tồn kho</th>
                        <th>Giá gốc</th>
                        <th>Giá bán</th>
                        <th>Ghi chú</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Hiển thị danh sách sản phẩm -->
                    <?php
                    $combined = array_map(null, $products, $products_category);

                    foreach ($combined as [$product, $product_category]): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['ProductID']) ?></td>
                        <td><?= htmlspecialchars($product['ProductID']) ?></td>
                        <td><?= htmlspecialchars($product['ProductName']) ?></td>
                        <td><?= htmlspecialchars($product_category['Category']) ?></td>
                        <td><?= htmlspecialchars($product['InStock']) ?></td>
                        <td><?= htmlspecialchars($product['BasePrice']) ?></td>
                        <td><?= htmlspecialchars($product['SalePrice']) ?></td>
                        <td><?= htmlspecialchars($product['Notes']) ?></td>
                        
                        <td>
                        <button onclick="editProduct('${product.id}', event)">
                    <i class="fi fi-rs-edit edit-icon"></i>
                </button>
                <button onclick="deleteProduct('<?= $product['ProductID'] ?>')">
                    <i class="fi fi-rs-trash trash-icon"></i>
                </button>

                <button onclick="goToDetail('${product.id}')">
                    <i class="fi fi-rs-menu-dots go-to-icon"></i>
                </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </table>
            <ul class="pagination" id="pagination">
                <!-- Sẽ được điền bằng JavaScript -->
            </ul>
        </section>

        <div id="overlay" class="overlay"></div>
        <div id="productForm" class="modal">
            <h2>Chỉnh sửa thông tin sản phẩm</h2>
            <form id="save-product">
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
                        <input type="date" id="product-end-date" required />
                    </div>
                </div>
                
                <label for="product-image">Ảnh sản phẩm (tối đa 2):</label>
                <div id="image-upload-container" style="border: 1px solid #ccc; padding: 10px; border-radius: 8px; display: flex; align-items: center; gap: 10px;">
                    <input type="file" id="product-image" accept="image/*" multiple required style="display: none;" />
                    <label for="product-image" style="cursor: pointer; padding: 10px; background-color: #f0f0f0; border-radius: 8px;">
                        Chọn ảnh
                    </label>
                    <div id="image-preview"></div>
                </div>

                <label for="product-note">Ghi chú:</label>
                <textarea id="product-note" required></textarea>

                <button type="submit">Lưu</button>
            </form>
        </div>
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

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
                                                <!--=============== Phân trang ===============-->
// Truyền dữ liệu sản phẩm từ PHP sang JavaScript
// const products = <?php echo json_encode($products); ?>;
// console.log(products);  // Để kiểm tra xem dữ liệu có được truyền đúng không                                                
// const itemsPerPage = 20;  // Số sản phẩm hiển thị mỗi trang
// let currentPage = 1;  // Trang hiện tại
// let filteredProducts = [...products];  // Mảng sản phẩm đã được lọc (nếu có lọc)

// function renderProducts(page) {
//     const start = (page - 1) * itemsPerPage;
//     const end = start + itemsPerPage;

//     // Lấy các sản phẩm cần hiển thị cho trang hiện tại
//     const productsToRender = filteredProducts.slice(start, end);
//     const tableBody = document.querySelector('table.product-table tbody');
//     tableBody.innerHTML = '';  // Xóa danh sách sản phẩm cũ

//     // Render các sản phẩm cho trang hiện tại
//     productsToRender.forEach((product) => {
//         const row = document.createElement('tr');
//         row.innerHTML = `
//             <td><img src="${product.ProductImage}" alt="${product.ProductName}" /></td>
//             <td>${product.ProductID}</td>
//             <td>${product.ProductName}</td>
//             <td>${product.BasePrice}</td>
//             <td>${product.SalePrice}</td>
//             <td>${product.InStock}</td>
//             <td>${product.Notes}</td>
//             <td>${product.Category}</td>
//             <td>
//                 <button onclick="editProduct('${product.ProductID}')"><i class="fi fi-rs-edit edit-icon"></i></button>
//                 <button onclick="deleteProduct('<?= $product['ProductID'] ?>')">
//                     <i class="fi fi-rs-trash trash-icon"></i>
//                 </button>

//                 <button onclick="goToDetail('${product.ProductID}')"><i class="fi fi-rs-menu-dots go-to-icon"></i></button>
//             </td>
//         `;
//         tableBody.appendChild(row);
//     });

//     // Render phân trang
//     renderPagination(filteredProducts.length);
// }

// // Hàm render phân trang
// function renderPagination(filteredProductCount) {
//     const pagination = document.getElementById('pagination');
//     pagination.innerHTML = '';  // Xóa phân trang cũ

//     const totalPages = Math.ceil(filteredProductCount / itemsPerPage);  // Tính tổng số trang

//     // Thêm nút Prev nếu không phải trang đầu tiên
//     if (currentPage > 1) {
//         const prevButton = document.createElement('li');
//         prevButton.innerHTML = `<a href="#" class="pagination__link" onclick="goToPage(${currentPage - 1})">«</a>`;
//         pagination.appendChild(prevButton);
//     }

//     // Thêm nút trang đầu tiên
//     const firstPage = document.createElement('li');
//     firstPage.innerHTML = `<a href="#" class="pagination__link ${currentPage === 1 ? 'active' : ''}" onclick="goToPage(1)">1</a>`;
//     pagination.appendChild(firstPage);

//     // Dấu ba chấm nếu cần
//     if (currentPage > 3) {
//         const dots = document.createElement('li');
//         dots.innerHTML = `<span class="pagination__dots">...</span>`;
//         pagination.appendChild(dots);
//     }

//     // Thêm các nút trang ở giữa
//     for (let i = Math.max(2, currentPage - 1); i <= Math.min(totalPages - 1, currentPage + 1); i++) {
//         const pageItem = document.createElement('li');
//         pageItem.innerHTML = `<a href="#" class="pagination__link ${currentPage === i ? 'active' : ''}" onclick="goToPage(${i})">${i}</a>`;
//         pagination.appendChild(pageItem);
//     }

//     // Dấu ba chấm trước trang cuối nếu cần
//     if (currentPage < totalPages - 2) {
//         const dots = document.createElement('li');
//         dots.innerHTML = `<span class="pagination__dots">...</span>`;
//         pagination.appendChild(dots);
//     }

//     // Thêm nút trang cuối cùng
//     if (totalPages > 1) {
//         const lastPage = document.createElement('li');
//         lastPage.innerHTML = `<a href="#" class="pagination__link ${currentPage === totalPages ? 'active' : ''}" onclick="goToPage(${totalPages})">${totalPages}</a>`;
//         pagination.appendChild(lastPage);
//     }

//     // Thêm nút Next nếu không phải trang cuối cùng
//     if (currentPage < totalPages) {
//         const nextButton = document.createElement('li');
//         nextButton.innerHTML = `<a href="#" class="pagination__link" onclick="goToPage(${currentPage + 1})">»</a>`;
//         pagination.appendChild(nextButton);
//     }
// }

// // Hàm chuyển đến trang khác
// function goToPage(page) {
//     if (page >= 1 && page <= Math.ceil(filteredProducts.length / itemsPerPage)) {
//         currentPage = page;
//         renderProducts(currentPage);
//     }
// }

// // Hàm xem chi tiết sản phẩm
// function goToDetail(productId) {
//     window.location.href = `details.php?id=${productId}`;
// }

// // Ban đầu, render trang đầu tiên
// renderProducts(currentPage);








// document.querySelectorAll('.delete-btn').forEach(button => {
//     button.addEventListener('click', function() {
//         const productId = this.dataset.productId; // Lấy productId từ data attribute
//         deleteProduct(productId); // Gọi hàm xóa sản phẩm
//     });
// });


// function deleteProduct(productId) {
//     console.log("Bắt đầu xóa sản phẩm với ID: " + productId);  // Debug log
//     // Hiển thị hộp thoại xác nhận
//     const confirmDelete = confirm("Bạn có chắc chắn muốn xóa sản phẩm này?");
//     if (!confirmDelete) {
//         return;  // Nếu người dùng không xác nhận, thoát khỏi hàm
//     }

//     // Tạo đối tượng XMLHttpRequest
//     const xhr = new XMLHttpRequest();
    
//     // Cấu hình yêu cầu AJAX
//     xhr.open("POST", "delete_product.php", true);
//     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

//     // Xử lý phản hồi từ máy chủ
//     xhr.onload = function() {
//         if (xhr.status === 200) {
//             const response = JSON.parse(xhr.responseText);
//             if (response.success) {
//                 alert("Sản phẩm đã được xóa thành công!");

//                 // Cập nhật lại giao diện sau khi xóa sản phẩm
//                 // Loại bỏ sản phẩm khỏi mảng filteredProducts
//                 filteredProducts = filteredProducts.filter(product => product.ProductID !== productId);
                
//                 // Gọi lại hàm render để cập nhật giao diện
//                 renderProducts(currentPage);
//                 renderPagination(filteredProducts.length);
//             } else {
//                 alert("Lỗi khi xóa sản phẩm: " + response.message);
//             }
//         } else {
//             alert("Đã xảy ra lỗi khi xóa sản phẩm.");
//         }
//     };

//     // Gửi dữ liệu (product_id) đến máy chủ
//     xhr.send("product_id=" + productId);
// }




// // Render products for the current page
// function renderProducts(page) {
//     const startIndex = (page - 1) * itemsPerPage;
//     const endIndex = startIndex + itemsPerPage;
//     const productTableBody = document.getElementById('product-table-body');

//     if (!productTableBody) {
//         console.error("Element with ID 'product-table-body' not found");
//         return;
//     }

//     productTableBody.innerHTML = '';

//     const currentProducts = filteredProducts.slice(startIndex, endIndex); // Lấy sản phẩm từ filteredProducts
//     currentProducts.forEach(product => {
//         productTableBody.innerHTML += createProductRow(product);
//     });

//     renderPagination(filteredProducts.length); // Gọi renderPagination với số sản phẩm đã lọc
// }
// // Lắng nghe sự kiện cho nút "Áp dụng"
// document.getElementById('apply-button').addEventListener('click', function() {
//     const searchValue = document.getElementById('search-input').value.toLowerCase(); // Lấy giá trị tìm kiếm
//     const selectedCategory = document.getElementById('filter-input').value.toLowerCase(); // Lấy giá trị lọc danh mục

//     // Lọc dữ liệu và cập nhật filteredProducts
//     filteredProducts = products.filter(product => {
//         const hasId = product.id && product.id.trim() !== ''; // Kiểm tra xem mã sản phẩm có tồn tại không
//         const hasName = product.name && product.name.trim() !== ''; // Kiểm tra xem tên sản phẩm có tồn tại không
//         const hasCategory = product.category && product.category.trim() !== ''; // Kiểm tra xem danh mục có tồn tại không

//         const matchesId = hasId && product.id.toLowerCase().includes(searchValue); // Lọc theo mã
//         const matchesName = hasName && product.name.toLowerCase().includes(searchValue); // Lọc theo tên
//         const matchesCategory = selectedCategory === '' || product.category.toLowerCase().includes(selectedCategory); // Lọc theo danh mục

//         // Trả về sản phẩm nếu có mã, tên hoặc danh mục phù hợp
//         return (matchesId || matchesName) && matchesCategory && hasId && hasName; 
//     });

//     currentPage = 1; // Reset về trang đầu
//     renderProducts(currentPage); // Hiển thị sản phẩm đã lọc
// });

// // Thêm sự kiện lắng nghe cho nút "Nhập lại"
// document.getElementById('reset-button').addEventListener('click', function() {
//     document.getElementById('search-input').value = ''; // Xóa ô tìm kiếm
//     document.getElementById('filter-input').value = ''; // Reset lại giá trị danh mục
//     filteredProducts = [...products]; // Reset lại filteredProducts
//     currentPage = 1; // Reset về trang đầu
//     renderProducts(currentPage); // Hiển thị lại tất cả sản phẩm
// });

// // Lọc theo danh mục
// function renderCategoryFilter() {
//     const categorySelect = document.getElementById('filter-input');
//     const categories = ["", "Vỏ xe và ruột xe", "Nhông sên dĩa", "Bạc đạn", "Nhớt", "Ắc quy", "Bố đĩa và bố thắng", "Các phụ kiện khác"];
    
//     categories.forEach(category => {
//         const option = document.createElement('option');
//         option.value = category.toLowerCase();
//         option.textContent = category || "Tất cả";
//         categorySelect.appendChild(option);
//     });
// }

// document.addEventListener('DOMContentLoaded', function() {
//     renderCategoryFilter(); // Tạo các tùy chọn danh mục khi trang được tải
//     renderProducts(currentPage); // Hiển thị sản phẩm mặc định
// });





//        // Image upload and preview logic
//        const fileInput = document.getElementById('product-image');
//         const imagePreview = document.getElementById('image-preview');
//         let selectedFiles = [];

//         fileInput.addEventListener('change', function() {
//             const files = Array.from(fileInput.files);

//             if (files.length + selectedFiles.length > 2) {
//                 alert('Bạn chỉ được chọn tối đa 2 hình ảnh.');
//                 fileInput.value = '';
//                 return;
//             }

//             selectedFiles = selectedFiles.concat(files);
//             updateImagePreviews();
//         });

//         function updateImagePreviews() {
//             imagePreview.innerHTML = '';
//             selectedFiles.forEach((file, index) => {
//                 const reader = new FileReader();
//                 reader.onload = function(e) {
//                     const imgWrapper = document.createElement('div');
//                     imgWrapper.style.position = 'relative';

//                     const img = document.createElement('img');
//                     img.src = e.target.result;
//                     img.style.width = '100px';
//                     img.style.height = 'auto';
//                     img.style.borderRadius = '4px';
//                     img.style.border = '1px solid #ccc';

//                     const deleteIcon = document.createElement('span');
//                     deleteIcon.innerHTML = '<i class="fi fi-rs-trash"></i>';
//                     deleteIcon.style.position = 'absolute';
//                     deleteIcon.style.top = '5px';
//                     deleteIcon.style.right = '5px';
//                     deleteIcon.style.cursor = 'pointer';
//                     deleteIcon.style.display = 'none';
//                     deleteIcon.style.opacity = '0.7';

//                     imgWrapper.addEventListener('mouseenter', () => {
//                         deleteIcon.style.display = 'block';
//                     });
//                     imgWrapper.addEventListener('mouseleave', () => {
//                         deleteIcon.style.display = 'none';
//                     });

//                     deleteIcon.addEventListener('click', () => {
//                         selectedFiles.splice(index, 1);
//                         imgWrapper.remove();
//                         updateImagePreviews();
//                     });

//                     imgWrapper.appendChild(img);
//                     imgWrapper.appendChild(deleteIcon);
//                     imagePreview.appendChild(imgWrapper);
//                 };
//                 reader.readAsDataURL(file);
//             });
//         }



// function editProduct(productId, event) {
//     event.preventDefault(); // Prevent default link behavior
//     const productData = products.find(product => product.id === productId);
//     if (!productData) {
//         alert('Product not found');
//         return;
//     }

//     // Điền dữ liệu vào form
//     document.getElementById('product-id').value = productData.id;
//     document.getElementById('product-name').value = productData.name;
//     document.getElementById('product-note').value = productData.notes;
//     document.getElementById('product-quantity').value = productData.stock;
//     document.getElementById('product-original-price').value = productData.originalPrice.replace('$', '');
//     document.getElementById('product-price').value = productData.salePrice.replace('$', '');

//     // Hiển thị modal
//     toggleModalVisibility(true); // Hiển thị modal và overlay

//     // Thêm lớp navigation
//     document.querySelector('.nav').classList.add('form-navigation');
// }


// // Toggle modal visibility
// function toggleModalVisibility(isVisible) {
//     const productForm = document.getElementById('productForm');
//     productForm.style.display = isVisible ? 'block' : 'none';
//     document.getElementById('overlay').style.display = isVisible ? 'block' : 'none';

//     // Cuộn đến form nếu nó đang được hiển thị
//     if (isVisible) {
//         setTimeout(() => {
//             productForm.scrollIntoView({ behavior: 'smooth', block: 'center' });
//         }, 100); // Một chút độ trễ để đảm bảo modal được hiển thị hoàn toàn
//     }
// }

// // Close modal
// function closeModal() {
//     toggleModalVisibility(false);
//     document.querySelector('.nav').classList.remove('form-navigation');
// }
// function updateProductImage(productId, newImage) {
//     const productIndex = products.findIndex(product => product.id === productId);
//     if (productIndex > -1) {
//         products[productIndex].image = newImage; // Cập nhật đường dẫn hình ảnh mới
//         renderProducts(currentPage); // Cập nhật lại bảng sản phẩm
//     }
// }

// // Handle form submission
// document.getElementById('save-product').addEventListener('submit', function (event) {
//     event.preventDefault(); // Ngừng hành động mặc định của form

//     // Lấy dữ liệu từ các trường input trong form
//     const productId = document.getElementById('product-id').value;
//     const productData = {
//         name: document.getElementById('product-name').value,
//         notes: document.getElementById('product-note').value,
//         stock: parseInt(document.getElementById('product-quantity').value, 10),
//         salePrice: `$${document.getElementById('product-price').value}`,
//         originalPrice: `$${document.getElementById('product-original-price').value}`
//     };

//     // Gọi hàm cập nhật thông tin sản phẩm
//     updateProduct(productId, productData);

//     // Đóng modal sau khi lưu
//     closeModal();
// });

// function updateProduct(productId, productData) {
//     const productIndex = products.findIndex(product => product.id === productId);
//     if (productIndex > -1) {
//         // Cập nhật dữ liệu trong mảng products
//         products[productIndex] = { ...products[productIndex], ...productData };

//         // Cập nhật lại danh sách sản phẩm đã lọc và render lại bảng
//         filteredProducts = [...products];
//         renderProducts(currentPage);  // Gọi lại renderProducts
//     }
// }

// // Close modal when overlay is clicked
// document.getElementById('overlay').addEventListener('click', closeModal);

// // Initialize first page render
// document.addEventListener('DOMContentLoaded', function () {
//     renderProducts(currentPage);
// });

</script>
  
    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</body>
</html>
