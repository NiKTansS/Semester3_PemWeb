<?php
session_start();
include 'koneksi.php'; 
include 'csrf.php'; 

$nama = isset($_POST['nama']) ? pg_escape_string($dbconn, $_POST['nama']) : '';
$jenis_kelamin = isset($_POST['jenis_kelamin']) ? pg_escape_string($dbconn, $_POST['jenis_kelamin']) : '';
$alamat = isset($_POST['alamat']) ? pg_escape_string($dbconn, $_POST['alamat']) : '';
$no_telp = isset($_POST['no_telp']) ? pg_escape_string($dbconn, $_POST['no_telp']) : '';
$id = isset($_POST['id']) ? pg_escape_string($dbconn, $_POST['id']) : ''; 

if ($id == "") {
    $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES ($1, $2, $3, $4)";
    $params = array($nama, $jenis_kelamin, $alamat, $no_telp);
    $action_message = "menyimpan";

} else {
    $query = "UPDATE anggota SET nama = $1, jenis_kelamin = $2, alamat = $3, no_telp = $4 WHERE id = $5";
    $params = array($nama, $jenis_kelamin, $alamat, $no_telp, $id); // Tambahkan $id sebagai parameter kelima
    $action_message = "mengupdate";
}

$sql = pg_query_params($dbconn, $query, $params);

if ($sql) {
    echo json_encode(['status' => 'success', 'message' => 'Sukses']); // Pesan sukses
} else {
    echo json_encode(['status' => 'error', 'message' => "Gagal $action_message data: " . pg_last_error($dbconn)]);
}

pg_close($dbconn);
?>