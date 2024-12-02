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

/*=============== Xác nhận sự thay đổi ===============*/
document.addEventListener('DOMContentLoaded', () => {
  const nameInput = document.getElementById('fullname');
  const phoneInput = document.getElementById('phone');
  const emailInput = document.getElementById('email');

  const curr_pass = document.getElementById('curr_pass');
  const new_pass = document.getElementById('new_pass');
  const re_pass = document.getElementById('re_pass');
  
  const saveUBtn = document.getElementById('saveUBtn');
  const savePBtn = document.getElementById('savePBtn');

  const overlay = document.getElementById('overlay');
  const confirmBtn = document.getElementById('confirmBtn');
  const cancelBtn = document.getElementById('cancelBtn');

  let currentForm = null;

  function checkInputs() {
    if(saveUBtn){
      if (nameInput.value.trim() === "" && emailInput.value.trim() === "" && phoneInput.value.trim() === "")
        saveUBtn.disabled = true;
      else saveUBtn.disabled = false;
      
    }
    if(savePBtn){
      if(curr_pass.value.trim() !== "" && new_pass.value.trim() !== "" && re_pass.value.trim() !== "") 
        savePBtn.disabled = false;
      else savePBtn.disabled = true;
    }
  }

  nameInput.addEventListener('input', checkInputs);
  phoneInput.addEventListener('input', checkInputs);
  emailInput.addEventListener('input', checkInputs);

  curr_pass.addEventListener('input', checkInputs);
  new_pass.addEventListener('input', checkInputs);
  re_pass.addEventListener('input', checkInputs);

  // Hiển thị hộp thoại xác nhận khi nhấn nút "Lưu"
  saveUBtn.addEventListener('click', (event) => {
    event.preventDefault();
    currentForm = document.getElementById('Update_form');
    overlay.classList.remove('hidden');
  });
  savePBtn.addEventListener('click', (event) => {
    event.preventDefault();
    currentForm = document.getElementById('Changepass_form');
    overlay.classList.remove('hidden');
  });

  // Nếu người dùng xác nhận
  confirmBtn.addEventListener('click', () => {
    if (currentForm)
      currentForm.submit();  // Gửi form để lưu dữ liệu vào database
  });

  // Nếu người dùng hủy
  cancelBtn.addEventListener('click', () => {
      overlay.classList.add('hidden'); // Ẩn hộp thoại xác nhận
  });

  checkInputs();
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
  // const discountType = document.querySelector('input[name="discount-type"]:checked').value;

  // if (discountType === 'percentage') {
  //     percentInput.style.display = 'block';
  //     amountInput.style.display = 'none';
  // } else {
  //     percentInput.style.display = 'none';
  //     amountInput.style.display = 'block';
  // }
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

// Sự kiện để hiển thị các chức năng liên quan đến địa chỉ giao hàng của khách hàng
function showAddressModel() {
  document.getElementById('addressModel').style.display = 'block';
  document.getElementById('addAddressModel').style.display = 'none';
}

function hideAddressModel() {
  document.getElementById('addressModel').style.display = 'none';
}

function showAddAddressModel() {
  document.getElementById('addAddressModel').style.display = 'block';
  document.getElementById('addressModel').style.display = 'none';
}

function hideAddAddressModel() {
  document.getElementById('addAddressModel').style.display = 'none';
}