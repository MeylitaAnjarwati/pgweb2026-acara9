<?php
$kalurahan = $_POST['kalurahan'] ?? '';
$kapanewon = $_POST['kapanewon'] ?? '';
$latitude  = $_POST['latitude'] ?? '';
$longitude = $_POST['longitude'] ?? '';
$praktik   = $_POST['praktik'] ?? '';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faskes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `sebaram faskes sleman` (kalurahan, kapanewon, latitude, longitude, praktik) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdds", $kalurahan, $kapanewon, $latitude, $longitude, $praktik);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: ../index.php");
    exit();
} else {
    echo "Gagal menyimpan data: " . $conn->error;
}
?>