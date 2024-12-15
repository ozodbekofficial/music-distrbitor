<?php
// MySQL ulanish
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Musiqa ma'lumotlarini olish
$sql = "SELECT * FROM music";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Musiqalarni ro'yxatga olish
    while($row = $result->fetch_assoc()) {
        echo "Nom: " . $row["title"]. " - San'atkor: " . $row["artist"]. "<br>";
        echo '<audio controls><source src="' . $row["file_path"] . '" type="audio/mp3"></audio><br>';
    }
} else {
    echo "Hech qanday musiqalar topilmadi";
}
$conn->close();
?>
