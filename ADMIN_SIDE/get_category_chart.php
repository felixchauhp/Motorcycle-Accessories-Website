<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Thông tin kết nối
$host = 'motorcycle-da-ktdl.j.aivencloud.com';
$port = 17160;
$username = 'baophuc';
$password = 'AVNS_Y0CHLEKwLz75-i0dayg';
$database = 'motorcycle';

// Kết nối với MySQL
$conn = new mysqli($host, $username, $password, $database, $port);
if ($conn->connect_error) {
    die(json_encode(['error' => "Kết nối thất bại: " . $conn->connect_error]));
}

// Thiết lập ngày hiện tại
$current_date = date('Y-m-d');

// Ngày mặc định 7 ngày trước
$start_date_default = date('Y-m-d', strtotime('-6 days', strtotime($current_date)));

// Lấy ngày từ URL hoặc giá trị mặc định
$start_date = $_GET['start_date'] ?? $start_date_default;
$end_date = $_GET['end_date'] ?? $current_date;

// 1. Tổng số sản phẩm bán ra của từng danh mục
$query1 = "
    SELECT pic.Category, SUM(pio.InStock) AS TotalSold
    FROM products_in_orders pio
    JOIN products_in_category pic ON pio.ProductID = pic.ProductID
    JOIN orders o ON pio.OrderID = o.OrderID
    WHERE o.OrderDate BETWEEN '$start_date' AND '$end_date'
      AND o.OrderStatus = 'đã xác nhận'
    GROUP BY pic.Category
    ORDER BY pic.Category
";

$result1 = $conn->query($query1);

if (!$result1) {
    die(json_encode(['error' => "Lỗi truy vấn 1: " . $conn->error]));
}

$categories = [];
$totalSold = [];
while ($row = $result1->fetch_assoc()) {
    $categories[] = $row['Category'];
    $totalSold[] = (int)$row['TotalSold'];
}

// 2. Doanh số của từng danh mục theo ngày
$query2 = "
    SELECT o.OrderDate, pic.Category, SUM(p.SalePrice * pio.InStock) AS Revenue
    FROM products_in_orders pio
    JOIN products_in_category pic ON pio.ProductID = pic.ProductID
    JOIN products p ON pio.ProductID = p.ProductID
    JOIN orders o ON pio.OrderID = o.OrderID
    WHERE o.OrderDate BETWEEN '$start_date' AND '$end_date'
      AND o.OrderStatus = 'đã xác nhận'
    GROUP BY o.OrderDate, pic.Category
    ORDER BY o.OrderDate, pic.Category
";

$result2 = $conn->query($query2);

if (!$result2) {
    die(json_encode(['error' => "Lỗi truy vấn 2: " . $conn->error]));
}

// Chuẩn bị dữ liệu cho biểu đồ doanh thu
$dates = [];
$revenueData = []; 

$period = new DatePeriod(
    new DateTime($start_date),
    new DateInterval('P1D'),
    (new DateTime($end_date))->modify('+1 day')
);

foreach ($period as $date) {
    $dates[] = $date->format('Y-m-d');
}

foreach ($categories as $category) {
    $revenueData[$category] = array_fill(0, count($dates), 0);
}

$dateIndex = array_flip($dates);

while ($row = $result2->fetch_assoc()) {
    $date = $row['OrderDate'];
    $category = $row['Category'];
    $revenue = (float)$row['Revenue'];

    if (isset($dateIndex[$date]) && isset($revenueData[$category])) {
        $revenueData[$category][$dateIndex[$date]] += $revenue;
    }
}

// 3. Chi tiết sản phẩm cho từng ngày và danh mục
$query3 = "
    SELECT o.OrderDate, pic.Category, p.ProductName, pio.InStock AS Quantity, 
           (p.SalePrice * pio.InStock) AS TotalPrice
    FROM products_in_orders pio
    JOIN products_in_category pic ON pio.ProductID = pic.ProductID
    JOIN products p ON pio.ProductID = p.ProductID
    JOIN orders o ON pio.OrderID = o.OrderID
    WHERE o.OrderDate BETWEEN '$start_date' AND '$end_date'
      AND o.OrderStatus = 'đã xác nhận'
    ORDER BY o.OrderDate, pic.Category
";

$result3 = $conn->query($query3);

$productDetails = [];
if ($result3->num_rows > 0) {
    while ($row = $result3->fetch_assoc()) {
        $date = $row['OrderDate'];
        $category = $row['Category'];

        if (!isset($productDetails[$date])) {
            $productDetails[$date] = [];
        }

        if (!isset($productDetails[$date][$category])) {
            $productDetails[$date][$category] = [];
        }

        $productDetails[$date][$category][] = [
            'ProductName' => $row['ProductName'],
            'Quantity' => (int)$row['Quantity'],
            'TotalPrice' => (float)$row['TotalPrice'],
        ];
    }
}

// Trả về JSON
header('Content-Type: application/json');
echo json_encode([
    'categories' => $categories,
    'totalSold' => $totalSold,
    'dates' => $dates,
    'revenueData' => $revenueData,
    'productDetails' => $productDetails
]);

$conn->close();
?>
