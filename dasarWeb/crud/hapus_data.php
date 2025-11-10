<?php
session_start();
include 'koneksi.php';
include 'csrf.php'; 

header('Content-Type: application/json'); 

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0; 

if ($id > 0) {
    $query = "DELETE FROM anggota WHERE id = $1";
    $sql = pg_query_params($dbconn, $query, array($id));

    if ($sql) {
        echo json_encode(['status' => 'success', 'message' => 'Sukses']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Query gagal: ' . pg_last_error($dbconn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID tidak valid.']);
}

pg_close($dbconn);
?>