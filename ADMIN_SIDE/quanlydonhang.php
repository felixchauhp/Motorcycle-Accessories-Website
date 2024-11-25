<?php
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
 <!--=============== HEAD ===============-->
 <?php include 'head.php'; ?>
<body>
  <!--=============== HEADER ===============-->
  <?php include 'header.php'; ?>
    <!--=============== ORDER ===============-->   
<body>
    <main class="main">
        <section class="wishlist section--lg container">
            <div class="table__container">
              <table class="table">
                <thead>
                  <tr>
                    <th>Mã đơn hàng</th>
                    <th>Mã khách hàng</th>
                    <th>Thành tiền</th>
                    <th>Ngày tạo đơn</th>
                    <th>Trạng thái</th>
                    <th>Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($orders as $order): ?>
                  <tr>  
                  <td>
                            <?= htmlspecialchars($order['OrderID']) ?>
                  </td>  
                  <td>
                        <p class="table__description">
                              <?= htmlspecialchars($order['CustomerID']) ?>
                        </p>
                  </td>
                    <td>
                      <span class="table__price">
                              <?= htmlspecialchars($order['TotalDue']) ?>
                      </span>
                    </td>
                    <td><span class="table__stock">
                              <?= htmlspecialchars($order['OrderDate']) ?>
                        </span>
                    </td>
                    <td>
                                <select id="status" onchange="removeSelectedOption()">
                                    <option value="">-- Chọn trạng thái --</option>
                                    <option value="confirmed">Đã xác nhận</option>
                                    <option value="packed">Đã đóng gói</option>
                                    <option value="delivered">Đã giao</option>
                                    <option value="canceled">Đã hủy</option>
                                </select>
                    
                                <script>
                                    function removeSelectedOption() {
                                        const select = document.getElementById("status");
                                        const selectedIndex = select.selectedIndex;
                            
                                        if (selectedIndex > 0) { // Bỏ qua option đầu tiên
                                            select.options[selectedIndex].disabled = true; // Loại bỏ option đã chọn
                                        }
                                    }
                                </script>
                    </td>
                    <td>
                        <i class="fi fi-rs-trash table__trash"></i>
                        <!-- Nút In -->
                        <button onclick="window.print()">
                          <i class="fi fi-rs-print table__trash "></i>
                        </button>
                        <i class="fi fi-rs-menu-dots table__trash"></i>
                    </td>
                  </tr>
                <?php endforeach; ?>                    
                </tbody>
              </table>
              <ul class="pagination" id="pagination">
                <!-- Sẽ được điền bằng JavaScript -->
            </ul>
            </div>
          </section>
  </main>
  <!--=============== FOOTER ===============-->
  <?php include 'footer.php'; ?>
</body>
</html>