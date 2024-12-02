// Lưu trữ danh sách đánh giá
let reviews = JSON.parse(localStorage.getItem("reviews")) || [];

// Hàm hiển thị đánh giá
function renderReviews(productId) {
  // Lấy danh sách đánh giá từ localStorage
  reviews = JSON.parse(localStorage.getItem("reviews")) || [];

  const reviewContainer = document.querySelector(".reviews__container");
  reviewContainer.innerHTML = ""; // Xóa nội dung cũ

  // Lọc đánh giá theo productId
  const filteredReviews = reviews.filter(
    (review) => review.productId === productId
  );

  filteredReviews.forEach((review) => {
    reviewContainer.innerHTML += `
      <div class="review__single">
        <div>
          <img src="./assets/img/avatarfb.jpg" alt="Avatar" class="review__img" />
          <h4 class="review__title">${review.name}</h4>
        </div>
        <div class="review__data">
          <div class="review__rating">
            ${'<i class="fi fi-rs-star selected"></i>'.repeat(review.stars)}
            ${'<i class="fi fi-rs-star"></i>'.repeat(5 - review.stars)}
          </div>
          <p class="review__description">${review.review}</p>
          <span class="review__date">${review.date}</span>
        </div>
      </div>
    `;
  });
}

// Xử lý khi người dùng chọn số sao
const stars = document.querySelectorAll(".rate__product .fi-rs-star");
let selectedStars = 0;

// Xử lý hover (thay đổi trạng thái khi di chuột qua các sao)
stars.forEach((star, index) => {
  star.addEventListener("mouseenter", () => {
    stars.forEach((s, i) => {
      s.classList.toggle("hovered", i <= index); // Thêm class "hovered" cho sao
    });
  });

  star.addEventListener("mouseleave", () => {
    stars.forEach((s) => s.classList.remove("hovered")); // Xóa class "hovered"
  });
});

// Xử lý chọn sao khi click
stars.forEach((star) => {
  star.addEventListener("click", () => {
    selectedStars = parseInt(star.getAttribute("data-value")); // Lấy giá trị sao được chọn
    stars.forEach((s, i) => {
      s.classList.toggle("selected", i < selectedStars); // Thêm class "selected"
    });
  });
});

// Xử lý sự kiện gửi biểu mẫu
const form = document.querySelector(".form");
form.addEventListener("submit", function (e) {
  e.preventDefault(); // Ngăn hành động mặc định

  const name = document.getElementById("reviewName").value.trim();
  const email = document.getElementById("reviewEmail").value.trim();
  const reviewText = document.getElementById("reviewText").value.trim();

  if (!name || !email || !reviewText || selectedStars === 0) {
    alert("Vui lòng điền đầy đủ thông tin và chọn số sao!");
    return;
  }

  // Lấy ProductID từ data-attribute
  const productElement = document.getElementById("product");
  const productId = productElement.getAttribute("data-id");

  const newReview = {
    productId: productId,
    name,
    email,
    review: reviewText,
    stars: selectedStars,
    date: new Date().toLocaleString("vi-VN"),
  };

  reviews.push(newReview);
  localStorage.setItem("reviews", JSON.stringify(reviews)); // Lưu vào localStorage

  renderReviews(productId); // Gọi lại renderReviews với productId để hiển thị lại đánh giá

  form.reset();
  selectedStars = 0;
  stars.forEach((star) => star.classList.remove("selected")); // Reset giao diện sao
  alert("Đánh giá của bạn đã được gửi!");
});

// Hiển thị số lượng đánh giá khi tải trang

// Hiển thị số lượng đánh giá khi tải trang
document.addEventListener("DOMContentLoaded", () => {
  // Lấy ProductID từ data-attribute
  const productElement = document.getElementById("product");
  const productId = productElement.getAttribute("data-id");

  renderReviews(productId); // Gọi hàm renderReviews với productId khi trang được tải
});
