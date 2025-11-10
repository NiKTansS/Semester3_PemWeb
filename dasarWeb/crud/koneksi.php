<?php
$host = "localhost";
$port = "5432"; 
$dbname = "prakwebdb";
$user = "postgres";
$password = "(snta098)"; 

$conn_str = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";

$dbconn = pg_connect($conn_str);

if (!$dbconn) {
    die("Koneksi ke database gagal: " . pg_last_error());
}
?>