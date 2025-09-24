<?php
$jumlahRak = 120;
$rakTerisi = 85;

$rakKosong = $jumlahRak - $rakTerisi;
$persenKosong = ($rakKosong / $jumlahRak) * 100;

echo "Jumlah rak buku di perpustakaan: $jumlahRak <br>";
echo "Jumlah rak terisi: $rakTerisi <br>";
echo "Jumlah rak kosong: $rakKosong <br>";
echo "Persentase rak kosong: " . round($persenKosong, 2) . "%";
?>