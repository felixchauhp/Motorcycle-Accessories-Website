// Giả lập dữ liệu người dùng từ file JSON
const users = {
    "user1": "password123",
    "user2": "mypassword",
    "admin": "admin123"
};

// Hàm xử lý đăng nhập
document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();  // Ngừng gửi form

    // Lấy thông tin từ form
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Kiểm tra tên đăng nhập và mật khẩu
    if (users[username] && users[username] === password) {
        // Có thể chuyển hướng đến trang khác sau khi đăng nhập thành công
        window.location.href = "index-main.html";  // Ví dụ: chuyển hướng đến trang chào mừng
    } else {
        // Hiển thị thông báo lỗi
        document.getElementById("message").style.display = "block";
    }
});
