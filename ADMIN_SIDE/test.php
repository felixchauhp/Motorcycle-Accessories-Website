//test frontend avien
<?php
// Bao gồm file kết nối cơ sở dữ liệu
include('index.php');

// Truy vấn lấy tất cả các địa chỉ trong bảng `address_list`
$sql = "SELECT * FROM address_list";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách địa chỉ</title>
    <link rel="stylesheet" href="style.css"> <!-- Bạn có thể thêm CSS để tùy chỉnh giao diện -->
</head>
<body>

    <h1>Danh sách Địa chỉ</h1>

    <?php
    if ($result->num_rows > 0) {
        // Hiển thị bảng dữ liệu
        echo "<table border='1'>
                <tr>
                    <th>Địa chỉ</th>
                    <th>Mã khách hàng</th>
                </tr>";
        
        // Hiển thị từng dòng dữ liệu
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["Address"] . "</td>
                    <td>" . $row["CustomerID"] . "</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "Không có dữ liệu.";
    }

    // Đóng kết nối
    $conn->close();
    ?>

</body>
</html>
