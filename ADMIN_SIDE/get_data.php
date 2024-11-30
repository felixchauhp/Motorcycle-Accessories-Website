<?php
include 'db_connection.php'; // File kết nối database

$timeRange = $_GET['timeRange'] ?? ''; // Kiểm tra và gán mặc định là rỗng
$startDate = $_GET['startDate'] ?? null; // Kiểm tra tham số tùy chỉnh
$endDate = $_GET['endDate'] ?? null;

$query = "SELECT DATE(OrderDate) as date, COUNT(OrderID) as orderCount, SUM(TotalDue) as totalDue FROM orders WHERE 1=1";

if ($timeRange === '30days') {
    $query .= " AND OrderDate >= DATE(NOW() - INTERVAL 30 DAY)";
} elseif ($timeRange === '7days') {
    $query .= " AND OrderDate >= DATE(NOW() - INTERVAL 7 DAY)";
} elseif ($timeRange === 'custom' && $startDate && $endDate) {
    $query .= " AND OrderDate BETWEEN '$startDate' AND '$endDate'";
}

$query .= " GROUP BY DATE(OrderDate) ORDER BY DATE(OrderDate)";

$result = $conn->query($query);
$data = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data[] = ['date' => '0000-00-00', 'orderCount' => 0, 'totalDue' => 0];
}

header('Content-Type: application/json');
echo json_encode($data);
?>
