// import { AppDataSource } from "../src/data-source.js";
// import accounts from "../src/entity/accounts.js";

//lấy dữ liệu
const formLogin = document.getElementById("formLogin");
const email = document.getElementById("email").value;
const password = document.getElementById("password").value;
console.log(email);
console.log(password);

//dữ liệu null
// const emailNull = document.getElementById("emailNull");
// const passNull = document.getElementById("passNull");

// console.log(email.value);
// // lắng nghe sự kiện
// formLogin.addEventListener("submit", async function (login) {
//   // ngăn chặn load lại trang
//   login.preventDefault();
//   //validate dữ liệu
//   if (!email.value) {
//     emailNull.style.display = "block";
//   } else {
//     emailNull.style.display = "none";
//   }
//   if (!password.value) {
//     passNull.style.display = "block";
//     // passNull.innerHTML = "Mật khẩu không được để trống";
//   } else {
//     passNull.style.display = "none";
//   }

//   try {
//     // Lấy kết nối TypeORM
//     const userRepository = AppDataSource.getRepository(accounts);

//     // Tìm người dùng theo email và mật khẩu
//     const findUser = await userRepository.findOne({
//       where: { TenTaiKhoan: email.value, MatKhau: password.value },
//     });
//     console.log(findUser);

//     if (!findUser) {
//       passNull.style.display = "block";
//       passNull.innerHTML = "Tài khoản hoặc mật khẩu của bạn không đúng";
//     } else {
//       console.log("Ket noi thanh cong voi userID: ", findUser.UserID);
//       // setTimeout(function () {
//       //   window.location.href = "index.html";
//       // }, 1000);
//     }
//   } catch (error) {
//     console.error("Đã xảy ra lỗi:", error);
//   }
// });
