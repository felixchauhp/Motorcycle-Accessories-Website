<?php
$host = 'motorcycle-da-ktdl.j.aivencloud.com:17160';
$dbname = 'motorcycle';
$user = 'caotuan';
$password = 'AVNS_hti9_ONmu8qTVi8uTAl';

// // Kiểm tra nếu người dùng đã đăng nhập
// $current_page = basename($_SERVER['PHP_SELF']); // Lấy tên file hiện tại
// if (!isset($_SESSION['customer_id'])) {
//     // Nếu chưa đăng nhập và không phải đang ở trang login.php, chuyển hướng về login.php
//     if ($current_page !== 'login.php') {
//         header("Location: login.php");
//         exit;
//    }
// } else {
//     // Nếu đã đăng nhập và đang ở trang login.php, chuyển hướng đến index.php
//     if ($current_page === 'login.php') {
//         header("Location: index.php");
//         exit;
//     }
// }

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // if($pdo){
    //     echo "Connected successfully";
    // }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

setlocale(LC_TIME, 'vi_VN.UTF-8');
// Cấu hình phân trang
$itemsPerPage = 10;
$currentPage = $_GET['page'] ?? 1;
$start = ($currentPage - 1) * $itemsPerPage;
$active_tab = isset($_GET['active_tab']) ? $_GET['active_tab'] : (isset($_POST['active_tab']) ? $_POST['active_tab'] : 'dashboard');
$search = $_GET['search'] ?? '';
$startDate = $_GET['start_date'] ?? '';
$endDate = $_GET['end_date'] ?? '';
$statusFilter = $_GET['status'] ?? '';
$paymentFilter = $_GET['payment'] ?? '';


$params = [];
$whereClauses = [];

if (isset($_SESSION['customer_id'])) {
  $whereClauses[] = "CustomerID = :customerID";
  $params[':customerID'] = $_SESSION['customer_id'];
}
if ($search) {
    $whereClauses[] = "(OrderID LIKE :search)";
    $params[':search'] = "%$search%";
}
if ($startDate) {
    $whereClauses[] = "OrderDate >= :startDate";
    $params[':startDate'] = $startDate;
}
if ($endDate) {
    $whereClauses[] = "OrderDate <= :endDate";
    $params[':endDate'] = $endDate;
}
if ($statusFilter) {
    $whereClauses[] = "OrderStatus = :statusFilter";
    $params[':statusFilter'] = $statusFilter;
}
if ($paymentFilter) {
    $whereClauses[] = "PaymentStatus = :paymentFilter";
    $params[':paymentFilter'] = $paymentFilter;
}

$whereSQL = $whereClauses ? 'WHERE ' . implode(' AND ', $whereClauses) : '';

// Truy vấn tổng số đơn hàng
$totalOrdersQuery = "SELECT COUNT(*) as total FROM orders $whereSQL";
$stmt = $pdo->prepare($totalOrdersQuery);
foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
}
$stmt->execute();
$totalOrders = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
$totalOrderPages = ceil($totalOrders / $itemsPerPage);

$orders = []; // Khởi tạo danh sách đơn hàng rỗng
if (isset($_SESSION['customer_id'])) {
    $orderQuery = "SELECT OrderID, OrderDate, OrderStatus, PaymentStatus, TotalDue 
                   FROM orders 
                   $whereSQL 
                   ORDER BY OrderDate DESC 
                   LIMIT :start, :itemsPerPage";
    $stmt = $pdo->prepare($orderQuery);

    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    $stmt->bindValue(':start', $start, PDO::PARAM_INT);
    $stmt->bindValue(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

