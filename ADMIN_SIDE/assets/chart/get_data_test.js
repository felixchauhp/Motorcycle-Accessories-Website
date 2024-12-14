// Tham chiếu tất cả các biểu đồ
let combinedChart, ordersChart, revenueChart, totalProductsChart, revenueCategoryChart, productDetails = {};

// Cập nhật window.onload
window.onload = function () {
    initializeCombinedChart(); // Khởi tạo biểu đồ tổng hợp
    initializeCharts(); // Khởi tạo biểu đồ đơn hàng và doanh thu
    initializeCategoryCharts(); // Khởi tạo biểu đồ danh mục sản phẩm
    loadDefaultData(); // Tải dữ liệu mặc định
    showTab('combined'); // Hiển thị mặc định tab Combined Chart
};

// Hàm nhận giá trị ngày bắt đầu và ngày kết thúc từ giao diện người dùng
function getDateRange() {
    const startDate = document.getElementById('start-date').value;
    const endDate = document.getElementById('end-date').value;

    if (!startDate || !endDate) {
        alert('Vui lòng chọn cả ngày bắt đầu và ngày kết thúc.');
        return null;
    }

    if (new Date(startDate) > new Date(endDate)) {
        alert('Ngày bắt đầu không được lớn hơn ngày kết thúc.');
        return null;
    }

    return { startDate, endDate };
}

// Hàm khởi tạo biểu đồ tổng hợp (Combined Chart)
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

// Hàm khởi tạo các biểu đồ đơn hàng và doanh thu
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

// Hàm khởi tạo biểu đồ danh mục sản phẩm
function initializeCategoryCharts() {
    const ctxTotalProducts = document.getElementById('totalProductsChart').getContext('2d');
    const ctxCategoryRevenue = document.getElementById('revenueCategoryChart').getContext('2d');

    totalProductsChart = new Chart(ctxTotalProducts, {
        type: 'bar',
        data: { labels: [], datasets: [] },
        options: {
            responsive: true,
            scales: {
                x: { title: { display: true, text: 'Danh mục sản phẩm' } },
                y: { title: { display: true, text: 'Số lượng' }, beginAtZero: true }
            }
        }
    });

    revenueCategoryChart = new Chart(ctxCategoryRevenue, {
        type: 'line',
        data: { labels: [], datasets: [] },
        options: {
            responsive: true,
            plugins: {
                subtitle: {
                    display: true,
                    text: 'Ghi chú: Doanh thu thuần chưa khấu trừ giảm giá (Giá bán x Số sản phẩm bán ra).',
                    font: { size: 12, style: 'italic' },
                    color: '#555',
                    padding: { bottom: 10 }
                }
            },
            scales: {
                x: { title: { display: true, text: 'Ngày' } },
                y: { title: { display: true, text: 'Doanh thu (VNĐ)' }, beginAtZero: true }
            }
        }
    });
}

// Hàm tải dữ liệu mặc định khi load trang
function loadDefaultData() {
    const today = new Date();
    const endDate = today.toISOString().split('T')[0];
    const startDate = new Date(today);
    startDate.setDate(today.getDate() - 6); // Lấy dữ liệu 7 ngày gần nhất
    const formattedStartDate = startDate.toISOString().split('T')[0];

    fetch(`get_chart_test.php?start_date=${formattedStartDate}&end_date=${endDate}`)
        .then(response => response.json())
        .then(data => {
            updateCharts(data); // Cập nhật các biểu đồ chính
            updateCategoryCharts(formattedStartDate, endDate); // Cập nhật biểu đồ danh mục
        })
        .catch(error => console.error('Error fetching default data:', error));
}

// Hàm cập nhật biểu đồ dựa trên giá trị ngày nhập từ người dùng
function updateChart() {
    const dateRange = getDateRange();
    if (!dateRange) return;

    const { startDate, endDate } = dateRange;

    fetch(`get_chart_test.php?start_date=${startDate}&end_date=${endDate}`)
        .then(response => response.json())
        .then(data => {
            updateCharts(data);
            updateCategoryCharts(startDate, endDate);
        })
        .catch(error => console.error('Error updating chart data:', error));
}

// Hàm cập nhật các biểu đồ chính (Combined, Orders, Revenue)
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

    updateCombinedChart(data); // Cập nhật dữ liệu biểu đồ tổng hợp
}

// Hàm cập nhật dữ liệu cho biểu đồ tổng hợp (Combined Chart)
function updateCombinedChart(data) {
    combinedChart.data.labels = data.dates;
    combinedChart.data.datasets[0].data = data.orders.total;
    combinedChart.data.datasets[1].data = data.revenue.total;
    combinedChart.update();
}

