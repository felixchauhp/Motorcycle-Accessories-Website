<?php
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FLATICON ===============-->
    <link
        rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css"
    />
    <!-- Bootstrap JS (for dropdown functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--=============== SWIPER CSS ===============-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <!--=============== CSS ===============-->
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

    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== Promotion Management ===============-->
        <section class="products container section--lg">
            <div class="search-container">
                <a href="add-Discount.php" class="btn flex btn__md">
                    <i class="fi fi-rs-plus"></i> Thêm 1 mã khuyến mãi mới
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
            <table class="discount-table">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Code</th>
                        <th>Số lượng</th>
                        <th>Phần trăm (%)</th>
                        <th>Giá trị đơn hàng tối thiểu</th>
                        <th>Số tiền giảm tối đa</th>
                        <th>Bắt đầu</th>
                        <th>Kết thúc</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Hiển thị danh sách sản phẩm -->
                    <?php foreach ($promotions as $promo): ?>
                        <tr>
                            <td><?= htmlspecialchars($promo['PromoName']) ?></td>
                            <td><?= htmlspecialchars($promo['PromoCode']) ?></td>
                            <td><?= htmlspecialchars($promo['Quantity']) ?></td>
                            <td><?= htmlspecialchars($promo['PromoRate']) ?></td>
                            <td><?= htmlspecialchars($promo['MinValue']) ?></td>
                            <td><?= htmlspecialchars($promo['MaxAmount']) ?></td>
                            <td><?= htmlspecialchars($promo['StartDate']) ?></td>
                            <td><?= htmlspecialchars($promo['EndDate']) ?></td>
                            <td>
                                <a href="#" class="delete-btn" data-code="<?= htmlspecialchars($promo['PromoCode']) ?>">
                                    <i class="fi fi-rs-trash table__trash"></i>
                                </a>
                                <a href="update-Discount.php?promoCode=<?= urlencode($promo['PromoCode']) ?>" class="edit-btn">
                                    <i class="fi fi-rs-edit table__trash"></i>
                                </a>
                                <a href="show-discount.php?promoCode=<?= urlencode($promo['PromoCode']) ?>" class="menu-btn">
                                    <i class="fi fi-rs-menu-dots table__trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

           <!-- Popup xác nhận xóa -->
          <div id="confirmDelete" style="display:none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5); z-index: 9999; display: none;">
              <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                  <p>Bạn có chắc chắn muốn xóa mã khuyến mãi này?</p>
                  <button id="confirmDeleteBtn" style="padding: 10px 20px; margin: 5px;">Xóa</button>
                  <button id="cancelDeleteBtn" style="padding: 10px 20px; margin: 5px;">Hủy</button>
              </div>
          </div>
 

            <!-- JavaScript để xử lý popup xác nhận -->
            <script>
                    document.addEventListener('DOMContentLoaded', function () {
                    const deleteButtons = document.querySelectorAll('.delete-btn');
                    const confirmDeletePopup = document.getElementById('confirmDelete');
                    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
                    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
                    let promoCodeToDelete = null;

                    deleteButtons.forEach(button => {
                        button.addEventListener('click', function(event) {
                            event.preventDefault();
                            promoCodeToDelete = button.getAttribute('data-code'); // Lấy PromoCode từ data attribute
                            confirmDeletePopup.style.display = 'block'; // Hiển thị popup
                        });
                    });

                    cancelDeleteBtn.addEventListener('click', function() {
                        confirmDeletePopup.style.display = 'none'; // Ẩn popup
                    });

                    confirmDeleteBtn.addEventListener('click', function() {
                        if (promoCodeToDelete) {
                            window.location.href = 'delete_discount.php?promo_code=' + promoCodeToDelete; // Chuyển hướng đến file PHP xử lý xóa
                        }
                    });
                });
            </script>
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
    <script src="assets/js/manage.js"></script>
</body>
</html>
