<?php
// Konfigurasi koneksi ke PostgreSQL
$host = "localhost";
$port = "5432";
$dbname = "prakwebdb";
$user = "postgres";
$password = "(snta098)";

// Membuat koneksi
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Mengecek koneksi
if (!$conn) {
    die ("Koneksi ke database gagal." . pg_last_error());
} else {
    echo "Koneksi ke database berhasil!";
}
?>