<?php
include('koneksi.php');

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : ''; // Ambil aksi, cegah error jika tidak ada

// Inisialisasi variabel POST untuk mencegah error jika aksi bukan 'tambah'/'ubah'
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
$no_telp = isset($_POST['no_telp']) ? $_POST['no_telp'] : '';

if ($aksi == 'tambah') {
    // ... (kode INSERT) ...
    $query = 'INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES ($1, $2, $3, $4)';
    $result = pg_query_params($dbconn, $query, array($nama, $jenis_kelamin, $alamat, $no_telp));
    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menambahkan data: " . pg_last_error($dbconn);
    }

} elseif ($aksi == 'ubah') {
    // ... (kode UPDATE) ...
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = 'UPDATE anggota SET nama = $1, jenis_kelamin = $2, alamat = $3, no_telp = $4 WHERE id = $5';
        $result = pg_query_params($dbconn, $query, array($nama, $jenis_kelamin, $alamat, $no_telp, $id));
        if ($result) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal mengupdate data: " . pg_last_error($dbconn);
        }
    } else {
        echo "ID tidak valid.";
    }

} elseif ($aksi == 'hapus') { // === AWAL BLOK DELETE ===
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Menggunakan parameterized query
        $query = 'DELETE FROM anggota WHERE id = $1';
        $result = pg_query_params($dbconn, $query, array($id));

        if ($result) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal menghapus data: " . pg_last_error($dbconn);
        }
    } else {
        echo "ID tidak valid.";
    }
    // === AKHIR BLOK DELETE ===
} else {
    // Jika aksi tidak dikenali, redirect ke index
    header("Location: index.php");
}

pg_close($dbconn);
?>