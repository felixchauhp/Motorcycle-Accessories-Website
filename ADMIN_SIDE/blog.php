<?php
session_start();
include 'checklogin.php';
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'head.php' ?>
   <!--=============== HEADER ===============-->
<?php include 'header.php' ?>
    <!--=============== RATING ===============-->   
<body>
    <main class="main">
    <section class="products container section--lg">
            <div class="search-container">
                <a href="edit-blog.php" class="btn flex btn__md">
                    <i class="fi fi-rs-plus"></i> Thêm 1 bài viết mới
                </a>
                <form method="GET" action="blog.php" class="right-actions">
                    <input type="text" id="search-input" name="search" placeholder="Tìm kiếm..." />
                    <input type="date" id="start-date" name="start_date">
                    <input type="date" id="end-date" name="end_date">
                    <button type="submit" class="btn flex btn__md" style="cursor: pointer;">Áp dụng</button>
                    <a href="discount.php" class="btn flex btn__md">Nhập lại</a>
                </form>
            </div>
              <table class="product-table">
                <thead>
                  <tr>
                    <th>Mã bài viết</th>
                    <th>Tiêu đề </th>
                    <th>Tác giả</th>
                    <th>Ngày đăng</th>
                    <th>Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>R000000001</td>
                    <td>Bí kiếp 10đ Lập trình Web</td>
                    <td>Hoài Phúc</td>
                    <td>01/10/2023</td>
                    <td>
                        <a href="edit-blog.php">
                          <i class="fi fi-rs-edit table__trash"></i>
                        </a>
                        <a href="#">
                          <i class="fi fi-rs-trash table__trash"></i>
                        </a>
                    </td>
                  </tr>
                </tbody>
              </table>
          </section>
  </main>
  <!--=============== FOOTER ===============-->
  <?php include 'footer.php' ?>
  <!--=============== SWIPER JS ===============-->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <!--=============== MAIN JS ===============-->
  <script src="assets/js/main.js"></script>
</body>
</html>
