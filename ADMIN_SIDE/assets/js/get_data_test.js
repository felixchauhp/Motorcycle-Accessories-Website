let combinedChart, ordersChart, revenueChart;

// Khởi tạo biểu đồ
window.onload = function () {
    initializeCombinedChart();
    initializeCharts();
    loadDefaultData();
    showTab('combined'); // Hiển thị mặc định tab Combined Chart
};

function initializeCombinedChart() {
    const ctxCombined = document.getElementById('combinedChart').getContext('2d');

    combinedChart = new Chart(ctxCombined, {
        type: 'line',
        data: {
            labels: [],
            datasets: [
                {
                    label: 'Tổng đơn hàng',
                    data: [],
                    borderColor: '#4e73df',
                    backgroundColor: 'rgba(78, 115, 223, 0.2)',
                    yAxisID: 'yOrders',
                    fill: true
                },
                {
                    label: 'Tổng doanh thu (VNĐ)',
                    data: [],
                    borderColor: '#1cc88a',
                    backgroundColor: 'rgba(28, 200, 138, 0.2)',
                    yAxisID: 'yRevenue',
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            interaction: { mode: 'index', intersect: false },
            scales: {
                x: { title: { display: true, text: 'Ngày' } },
                yOrders: { type: 'linear', position: 'left', title: { display: true, text: 'Đơn hàng' } },
                yRevenue: { type: 'linear', position: 'right', title: { display: true, text: 'Doanh thu' }, grid: { drawOnChartArea: false } }
            }
        }
    });
}

function initializeCharts() {
    const ctxOrders = document.getElementById('ordersChart').getContext('2d');
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');

    ordersChart = new Chart(ctxOrders, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [
                { label: 'Đã xác nhận', data: [], backgroundColor: 'rgba(78, 115, 223, 0.8)' },
                { label: 'Đã hủy', data: [], backgroundColor: 'rgba(255, 99, 132, 0.8)' },
                { label: 'Đã đóng gói', data: [], backgroundColor: 'rgba(54, 162, 235, 0.8)' },
                { label: 'Đã giao', data: [], backgroundColor: 'rgba(75, 192, 192, 0.8)' }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: { title: { display: true, text: 'Ngày' } },
                y: { title: { display: true, text: 'Số đơn hàng' } }
            }
        }
    });

    revenueChart = new Chart(ctxRevenue, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [
                { label: 'Thành công', data: [], backgroundColor: 'rgba(28, 200, 138, 0.8)' },
                { label: 'Thất bại', data: [], backgroundColor: 'rgba(255, 159, 64, 0.8)' },
                { label: 'Đang chờ', data: [], backgroundColor: 'rgba(153, 102, 255, 0.8)' }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: { title: { display: true, text: 'Ngày' } },
                y: { title: { display: true, text: 'Doanh thu (VNĐ)' } }
            }
        }
    });
}

function loadDefaultData() {
    fetch(`get_chart_test.php?start_date=2023-11-01&end_date=2023-11-08`)
        .then(response => response.json())
        .then(data => updateCharts(data))
        .catch(error => console.error('Error fetching default data:', error));
}

function updateCharts(data) {
    ordersChart.data.labels = data.dates;
    ordersChart.data.datasets[0].data = data.orders.confirmed;
    ordersChart.data.datasets[1].data = data.orders.canceled;
    ordersChart.data.datasets[2].data = data.orders.packed;
    ordersChart.data.datasets[3].data = data.orders.delivered;
    ordersChart.update();

    revenueChart.data.labels = data.dates;
    revenueChart.data.datasets[0].data = data.revenue.success;
    revenueChart.data.datasets[1].data = data.revenue.failed;
    revenueChart.data.datasets[2].data = data.revenue.pending;
    revenueChart.update();

    updateCombinedChart(data);
}

function updateCombinedChart(data) {
    combinedChart.data.labels = data.dates;
    combinedChart.data.datasets[0].data = data.orders.total;
    combinedChart.data.datasets[1].data = data.revenue.total;
    combinedChart.update();
}

function updateChart() {
    const startDate = document.getElementById('start-date').value;
    const endDate = document.getElementById('end-date').value;

    if (startDate && endDate) {
        fetch(`get_chart_test.php?start_date=${startDate}&end_date=${endDate}`)
            .then(response => response.json())
            .then(data => updateCharts(data))
            .catch(error => console.error('Error updating chart data:', error));
    } else {
        alert('Vui lòng chọn cả ngày bắt đầu và kết thúc.');
    }
}

function showTab(tab) {
    document.getElementById('orders-tab').style.display = tab === 'orders' ? 'block' : 'none';
    document.getElementById('revenue-tab').style.display = tab === 'revenue' ? 'block' : 'none';
    document.getElementById('combined-tab').style.display = tab === 'combined' ? 'block' : 'none';

    document.querySelectorAll('.tab-button').forEach(button => button.classList.remove('active-tab'));
    document.querySelector(`button[onclick="showTab('${tab}')"]`).classList.add('active-tab');
}