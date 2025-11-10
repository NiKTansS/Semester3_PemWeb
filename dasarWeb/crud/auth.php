<?php
//Membuat Token Keamanan Ajax Request (Csrf Token)
session_start(); // <-- Pastikan ada titik koma di sini
if (empty($_SESSION['csrf_token'])) { // Baris 4
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>