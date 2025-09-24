<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Variabel a: {$a} <br>";
echo "Variabel b: {$b} <br>";
echo "<br><br>";
echo "Hasil Tambah: {$hasilTambah} <br>";
echo "Hasil Kurang: {$hasilKurang} <br>";
echo "Hasil Kali: {$hasilKali} <br>";
echo "Hasil Bagi: {$hasilBagi} <br>";
echo "Sisa Bagi: {$sisaBagi} <br>";
echo "Pangkat: {$pangkat} <br>";

echo "<br><br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "Variabel a: {$a} <br>";
echo "Variabel b: {$b} <br>";
echo "Apakah a sama dengan b? : " . ($hasilSama ? 'true' : 'false') . "<br>";
echo "Apakah a tidak sama dengan b? : " . ($hasilTidakSama ? 'true' : 'false') . "<br>";
echo "Apakah a lebih kecil dari b? : " . ($hasilLebihKecil ? 'true' : 'false') . "<br>";
echo "Apakah a lebih besar dari b? : " . ($hasilLebihBesar ? 'true' : 'false') . "<br>";
echo "Apakah a lebih kecil atau sama dengan b? : " . ($hasilLebihKecilSama ? 'true' : 'false') . "<br>";
echo "Apakah a lebih besar atau sama dengan b? : " . ($hasilLebihBesarSama ? 'true' : 'false') . "<br>";

echo "<br><br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "Variabel a: {$a} <br>";
echo "Variabel b: {$b} <br><br>";

echo "Hasil a AND b : " . ($hasilAnd ? 'true' : 'false') . "<br>";
echo "Hasil a OR b : " . ($hasilOr ? 'true' : 'false') . "<br>";
echo "Hasil NOT a : " . ($hasilNotA ? 'true' : 'false') . "<br>";
echo "Hasil NOT b : " . ($hasilNotB ? 'true' : 'false') . "<br>";

echo "<br><br>";

$a = 10;
$b = 5;

echo "Variabel awal a: {$a} <br>";
echo "Variabel b: {$b} <br><br>";

$a += $b;
echo "Hasil dari \$a += \$b adalah: {$a} <br>";

$a -= $b;
echo "Hasil dari \$a -= \$b adalah: {$a} <br>";

$a *= $b;
echo "Hasil dari \$a *= \$b adalah: {$a} <br>";

$a /= $b;
echo "Hasil dari \$a /= \$b adalah: {$a} <br>";

$a %= $b;
echo "Hasil dari \$a %= \$b adalah: {$a} <br>";

echo "<br><br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "Variabel a: {$a} <br>";
echo "Variabel b: {$b} <br><br>";

echo "Hasil dari \$a === \$b adalah: " . ($hasilIdentik ? "true" : "false") . "<br>";
echo "Hasil dari \$a !== \$b adalah: " . ($hasilTidakIdentik ? "true" : "false") . "<br>";

echo "<br><br>";

$totalKursi = 45;
$kursiTerpakai = 28;

$kursiKosong = $totalKursi - $kursiTerpakai;
$persenKosong = ($kursiKosong / $totalKursi) * 100;

echo "Total kursi: {$totalKursi} <br>";
echo "Kursi terpakai: {$kursiTerpakai} <br>";
echo "Kursi kosong: {$kursiKosong} <br>";
echo "Persentase kursi kosong: {$persenKosong}% <br>";
?>