// Hàm cập nhật dữ liệu cho biểu đồ danh mục sản phẩm
function updateCategoryCharts(startDate, endDate) {
    fetch(`get_category_chart.php?start_date=${startDate}&end_date=${endDate}`)
        .then(response => response.json())
        .then(data => {
            const { categories, totalSold, dates, revenueData, productDetails: details } = data;
            productDetails = details; // Lưu thông tin chi tiết sản phẩm

            // Cập nhật biểu đồ tổng sản phẩm bán ra
            totalProductsChart.data.labels = categories;
            totalProductsChart.data.datasets = [{
                label: 'Tổng số sản phẩm bán ra',
                data: totalSold,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }];
            totalProductsChart.update();

            // Cập nhật biểu đồ doanh thu theo danh mục
            const revenueDatasets = Object.entries(revenueData).map(([category, revenues], index) => ({
                label: category,
                data: revenues,
                fill: false,
                borderColor: `hsl(${index * 60}, 70%, 50%)`,
                tension: 0.1
            }));

            revenueCategoryChart.data.labels = dates;
            revenueCategoryChart.data.datasets = revenueDatasets;
            revenueCategoryChart.update();

            addChartClickListener(revenueCategoryChart, dates, categories); // Thêm sự kiện click vào biểu đồ
        })
        .catch(error => console.error('Error fetching category data:', error));
}

// Hàm thêm sự kiện click vào biểu đồ
function addChartClickListener(chart, labels, categories) {
    chart.canvas.onclick = function (event) {
        const points = chart.getElementsAtEventForMode(event, 'nearest', { intersect: true }, true);

        if (points.length) {
            const point = points[0];
            const date = labels[point.index]; // Lấy ngày từ điểm click
            const category = chart.data.datasets[point.datasetIndex].label; // Lấy danh mục từ điểm click

            showProductDetails(date, category); // Hiển thị chi tiết sản phẩm
        }
    };
}

// Hàm hiển thị popup chi tiết sản phẩm theo danh mục và ngày
function showProductDetails(date, category) {
    const details = productDetails[date]?.[category] || [];
    let tableHTML = `
        <table border="1" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Đơn giá (VNĐ)</th>
                    <th>Số lượng</th>
                    <th>Thành tiền (VNĐ)</th>
                </tr>
            </thead>
            <tbody>
    `;

    let totalRevenue = 0;
    details.forEach(item => {
        const unitPrice = item.TotalPrice / item.Quantity;
        tableHTML += `
            <tr>
                <td>${item.ProductName}</td>
                <td>${unitPrice.toLocaleString()}</td>
                <td>${item.Quantity}</td>
                <td>${item.TotalPrice.toLocaleString()}</td>
            </tr>
        `;
        totalRevenue += item.TotalPrice;
    });

    tableHTML += `
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><strong>Tổng cộng:</strong></td>
                    <td><strong>${totalRevenue.toLocaleString()} VNĐ</strong></td>
                </tr>
            </tfoot>
        </table>
    `;

    const existingPopup = document.getElementById('popup-details');
    if (existingPopup) {
        existingPopup.remove();
    }

    const popup = document.createElement('div');
    popup.id = 'popup-details';
    popup.style.position = 'fixed';
    popup.style.left = '50%';
    popup.style.top = '50%';
    popup.style.transform = 'translate(-50%, -50%)';
    popup.style.padding = '20px';
    popup.style.backgroundColor = '#fff';
    popup.style.border = '1px solid #ccc';
    popup.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.2)';
    popup.style.zIndex = 1000;

    const closeButton = document.createElement('div');
    closeButton.innerHTML = '×';
    closeButton.style.position = 'absolute';
    closeButton.style.top = '10px';
    closeButton.style.right = '10px';
    closeButton.style.fontSize = '20px';
    closeButton.style.cursor = 'pointer';
    closeButton.style.color = 'red';
    closeButton.style.fontWeight = 'bold';
    closeButton.onclick = () => popup.remove();

    popup.innerHTML = `
        <h3>Chi tiết: ${category} (${date})</h3>
        ${tableHTML}
    `;
    popup.appendChild(closeButton);

    document.body.appendChild(popup);
}

// Hàm chuyển đổi giữa các tab
function showTab(tab) {
    document.getElementById('orders-tab').style.display = tab === 'orders' ? 'block' : 'none';
    document.getElementById('revenue-tab').style.display = tab === 'revenue' ? 'block' : 'none';
    document.getElementById('combined-tab').style.display = tab === 'combined' ? 'block' : 'none';
    document.getElementById('category-tab').style.display = tab === 'category' ? 'block' : 'none';

    document.querySelectorAll('.tab-button').forEach(button => button.classList.remove('active-tab'));
    document.querySelector(`button[onclick="showTab('${tab}')"]`).classList.add('active-tab');
}
