<?php
$id        = $_POST['id'];
$kalurahan = $_POST['kalurahan'];
$kapanewon = $_POST['kapanewon'];
$latitude  = $_POST['latitude'];
$longitude = $_POST['longitude'];
$praktik   = $_POST['praktik'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faskes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `sebaram faskes sleman` SET kalurahan=?, kapanewon=?, latitude=?, longitude=?, praktik=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssddsi", $kalurahan, $kapanewon, $latitude, $longitude, $praktik, $id);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: ../index.php");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}
?>