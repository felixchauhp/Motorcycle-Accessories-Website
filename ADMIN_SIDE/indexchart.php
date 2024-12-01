<?php include 'dashboard_data.php' ?>
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h2>Order and Revenue Visualization</h2>

<div class="date-range">
    <label for="date-range">Select Date Range: </label>
    <input type="date" id="start-date" name="start-date">
    <input type="date" id="end-date" name="end-date">
    <button onclick="updateChart()">Update Chart</button>
</div>

<!-- Nút Tab -->
<div>
    <button class="tab-button active-tab" onclick="showTab('orders')">Total Orders</button>
    <button class="tab-button" onclick="showTab('revenue')">Total Revenue</button>
    <button class="tab-button" onclick="showTab('combined')">3D Combined Chart</button>
</div>

<!-- Vùng chứa biểu đồ -->
<div class="tab-content">
    <div id="orders-tab" class="chart-container">
        <canvas id="ordersChart"></canvas>
    </div>
    <div id="revenue-tab" class="chart-container" style="display:none;">
        <canvas id="revenueChart"></canvas>
    </div>
    <div id="combined-tab" class="chart-container" style="display:none;">
        <canvas id="combinedChart"></canvas>
    </div>
</div>


    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script>
        let ordersChart, revenueChart, combinedChart;

        // Khởi tạo biểu đồ
        window.onload = function () {
            initializeCharts();
            initializeCombinedChart();
            loadDefaultData();
        };

        function initializeCharts() {
            const ctxOrders = document.getElementById('ordersChart').getContext('2d');
            const ctxRevenue = document.getElementById('revenueChart').getContext('2d');

            ordersChart = new Chart(ctxOrders, {
                type: 'line',
                data: { labels: [], datasets: [{ label: 'Tổng đơn hàng', data: [], borderColor: '#4e73df', backgroundColor: 'rgba(78, 115, 223, 0.2)', fill: true }] },
                options: { responsive: true, scales: { x: { title: { display: true, text: 'Ngày' } }, y: { title: { display: true, text: 'Đơn hàng' } } } }
            });

            revenueChart = new Chart(ctxRevenue, {
                type: 'line',
                data: { labels: [], datasets: [{ label: 'Tổng doanh thu (VNĐ)', data: [], borderColor: '#1cc88a', backgroundColor: 'rgba(28, 200, 138, 0.2)', fill: true }] },
                options: { responsive: true, scales: { x: { title: { display: true, text: 'Ngày' } }, y: { title: { display: true, text: 'Doanh thu (VNĐ)' } } } }
            });
        }

        function initializeCombinedChart() {
            const ctxCombined = document.getElementById('combinedChart').getContext('2d');

            combinedChart = new Chart(ctxCombined, {
                type: 'line',
                data: { labels: [], datasets: [
                    { label: 'Tổng đơn hàng', data: [], borderColor: '#4e73df', backgroundColor: 'rgba(78, 115, 223, 0.2)', yAxisID: 'yOrders', fill: true },
                    { label: 'Tổng doanh thu (VNĐ)', data: [], borderColor: '#1cc88a', backgroundColor: 'rgba(28, 200, 138, 0.2)', yAxisID: 'yRevenue', fill: true }
                ] },
                options: {
                    responsive: true, interaction: { mode: 'index', intersect: false },
                    scales: {
                        x: { title: { display: true, text: 'Ngày' } },
                        yOrders: { type: 'linear', position: 'left', title: { display: true, text: 'Đơn hàng' } },
                        yRevenue: { type: 'linear', position: 'right', title: { display: true, text: 'Doanh thu' }, grid: { drawOnChartArea: false } }
                    }
                }
            });
        }

        function loadDefaultData() {
            fetch(`get_chart_data.php?start_date=2023-11-01&end_date=2023-12-31`)
                .then(response => response.json())
                .then(data => updateCharts(data))
                .catch(error => console.error('Error fetching default data:', error));
        }

        function updateCharts(data) {
            ordersChart.data.labels = data.dates;
            ordersChart.data.datasets[0].data = data.orders;
            ordersChart.update();

            revenueChart.data.labels = data.dates;
            revenueChart.data.datasets[0].data = data.revenue;
            revenueChart.update();

            updateCombinedChart(data);
        }

        function updateCombinedChart(data) {
            combinedChart.data.labels = data.dates;
            combinedChart.data.datasets[0].data = data.orders;
            combinedChart.data.datasets[1].data = data.revenue;
            combinedChart.update();
        }

        function updateChart() {
            const startDate = document.getElementById('start-date').value;
            const endDate = document.getElementById('end-date').value;

            if (startDate && endDate) {
                fetch(`get_chart_data.php?start_date=${startDate}&end_date=${endDate}`)
                    .then(response => response.json())
                    .then(data => updateCharts(data))
                    .catch(error => console.error('Error updating chart data:', error));
            } else {
                alert('Please select both start and end dates.');
            }
        }

        function showTab(tab) {
            document.getElementById('orders-tab').style.display = tab === 'orders' ? 'block' : 'none';
            document.getElementById('revenue-tab').style.display = tab === 'revenue' ? 'block' : 'none';
            document.getElementById('combined-tab').style.display = tab === 'combined' ? 'block' : 'none';

            document.querySelectorAll('.tab-button').forEach(button => button.classList.remove('active-tab'));
            document.querySelector(`button[onclick="showTab('${tab}')"]`).classList.add('active-tab');
        }
    </script>
</body>
</html>
