<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = pg_query($conn, $query);

if (!$result) {
    die("Query error: " . pg_last_error($conn));
}

$row = pg_fetch_assoc($result);

if ($row) {
    if ($row['level'] == 1) {
        echo "Anda berhasil login. silahkan menuju "; ?>
        <a href="homeAdmin.html">Halaman HOME</a>
    <?php
    } else if ($row['level'] == 2) {
        echo "Anda berhasil login. silahkan menuju "; ?>
        <a href="homeGuest.html">Halaman HOME</a>
    <?php
    } else {
        echo "Level pengguna tidak dikenali.";
    }
} else {
    echo "Anda gagal login. silahkan "; ?>
    <a href="loginForm.html">Login kembali</a>
<?php
    echo pg_last_error($conn);
}

pg_close($conn);
?>
