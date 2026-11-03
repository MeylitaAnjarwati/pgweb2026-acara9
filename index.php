<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faskes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil seluruh data faskes
$sql = "SELECT * FROM `sebaram faskes sleman`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Sebaran Faskes </title>
</head>
<body>

<h2>Data Sebaran Faskes </h2>

<p>
    <a href="input/index.html">Input Data Faskes</a>
</p>

<?php
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr>
        <th>ID</th>
        <th>Kalurahan</th>
        <th>Kapanewon</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Praktik</th>
        <th colspan='2'>Aksi</th>
      </tr>";

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["kalurahan"]."</td>
                <td>".$row["kapanewon"]."</td>
                <td>".$row["latitude"]."</td>
                <td>".$row["longitude"]."</td>
                <td>".$row["praktik"]."</td>
                <td><a href='delete.php?id=".$row["id"]."' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>hapus</a></td>
                <td><a href='edit/index.php?id=".$row["id"]."'>edit</a></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8'>Belum ada data.</td></tr>";
}

echo "</table>";

$conn->close();
?>

</body>
</html>