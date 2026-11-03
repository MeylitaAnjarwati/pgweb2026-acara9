<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Edit Faskes</title>
</head>
<body>

<h2>Form Edit Faskes</h2>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faskes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM `sebaram faskes sleman` WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="kalurahan">Kalurahan:</label><br>
        <input type="text" id="kalurahan" name="kalurahan" value="<?php echo $row['kalurahan']; ?>"><br><br>

        <label for="kapanewon">Kapanewon:</label><br>
        <input type="text" id="kapanewon" name="kapanewon" value="<?php echo $row['kapanewon']; ?>"><br><br>

        <label for="lat">Latitude:</label><br>
        <input type="text" id="lat" name="latitude" value="<?php echo $row['latitude']; ?>"><br><br>

        <label for="long">Longitude:</label><br>
        <input type="text" id="long" name="longitude" value="<?php echo $row['longitude']; ?>"><br><br>

        <label for="praktik">Praktik:</label><br>
        <input type="text" id="praktik" name="praktik" value="<?php echo $row['praktik']; ?>"><br><br>

        <input type="submit" value="Update Data">
    </form>
    <?php
} else {
    echo "Data tidak ditemukan.";
}
$stmt->close();
$conn->close();
?>

</body>
</html>