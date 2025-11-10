<?php
$targetDirectory = "images/"; // folder penyimpanan gambar

// Cek apakah folder "images" sudah ada, kalau belum buat
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

$allowedExtensions = array("jpg", "jpeg", "png", "gif");

if (!empty($_FILES['files']['name'][0])) {
    $totalFiles = count($_FILES['files']['name']);

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $targetFile = $targetDirectory . basename($fileName);
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Validasi tipe file
        if (in_array($fileType, $allowedExtensions)) {
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
                echo "Gambar " . htmlspecialchars($fileName) . " berhasil diunggah.<br>";
            } else {
                echo "Gagal mengunggah gambar " . htmlspecialchars($fileName) . ".<br>";
            }
        } else {
            echo "File " . htmlspecialchars($fileName) . " bukan gambar yang valid.<br>";
        }
    }
} else {
    echo "Tidak ada gambar yang diunggah.";
}
?>