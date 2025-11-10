<?php
session_start();
include 'koneksi.php'; 
include 'csrf.php'; 

header('Content-Type: application/json');

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0; 

if ($id > 0) {
    $query = "SELECT * FROM anggota WHERE id = $1";
    $sql = pg_query_params($dbconn, $query, array($id));

    if ($sql) {
        $row = pg_fetch_assoc($sql);
        if ($row) {
            echo json_encode($row);
        } else {
            echo json_encode(['error' => 'Data tidak ditemukan.']);
        }
    } else {
        echo json_encode(['error' => 'Query gagal: ' . pg_last_error($dbconn)]);
    }
} else {
    echo json_encode(['error' => 'ID tidak valid.']);
}

pg_close($dbconn);
?>