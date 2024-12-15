<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['music_file'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["music_file"]["name"]);
    $uploadOk = 1;
    $audioFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Tekshirish: fayl audio fayl ekanligini tekshirish
    if ($audioFileType != "mp3" && $audioFileType != "wav" && $audioFileType != "flac") {
        echo "Kechirasiz, faqat MP3, WAV yoki FLAC formatidagi fayllarni yuklashingiz mumkin.";
        $uploadOk = 0;
    }

    // Faylni yuklash
    if ($uploadOk == 0) {
        echo "Fayl yuklanmadi.";
    } else {
        if (move_uploaded_file($_FILES["music_file"]["tmp_name"], $target_file)) {
            echo "Fayl ". htmlspecialchars(basename($_FILES["music_file"]["name"])) . " muvaffaqiyatli yuklandi.";
        } else {
            echo "Faylni yuklashda xatolik yuz berdi.";
        }
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    Musiqa faylini tanlang:
    <input type="file" name="music_file" id="music_file">
    <input type="submit" value="Yuklash" name="submit">
</form>
