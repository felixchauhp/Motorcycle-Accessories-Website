// script.js
const snowContainer = document.getElementById("snow-container");

function createSnowflake() {
  const snowflake = document.createElement("div");
  snowflake.classList.add("snowflake");
  snowflake.textContent = "❄"; // Biểu tượng bông tuyết

  // Vị trí ngẫu nhiên và kích thước khác nhau
  snowflake.style.left = Math.random() * window.innerWidth + "px";
  snowflake.style.fontSize = Math.random() * 10 + 10 + "px";
  snowflake.style.animationDuration = Math.random() * 3 + 2 + "s"; // Tốc độ rơi
  snowflake.style.animationDelay = Math.random() * 5 + "s"; // Độ trễ

  snowContainer.appendChild(snowflake);

  // Xóa bông tuyết khi hoàn thành animation
  setTimeout(() => {
    snowflake.remove();
  }, 5000);
}

// Tạo bông tuyết liên tục
setInterval(createSnowflake, 200);
