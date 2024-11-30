<?php
$host = 'motorcycle-da-ktdl.j.aivencloud.com:17160';
$dbname = 'motorcycle';
$user = 'caotuan';
$password = 'AVNS_hti9_ONmu8qTVi8uTAl';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // if($pdo){
    //     echo "Connected successfully";
    // }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
