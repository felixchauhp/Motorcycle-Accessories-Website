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

// Thiết lập ngày mặc định từ 1/11/2023 đến 31/12/2023
$start_date = $_GET['start_date'] ?? '2023-11-01';
$end_date = $_GET['end_date'] ?? '2023-12-31';

$query = "
    SELECT DATE(OrderDate) AS date,
           COUNT(OrderID) AS total_orders,
           SUM(TotalDue) AS total_revenue
    FROM orders
    WHERE OrderDate BETWEEN ? AND ?
    GROUP BY DATE(OrderDate)
    ORDER BY date
";

$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$stmt->close();
$conn->close();

$dates = [];
$orders = [];
$revenue = [];

foreach ($data as $row) {
    $dates[] = $row['date'];
    $orders[] = (int) $row['total_orders'];
    $revenue[] = (float) $row['total_revenue'];
}

echo json_encode([
    'dates' => $dates,
    'orders' => $orders,
    'revenue' => $revenue
]);
?>
