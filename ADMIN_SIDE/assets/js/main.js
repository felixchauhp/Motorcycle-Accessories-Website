/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById("nav-menu"),
  navToggle = document.getElementById("nav-toggle"),
  navClose = document.getElementById("nav-close");

/*===== Menu Show =====*/
/* Validate if constant exists */
if (navToggle) {
  navToggle.addEventListener("click", () => {
    navMenu.classList.add("show-menu");
  });
}

/*===== Hide Show =====*/
/* Validate if constant exists */
if (navClose) {
  navClose.addEventListener("click", () => {
    navMenu.classList.remove("show-menu");
  });
}

/*=============== IMAGE GALLERY ===============*/
function imgGallery() {
  const mainImg = document.querySelector(".details__img"),
    smallImg = document.querySelectorAll(".details__small-img");

  smallImg.forEach((img) => {
    img.addEventListener("click", function () {
      mainImg.src = this.src;
    });
  });
}

imgGallery();

/*=============== SWIPER CATEGORIES ===============*/
let swiperCategories = new Swiper(".categories__container", {
  spaceBetween: 24,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    350: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 24,
    },
    992: {
      slidesPerView: 4,
      spaceBetween: 24,
    },
    1200: {
      slidesPerView: 5,
      spaceBetween: 24,
    },
    1400: {
      slidesPerView: 6,
      spaceBetween: 24,
    },
  },
});

/*=============== SWIPER PRODUCTS ===============*/
let swiperProducts = new Swiper(".new__container", {
  spaceBetween: 24,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    768: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    992: {
      slidesPerView: 4,
      spaceBetween: 24,
    },
    1400: {
      slidesPerView: 4,
      spaceBetween: 24,
    },
  },
});

/*=============== PRODUCTS TABS ===============*/
const tabs = document.querySelectorAll("[data-target]"),
  tabsContents = document.querySelectorAll("[content]");

tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    const target = document.querySelector(tab.dataset.target);

    tabsContents.forEach((tabsContent) => {
      tabsContent.classList.remove("active-tab");
    });

    target.classList.add("active-tab");

    tabs.forEach((tab) => {
      tab.classList.remove("active-tab");
    });

    tab.classList.add("active-tab");
  });
});
/*=============== Nút lựa chọn % hay số tiền của trang thêm 1 mã ===============*/
function toggleInput() {
  const percentInput = document.querySelector('.percent-input');
  const amountInput = document.querySelector('.amount-input');
  const discountType = document.querySelector('input[name="discount-type"]:checked').value;

  if (discountType === 'percentage') {
      percentInput.style.display = 'block';
      amountInput.style.display = 'none';
  } else {
      percentInput.style.display = 'none';
      amountInput.style.display = 'block';
  }
}

// Khởi tạo trạng thái hiển thị ban đầu
document.addEventListener('DOMContentLoaded', () => {
  toggleInput();

  // Thêm sự kiện để theo dõi sự thay đổi
  const radioButtons = document.querySelectorAll('input[name="discount-type"]');
  radioButtons.forEach(radio => {
      radio.addEventListener('change', toggleInput);
  });
});
                                      /*=============== Trang thêm sản phẩm ===============*/
document.addEventListener('DOMContentLoaded', function() {
  const fileInput = document.getElementById('product-image');
  const imagePreview = document.getElementById('image-preview');

  let selectedFiles = [];

  fileInput.addEventListener('change', function() {
      const files = Array.from(fileInput.files); 

      if (files.length + selectedFiles.length > 1) {
          alert('Bạn chỉ được chọn tối đa 1 hình ảnh.');
          fileInput.value = ''; 
          return;
      }

      selectedFiles = selectedFiles.concat(files);

      imagePreview.innerHTML = '';

      selectedFiles.forEach((file, index) => {
          const reader = new FileReader();
          reader.onload = function(e) {
              const imgWrapper = document.createElement('div');
              imgWrapper.style.position = 'relative'; 

              const img = document.createElement('img');
              img.src = e.target.result;
              img.style.width = '200px'; 
              img.style.height = 'auto'; 
              img.style.borderRadius = '4px'; 
              img.style.border = '1px solid #ccc'; 
              img.style.objectFit = 'cover'; 

              const deleteIcon = document.createElement('span');
              deleteIcon.innerHTML = '<i class="fi fi-rs-trash"></i>';
              deleteIcon.style.position = 'absolute';
              deleteIcon.style.top = '5px';
              deleteIcon.style.right = '5px';
              deleteIcon.style.cursor = 'pointer';
              deleteIcon.style.display = 'none'; 
              deleteIcon.style.opacity = '0.7'; 
              deleteIcon.style.fontSize = '20px'; 

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
          }
          reader.readAsDataURL(file); 
      });
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
              img.style.width = '200px'; 
              img.style.height = 'auto'; 
              img.style.borderRadius = '4px'; 
              img.style.border = '1px solid #ccc'; 
              img.style.objectFit = 'cover'; 

              const deleteIcon = document.createElement('span');
              deleteIcon.innerHTML = '<i class="fi fi-rs-trash"></i>';
              deleteIcon.style.position = 'absolute';
              deleteIcon.style.top = '5px';
              deleteIcon.style.right = '5px';
              deleteIcon.style.cursor = 'pointer';
              deleteIcon.style.display = 'none'; 
              deleteIcon.style.opacity = '0.7'; 
              deleteIcon.style.fontSize = '20px'; 

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
          }
          reader.readAsDataURL(file); 
      });
  }
});

                                      


                                             