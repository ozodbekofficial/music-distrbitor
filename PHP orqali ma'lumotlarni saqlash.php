<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "music_store";

// MySQL ulanish
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fayl va musiqani saqlash
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $file_path = "uploads/" . basename($_FILES['music_file']['name']);
    
    // Musiqani ma'lumotlar bazasiga qo'shish
    $sql = "INSERT INTO music (title, artist, file_path, genre, price)
            VALUES ('$title', '$artist', '$file_path', '$genre', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Musiqa muvaffaqiyatli qo'shildi";
    } else {
        echo "Xatolik: " . $sql . "<br>" . $conn->error;
    }

    // Faylni yuklash
    move_uploaded_file($_FILES['music_file']['tmp_name'], $file_path);
}

$conn->close();
?>

<form action="" method="post" enctype="multipart/form-data">
    Musiqa nomi: <input type="text" name="title" required><br>
    San'atkor: <input type="text" name="artist" required><br>
    Janr: <input type="text" name="genre"><br>
    Narx: <input type="text" name="price" required><br>
    Musiqa faylini tanlang: <input type="file" name="music_file" required><br>
    <input type="submit" value="Musiqani qo'shish">
</form>
