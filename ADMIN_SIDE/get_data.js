// Context cho các biểu đồ
const ordersChartCtx = document.getElementById('ordersChart').getContext('2d');
const revenueChartCtx = document.getElementById('revenueChart').getContext('2d');

let ordersChart, revenueChart;

// Mặc định hiển thị từ tháng 11/2023 đến 12/2023
// const defaultStartDate = '2023-11-01';
// const defaultEndDate = '2023-12-31';

const sampleData = [
    { date: "2023-11-01", orderCount: 10, totalDue: 500 },
    { date: "2023-11-02", orderCount: 15, totalDue: 700 },
    { date: "2023-11-03", orderCount: 12, totalDue: 800 },
];

updateCharts(sampleData);

// Hàm fetch data từ API PHP
const fetchData = async (timeRange, startDate = null, endDate = null) => {
    let url = `get_data.php?timeRange=${timeRange}`;
    if (startDate && endDate) {
        url += `&startDate=${startDate}&endDate=${endDate}`;
    }

    const response = await fetch(url);
    return response.json();
};

// Hàm cập nhật biểu đồ
const updateCharts = (data) => {
    const labels = data.map(item => item.date);
    const orderCounts = data.map(item => item.orderCount);
    const revenues = data.map(item => item.totalDue);

    if (ordersChart) ordersChart.destroy();
    if (revenueChart) revenueChart.destroy();

    ordersChart = new Chart(ordersChartCtx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Số đơn hàng',
                data: orderCounts,
                borderColor: '#4285F4',
                backgroundColor: 'rgba(66, 133, 244, 0.2)',
                tension: 0.4,
                fill: true,
            }]
        }
    });

    revenueChart = new Chart(revenueChartCtx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Doanh thu (TotalDue)',
                data: revenues,
                backgroundColor: '#34A853',
                borderColor: '#34A853',
                borderWidth: 1
            }]
        }
    });
};

// Xử lý khi chọn khoảng thời gian
document.getElementById('time-range').addEventListener('change', async (event) => {
    const timeRange = event.target.value;

    if (timeRange === 'custom') {
        document.getElementById('custom-range').classList.remove('hidden');
    } else {
        document.getElementById('custom-range').classList.add('hidden');
        const data = await fetchData(timeRange);
        updateCharts(data);
    }
});

// Xử lý khi áp dụng khoảng thời gian tùy chỉnh
document.getElementById('apply-date').addEventListener('click', async () => {
    const startDate = document.getElementById('start-date').value;
    const endDate = document.getElementById('end-date').value;

    if (!startDate || !endDate) {
        alert('Vui lòng chọn cả hai ngày bắt đầu và kết thúc.');
        return;
    }

    const data = await fetchData('custom', startDate, endDate);
    updateCharts(data);
});

// Xử lý khi nhấn nút reset
document.getElementById('reset-chart').addEventListener('click', async () => {
    document.getElementById('time-range').value = 'custom';
    document.getElementById('start-date').value = defaultStartDate;
    document.getElementById('end-date').value = defaultEndDate;

    const data = await fetchData('custom', defaultStartDate, defaultEndDate);
    updateCharts(data);
});

// Chuyển đổi tab giữa biểu đồ Đơn hàng và Doanh thu
document.getElementById('tab-orders').addEventListener('click', () => {
    document.getElementById('orders-chart-container').classList.remove('hidden');
    document.getElementById('revenue-chart-container').classList.add('hidden');
    document.getElementById('tab-orders').classList.add('active');
    document.getElementById('tab-revenue').classList.remove('active');
});

document.getElementById('tab-revenue').addEventListener('click', () => {
    document.getElementById('orders-chart-container').classList.add('hidden');
    document.getElementById('revenue-chart-container').classList.remove('hidden');
    document.getElementById('tab-revenue').classList.add('active');
    document.getElementById('tab-orders').classList.remove('active');
});

// Load dữ liệu mặc định
fetchData('custom', defaultStartDate, defaultEndDate).then(updateCharts);
