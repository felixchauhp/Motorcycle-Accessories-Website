//lấy dữ liệu
const formLogin = document.getElementById("formLogin");
const email = document.getElementById("email");
const password = document.getElementById("password");

//dữ liệu null
const emailNull = document.getElementById("emailNull");
const passNull = document.getElementById("passNull");

// lắng nghe sự kiện
formLogin.addEventListener("submit", function (login) {
  // ngăn chặn load lại trang
  login.preventDefault();
  //validate dữ liệu
  if (!email.value) {
    emailNull.style.display = "block";
  } else {
    emailNull.style.display = "none";
  }
  if (!password.value) {
    passNull.style.display = "block";
    // passNull.innerHTML = "Mật khẩu không được để trống";
  } else {
    passNull.style.display = "none";
  }

  //lấy dữ liệu về
  const userLocal = JSON.parse(localStorage.getItem("users")) || [];

  //tìm kiếm dữ liệu
  const findUser = userLocal.find(
    (user) => user.email === email.value && user.password === password.value
  );
  if (!findUser) {
    passNull.style.display = "block";
    // passNull.innerHTML = "Tài khoản hoặc mật khẩu của bạn không đúng";
  } else {
    setTimeout(function () {
      window.location.href = "shop.html";
    }, 1000);
  }
});
