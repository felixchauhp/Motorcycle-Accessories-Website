<?php
include 'db_connection.php';

// Lấy dữ liệu từ form (nếu có), nếu không thì lấy giá trị mặc định
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '2024-12-02';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '2024-12-02';

// Truy vấn đơn hàng đã xác nhận
$confirmed_orders_query = "SELECT COUNT(*) AS confirmed_orders FROM orders WHERE OrderStatus = 'Đã xác nhận' AND OrderDate BETWEEN '$start_date' AND '$end_date'";
$confirmed_orders_result = $conn->query($confirmed_orders_query);
$confirmed_orders = $confirmed_orders_result ? $confirmed_orders_result->fetch_assoc()['confirmed_orders'] : 0;

// Đơn hàng đã đóng gói
$packed_orders_query = "SELECT COUNT(*) AS packed_orders FROM orders WHERE OrderStatus = 'Đã đóng gói' AND OrderDate BETWEEN '$start_date' AND '$end_date'";
$packed_orders_result = $conn->query($packed_orders_query);
$packed_orders = $packed_orders_result ? $packed_orders_result->fetch_assoc()['packed_orders'] : 0;

// Đơn hàng đã giao
$delivered_orders_query = "SELECT COUNT(*) AS delivered_orders FROM orders WHERE OrderStatus = 'Đã giao' AND OrderDate BETWEEN '$start_date' AND '$end_date'";
$delivered_orders_result = $conn->query($delivered_orders_query);
$delivered_orders = $delivered_orders_result ? $delivered_orders_result->fetch_assoc()['delivered_orders'] : 0;

// Đơn hàng bị hủy
$canceled_orders_query = "SELECT COUNT(*) AS canceled_orders FROM orders WHERE OrderStatus = 'Đã hủy' AND OrderDate BETWEEN '$start_date' AND '$end_date'";
$canceled_orders_result = $conn->query($canceled_orders_query);
$canceled_orders = $canceled_orders_result ? $canceled_orders_result->fetch_assoc()['canceled_orders'] : 0;

// Sản phẩm hết hàng
$out_of_stock_query = "SELECT COUNT(*) AS out_of_stock FROM products WHERE InStock = 0";
$out_of_stock_result = $conn->query($out_of_stock_query);
$out_of_stock = $out_of_stock_result ? $out_of_stock_result->fetch_assoc()['out_of_stock'] : 0;

// Chương trình khuyến mãi đang diễn ra
$active_promotions_query = "SELECT COUNT(*) AS active_promotions FROM promotion WHERE StartDate <= '$end_date' AND EndDate >= '$start_date'";
$active_promotions_result = $conn->query($active_promotions_query);
$active_promotions = $active_promotions_result ? $active_promotions_result->fetch_assoc()['active_promotions'] : 0;

// Tổng doanh số
$sales_query = "SELECT SUM(TotalDue) AS total_sales FROM orders WHERE OrderDate BETWEEN '$start_date' AND '$end_date'";
$sales_result = $conn->query($sales_query);
$total_sales = $sales_result ? $sales_result->fetch_assoc()['total_sales'] : 0;

// Tổng số đơn hàng
$total_orders_query = "SELECT COUNT(*) AS total_orders FROM orders WHERE OrderDate BETWEEN '$start_date' AND '$end_date'";
$total_orders_result = $conn->query($total_orders_query);
$total_orders = $total_orders_result ? $total_orders_result->fetch_assoc()['total_orders'] : 0;

// Tỷ lệ bàn giao và tỷ lệ hủy
$success_rate = ($total_orders - $canceled_orders > 0) 
    ? ($packed_orders / ($total_orders - $canceled_orders)) * 100 
    : 0;
$cancellation_rate = ($total_orders > 0) ? ($canceled_orders / $total_orders) * 100 : 0;
?>
