<!DOCTYPE html>
<html lang="en">
<?php include 'head.php' ?>

<body>
  <!--=============== HEADER ===============-->
  <?php include 'header.php' ?>

  <div class="post-detail-container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="post-detail">
          <!-- Form chỉnh sửa bài viết -->
          <form action="update_post.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="post_id" value="1"> <!-- ID bài viết (ẩn) -->

            <!-- Tiêu đề bài viết -->
            <div class="post-title">
              <input 
                type="text" 
                id="post-title" 
                name="title" 
                class="form-control" 
                placeholder="Nhập tiêu đề bài viết" 
                required 
              >
            </div>

            <!-- Tác giả và ngày đăng -->
            <div class="post-meta">
              <input 
                type="text" 
                id="post-author" 
                name="author" 
                class="form-control" 
                placeholder="Nhập mã bài viết" 
                required 
              >
              <input 
                type="text" 
                id="post-author" 
                name="author" 
                class="form-control" 
                placeholder="Nhập tên tác giả" 
                required 
              >
              <input 
                type="date" 
                id="post-date" 
                name="date" 
                class="form-control" 
                required 
              >
            </div>

            <!-- Hình ảnh bài viết -->
            <div class="post-image-wrapper">
              <input 
                type="file" 
                id="post-image" 
                name="image" 
                class="form-control" 
                accept="image/*" 
                onchange="previewImage(event)"
              >
              <div class="image-preview-wrapper">
                <img 
                  id="image-preview" 
                  src="#" 
                  alt="Hình ảnh bài viết" 
                  class="post-image mt-2"
                  style="display: none;"
                >
              </div>
            </div>

            <!-- Nội dung bài viết -->
            <div class="post-content">
              <textarea 
                id="post-content" 
                name="content" 
                class="form-control" 
                rows="10" 
                placeholder="Nhập nội dung bài viết tại đây..." 
                required
              ></textarea>
            </div>

            <!-- Nút thao tác -->
            <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                <button type="submit" class="btn flex btn__md">Lưu thay đổi</button>
                <button type="button" class="btn flex btn__md">Hủy</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--=============== FOOTER ===============-->
  <?php include 'footer.php' ?>

  <!-- Script để xem trước hình ảnh -->
  <script>
    function previewImage(event) {
      const imagePreview = document.getElementById('image-preview');
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          imagePreview.src = e.target.result;
          imagePreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
      } else {
        imagePreview.style.display = 'none';
      }
    }
  </script>
</body>
</html>
