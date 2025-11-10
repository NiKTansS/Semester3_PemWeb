<?php
header('Content-Type: application/json'); // Mengatur tipe respons sebagai JSON

// Periksa apakah session sudah dimulai (biasanya auth.php sudah memulai)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Memeriksa token CSRF
if (empty($_SESSION['csrf_token'])) {
    // Jika tidak ada token di session server
    exit(json_encode(['error' => 'No CSRF token found in session.']));
}

$headers = apache_request_headers(); // Mendapatkan semua header dari request AJAX

if (isset($headers['Csrf-Token'])) { // Periksa apakah header 'Csrf-Token' dikirim oleh AJAX
    if ($headers['Csrf-Token'] !== $_SESSION['csrf_token']) {
        // Jika token yang dikirim tidak cocok dengan token di session
        exit(json_encode(['error' => 'Wrong CSRF token.']));
    }
} else {
    // Jika header 'Csrf-Token' tidak dikirim sama sekali oleh AJAX
    exit(json_encode(['error' => 'No CSRF token provided in request headers.']));
}

// Jika semua pemeriksaan lolos, skrip yang memanggil include 'csrf.php' akan melanjutkan eksekusinya.
?>