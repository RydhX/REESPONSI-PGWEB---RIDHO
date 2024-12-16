<?php
header('Content-Type: application/json');

// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "wisatabali_db";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data
$sql = "SELECT nama, deskripsi, latitude, longitude FROM pariwisata";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Mengirim data sebagai JSON
echo json_encode($data);

$conn->close();
?>
