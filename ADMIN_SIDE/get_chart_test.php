<?php
$host = 'motorcycle-da-ktdl.j.aivencloud.com';
$port = 17160;
$username = 'baophuc';
$password = 'AVNS_Y0CHLEKwLz75-i0dayg';
$database = 'motorcycle';

// Kết nối với MySQL
$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thiết lập ngày hiện tại theo định dạng 'YYYY-MM-DD'
$current_date = date('Y-m-d');

// Tính ngày bắt đầu là 7 ngày trước
$start_date_default = date('Y-m-d', strtotime('-6 days', strtotime($current_date)));

// Lấy dữ liệu từ URL hoặc dùng giá trị mặc định
$start_date = $_GET['start_date'] ?? $start_date_default;
$end_date = $_GET['end_date'] ?? $current_date;

// Truy vấn dữ liệu chi tiết theo trạng thái đơn hàng và thanh toán
$query = "
    SELECT DATE(OrderDate) AS date,
           COUNT(OrderID) AS total_orders,
           SUM(TotalDue) AS total_revenue,
           SUM(CASE WHEN OrderStatus = 'Đã xác nhận' THEN 1 ELSE 0 END) AS confirmed,
           SUM(CASE WHEN OrderStatus = 'Đã hủy' THEN 1 ELSE 0 END) AS canceled,
           SUM(CASE WHEN OrderStatus = 'Đã đóng gói' THEN 1 ELSE 0 END) AS packed,
           SUM(CASE WHEN OrderStatus = 'Đã giao' THEN 1 ELSE 0 END) AS delivered,
           SUM(CASE WHEN PaymentStatus = 'Thành công' THEN TotalDue ELSE 0 END) AS revenue_success,
           SUM(CASE WHEN PaymentStatus = 'Thất bại' THEN TotalDue ELSE 0 END) AS revenue_failed,
           SUM(CASE WHEN PaymentStatus = 'Đang chờ' THEN TotalDue ELSE 0 END) AS revenue_pending
    FROM orders
    WHERE OrderDate BETWEEN ? AND ?
    GROUP BY DATE(OrderDate)
    ORDER BY date
";

$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();

// Xử lý dữ liệu trả về
$data = [
    'dates' => [],
    'orders' => [
        'confirmed' => [],
        'canceled' => [],
        'packed' => [],
        'delivered' => [],
        'total' => [] // Tổng đơn hàng
    ],
    'revenue' => [
        'success' => [],
        'failed' => [],
        'pending' => [],
        'total' => [] // Tổng doanh thu
    ]
];

while ($row = $result->fetch_assoc()) {
    $data['dates'][] = $row['date'];
    $data['orders']['confirmed'][] = (int) $row['confirmed'];
    $data['orders']['canceled'][] = (int) $row['canceled'];
    $data['orders']['packed'][] = (int) $row['packed'];
    $data['orders']['delivered'][] = (int) $row['delivered'];
    $data['orders']['total'][] = (int) $row['total_orders'];
    $data['revenue']['success'][] = (float) $row['revenue_success'];
    $data['revenue']['failed'][] = (float) $row['revenue_failed'];
    $data['revenue']['pending'][] = (float) $row['revenue_pending'];
    $data['revenue']['total'][] = (float) $row['total_revenue'];
}

$stmt->close();
$conn->close();

// Trả dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT); // Dùng JSON_PRETTY_PRINT để dễ đọc
exit();
?>
