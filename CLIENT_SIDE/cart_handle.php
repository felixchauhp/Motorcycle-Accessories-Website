
<?php
session_start();
include 'db_connection.php';

// Khởi tạo giỏ hàng nếu chưa tồn tại
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Xử lý thêm sản phẩm vào giỏ
if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['ProductID'])) {
    $productID = $_GET['ProductID'];

    // Truy vấn thông tin sản phẩm từ database
    $stmt = $conn->prepare("SELECT * FROM products WHERE ProductID = ?");
    $stmt->bind_param("s", $productID);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    if ($product) {
        // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng
        if (array_key_exists($productID, $_SESSION['cart'])) {
            $_SESSION['cart'][$productID]['quantity'] += 1;
        } else {
            // Thêm sản phẩm mới vào giỏ hàng
            $_SESSION['cart'][$productID] = [
                'name' => $product['ProductName'],
                'price' => $product['SalePrice'],
                'image' => $product['Image'],
                'quantity' => 1
            ];
        }
    } else {
        echo "Sản phẩm không tồn tại trong cơ sở dữ liệu.";
    }

    // Chuyển hướng lại trang cart.php
    header('Location: cart.php');
    exit();
}

// Xử lý xóa sản phẩm khỏi giỏ
if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['ProductID'])) {
    $productID =$_GET['ProductID'];
    if (isset($_SESSION['cart'][$productID])) {
        unset($_SESSION['cart'][$productID]);
    }

    // Chuyển hướng lại trang cart.php
    header('Location: cart.php');
    exit();
}
$total = 0;
foreach ($_SESSION['cart'] as $product) {
    $total += $product['price'] * $product['quantity'];
}

// xử lý mã giảm giá

// if (isset($_POST['apply_promo'])) {
//     $promo_code = trim($_POST['promo_code']);

//     // Truy vấn mã giảm giá từ cơ sở dữ liệu
//     $stmt = $conn->prepare("SELECT * FROM promotion WHERE PromoCode = ? AND Quantity > 0 AND StartDate <= NOW() AND EndDate >= NOW()");
//     $stmt->bind_param("s", $promo_code);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $promo = $result->fetch_assoc();

//     if ($promo) {
//         // Mã giảm giá hợp lệ, lưu vào session
//         $_SESSION['promo'] = $promo;
//         $message = "Mã giảm giá đã được áp dụng.";
//     } else {
//         // Mã giảm giá không hợp lệ
//         $message = "Mã giảm giá không hợp lệ hoặc đã hết hạn.";
//     }
// }

// // Lấy thông tin giỏ hàng từ session
// $total = 0;
// foreach ($_SESSION['cart'] as $item) {
//     $total += $item['price'] * $item['quantity'];
// }

// // Kiểm tra và áp dụng giảm giá
// $discount = 0;
// if (isset($_SESSION['promo'])) {
//     $promo = $_SESSION['promo'];
//     $min_value = $promo['MinValue'];
//     $max_amount = $promo['MaxAmount'];
    
//     // Kiểm tra điều kiện giảm giá
//     if ($total >= $min_value) {
//         $discount = min($total * ($promo['PromoRate'] / 100), $max_amount);
//     }
// }

// $total_after_discount = $total - $discount;
// ?>
// ?>
