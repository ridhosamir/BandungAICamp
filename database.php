<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ai_myfirstproject";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "Koneksi berhasil<br>";

// Menjalankan query
$sql = "SELECT id, nama, email FROM users";
$result = $conn->query($sql);

if ($result === false) {
    echo "Error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["nama"]. " - Email: " . $row["email"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}

// Menutup koneksi
$conn->close();
?>
