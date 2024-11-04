const { getConnection } = require("typeorm");
const User = require("./entity/accounts");

//lấy dữ liệu
const formLogin = document.getElementById("formLogin");
const email = document.getElementById("email");
const password = document.getElementById("password");

//dữ liệu null
const emailNull = document.getElementById("emailNull");
const passNull = document.getElementById("passNull");

// lắng nghe sự kiện
formLogin.addEventListener("submit", async function (login) {
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

  try {
    // Lấy kết nối TypeORM
    const connection = getConnection();
    const userRepository = connection.getRepository(User);

    // Tìm người dùng theo email và mật khẩu
    const findUser = await userRepository.findOne({
      where: { email: email.value, password: password.value },
    });

    if (!findUser) {
      passNull.style.display = "block";
      passNull.innerHTML = "Tài khoản hoặc mật khẩu của bạn không đúng";
    } else {
      setTimeout(function () {
        window.location.href = "index.html";
      }, 1000);
    }
  } catch (error) {
    console.error("Đã xảy ra lỗi:", error);
  }
});
