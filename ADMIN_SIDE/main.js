function loadDashboardData() {
    const startDate = document.getElementById("start-date").value;
    const endDate = document.getElementById("end-date").value;

    fetch(`dashboard_data.php?start_date=${startDate}&end_date=${endDate}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('total-orders').innerText = data.total_orders || 0;
            document.getElementById('delivered-orders').innerText = data.delivered_orders || 0;
            document.getElementById('cancelled-orders').innerText = data.cancelled_orders || 0;
            document.getElementById('success-rate').innerText = `${data.success_rate || 0}%`;
            document.getElementById('cancel-rate').innerText = `${data.cancelled_rate || 0}%`;
            document.getElementById('total-revenue').innerText = `${data.total_revenue || 0} VND`;

            // Thêm các giá trị khác nếu cần thiết
            // document.getElementById('confirmed-orders').innerText = ...;
            // document.getElementById('packaged-orders').innerText = ...;
            // document.getElementById('out-of-stock-products').innerText = ...;
            // document.getElementById('promo-campaigns').innerText = ...;
        })
        .catch(error => console.error("Lỗi khi tải dữ liệu: ", error));
}

document.addEventListener("DOMContentLoaded", () => {
    loadDashboardData();  // Tải dữ liệu khi trang được load
});
