<?php
session_start();
// If the user confirms logout
if (isset($_POST['logout'])) {
    // Destroy the session
    session_unset();
    session_destroy();
    // Redirect to the login page or home page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
   <!--=============== DOCUMENT HEAD ===============-->
   <?php include 'head.php'; ?>

<body>
   <!--=============== HEADER ===============-->
   <?php include 'header.php'; ?>

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== BREADCRUMB ===============-->
      <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
          <li><a href="index.php" class="breadcrumb__link">Home</a></li>
          <li><span class="breadcrumb__link">></span></li>
          <li><span class="breadcrumb__link">Đăng xuất</span></li>
        </ul>
      </section>
    
    <!--=============== LOGOUT ===============-->
    <h1>Are you sure you want to logout?</h1>
    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>


 <!--=============== FOOTER ===============-->
  <?php include 'footer.php'; ?>
</body>
</html>