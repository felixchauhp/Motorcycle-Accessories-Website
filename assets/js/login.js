function login() {
  event.preventDefault();
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  const list_account = JSON.parse(localStorage.getItem("accounts")) || [];

  let index = list_account.findIndex(
    (v) => v.email === email && v.password === password
  );
  if (index >= 0) {
    window.location.href = "shop.html";
  } else {
    alert("Sai tài khoản hoặc mật khẩu");
  }
}
