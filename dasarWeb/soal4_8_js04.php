<?php
//data jarak tempuh atlet per hari
$jarak_harian = [1, 5, 10, 8, 14, 2, 1, 9]; 

//hitung total
$total_jarak = array_sum($jarak_harian);

$bonus = ($total_jarak > 100) ? "YA" : "TIDAK";

echo "Total jarak tempuh atlet adalah: $total_jarak km<br>";
echo "Apakah atlet mendapatkan bonus latihan? $bonus";
?>