<?php
// Kết nối cơ sở dữ liệu
include 'db_connection.php';

// Khởi tạo các biến rỗng cho dữ liệu và lỗi
$promo_name = $promo_code = $start_date = $end_date = "";
$percent_discount = $min_order = $max_discount = $quantity = "";
$errors = [];

// Xử lý dữ liệu khi biểu mẫu được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra tên mã khuyến mãi
    $promo_name = trim($_POST["promo-name"]);
    if (empty($promo_name)) {
        $errors['promo_name'] = "Vui lòng nhập tên mã khuyến mãi.";
    }

    // Kiểm tra mã khuyến mãi
    $promo_code = trim($_POST["promo-code"]);
    if (empty($promo_code)) {
        $errors['promo_code'] = "Vui lòng nhập mã khuyến mãi.";
    }

    // Kiểm tra ngày bắt đầu
    $start_date = $_POST["promotion-start-date"];
    if (empty($start_date)) {
        $errors['start_date'] = "Vui lòng chọn ngày bắt đầu.";
    }

    // Kiểm tra ngày kết thúc
    $end_date = $_POST["promotion-end-date"];
    if (empty($end_date)) {
        $errors['end_date'] = "Vui lòng chọn ngày kết thúc.";
    } elseif (strtotime($end_date) < strtotime($start_date)) {
        $errors['end_date'] = "Ngày kết thúc phải sau ngày bắt đầu.";
    }

    // Kiểm tra giảm giá theo phần trăm
    $percent_discount = $_POST["percent-discount"];
    if (empty($percent_discount) || !is_numeric($percent_discount) || $percent_discount <= 0 || $percent_discount > 100) {
        $errors['percent_discount'] = "Giá trị giảm phải là số hợp lệ từ 1 đến 100.";
    }

    // Kiểm tra giá trị đơn hàng tối thiểu
    $min_order = $_POST["discount"];
    if (empty($min_order) || !is_numeric($min_order) || $min_order <= 0) {
        $errors['min_order'] = "Giá trị đơn hàng tối thiểu phải là số hợp lệ lớn hơn 0.";
    }

    // Kiểm tra số tiền giảm tối đa
    $max_discount = $_POST["discount"];
    if (empty($max_discount) || !is_numeric($max_discount) || $max_discount <= 0) {
        $errors['max_discount'] = "Số tiền giảm tối đa phải là số hợp lệ lớn hơn 0.";
    }

    // Kiểm tra số lượng
    $quantity = $_POST["quantity"];
    if (empty($quantity) || !is_numeric($quantity) || $quantity <= 0) {
        $errors['quantity'] = "Số lượng phải là số hợp lệ lớn hơn 0.";
    }

    // Nếu không có lỗi, thêm vào cơ sở dữ liệu
    if (empty($errors)) {
        $query = "INSERT INTO promotion (PromoName, PromoCode, StartDate, EndDate, PromoRate, MinValue, MaxAmount, Quantity)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($conn, $query)) {
            // Liên kết các giá trị với câu lệnh SQL
            mysqli_stmt_bind_param($stmt, "ssssdiid", $promo_name, $promo_code, $start_date, $end_date, $percent_discount, $min_order, $max_discount, $quantity);
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Thêm mã khuyến mãi thành công!");window.location.href = "discount.php";</script>';
            } else {
                echo '<p class="text-danger">Đã xảy ra lỗi khi thêm mã khuyến mãi: ' . mysqli_error($conn) . '</p>';
            }
            mysqli_stmt_close($stmt);
        }
    }
}
?>


<?php
// Kết nối cơ sở dữ liệu
include 'db_connection.php';

// Khởi tạo các biến rỗng cho dữ liệu và lỗi
$promo_name = $promo_code = $start_date = $end_date = $discount_type = "";
$percent_discount = $amount_discount = $min_order = $max_discount = $quantity = "";
$errors = [];

// Xử lý dữ liệu khi biểu mẫu được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra tên mã khuyến mãi
    $promo_name = trim($_POST["promo-name"]);
    if (empty($promo_name)) {
        $errors['promo_name'] = "Vui lòng nhập tên mã khuyến mãi.";
    }

    // Kiểm tra mã khuyến mãi
    $promo_code = trim($_POST["promo-code"]);
    if (empty($promo_code)) {
        $errors['promo_code'] = "Vui lòng nhập mã khuyến mãi.";
    }

    // Kiểm tra ngày bắt đầu
    $start_date = $_POST["promotion-start-date"];
    if (empty($start_date)) {
        $errors['start_date'] = "Vui lòng chọn ngày bắt đầu.";
    }

    // Kiểm tra ngày kết thúc
    $end_date = $_POST["promotion-end-date"];
    if (empty($end_date)) {
        $errors['end_date'] = "Vui lòng chọn ngày kết thúc.";
    } elseif (strtotime($end_date) < strtotime($start_date)) {
        $errors['end_date'] = "Ngày kết thúc phải sau ngày bắt đầu.";
    }

    // // Kiểm tra loại giảm giá
    // $discount_type = $_POST["discount-type"];
    // if ($discount_type === "percentage") {
    //     $percent_discount = $_POST["percent-discount"];
    //     if (empty($percent_discount) || !is_numeric($percent_discount) || $percent_discount <= 0 || $percent_discount > 100) {
    //         $errors['percent_discount'] = "Giá trị giảm phải là số hợp lệ từ 1 đến 100.";
    //     }
    // } elseif ($discount_type === "amount") {
    //     $amount_discount = $_POST["amount-discount"];
    //     if (empty($amount_discount) || !is_numeric($amount_discount) || $amount_discount <= 0) {
    //         $errors['amount_discount'] = "Giá trị giảm tiền phải là số hợp lệ lớn hơn 0.";
    //     }
    // }

    // Kiểm tra giá trị đơn hàng tối thiểu
    $min_order = $_POST["discount"];
    if (empty($min_order) || !is_numeric($min_order) || $min_order <= 0) {
        $errors['min_order'] = "Giá trị đơn hàng tối thiểu phải là số hợp lệ lớn hơn 0.";
    }

    // Kiểm tra số tiền giảm tối đa
    $max_discount = $_POST["discount"];
    if (empty($max_discount) || !is_numeric($max_discount) || $max_discount <= 0) {
        $errors['max_discount'] = "Số tiền giảm tối đa phải là số hợp lệ lớn hơn 0.";
    }

    // Kiểm tra số lượng
    $quantity = $_POST["quantity"];
    if (empty($quantity) || !is_numeric($quantity) || $quantity <= 0) {
        $errors['quantity'] = "Số lượng phải là số hợp lệ lớn hơn 0.";
    }

    // Nếu không có lỗi, thêm vào cơ sở dữ liệu
    if (empty($errors)) {
        $query = "INSERT INTO promotion (PromoName, PromoCode, StartDate, EndDate, PromoRate, MinValue, MaxAmount, Quantity)
                  VALUES (?,?,?,?,?,?,?,?)";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, "ssssdiid", $promo_name, $promo_code, $start_date, $end_date, $percent_discount, $min_order, $max_discount, $quantity);
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Thêm mã khuyến mãi thành công!"); window.location.href = "discount.php";</script>';
            } else {
                echo '<p class="text-danger">Đã xảy ra lỗi khi thêm mã khuyến mãi: ' . mysqli_error($conn) . '</p>';
            }
            mysqli_stmt_close($stmt);
        }
    }
}
?>