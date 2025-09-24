<?php
$harga_jaket = 250000;
$diskon = 0.15; //15%

// cek apakah harga lebih dari 200k
if ($harga_jaket > 200000) {
    $harga_bayar = $harga_jaket * (1 - $diskon);
} else {
    $harga_bayar = $harga_jaket;
}

echo "Harga jaket: Rp " . number_format($harga_jaket, 0, ",", ".") . "<br>";
echo "Diskon: 15%<br>";
echo "Jumlah uang yang harus dibayar: Rp " . number_format($harga_bayar, 0, ",", ".");
?>