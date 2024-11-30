<?php include 'dashboard_data.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Main Content -->
    <div class="chart-container">
        <div class="controls">
            <label for="time-range">Chọn khoảng thời gian:</label>
            <select id="time-range">
                <option value="7days">7 ngày gần nhất</option>
                <option value="30days">30 ngày gần nhất</option>
                <option value="custom">Tùy chỉnh</option>
            </select>
            <div id="custom-range" class="hidden">
                <input type="date" id="start-date">
                <input type="date" id="end-date">
                <button id="apply-date">Áp dụng</button>
            </div>
            <button id="reset-chart">Nhập lại</button>
        </div>

        <div class="chart-tabs">
            <button id="tab-orders" class="active">Biểu đồ Đơn hàng</button>
            <button id="tab-revenue">Biểu đồ Doanh thu</button>
        </div>

        <div id="orders-chart-container">
            <canvas id="ordersChart"></canvas>
        </div>
        <div id="revenue-chart-container" class="hidden">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="get_data.js"></script>
</body>

</html>
