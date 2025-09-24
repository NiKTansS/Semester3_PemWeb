<?php
$nilai = [80, 95, 67, 72, 88, 91, 76, 84, 69, 93, 78, 85];

sort($nilai);

// Hapus 2 nilai terendah
array_shift($nilai);
array_shift($nilai);

// Hapus 2 nilai tertinggi
array_pop($nilai);
array_pop($nilai);

$total_nilai = array_sum($nilai);

echo "Daftar nilai setelah mengabaikan dua nilai tertinggi dan dua nilai terendah:<br>";
echo implode(", ", $nilai) . "<br>";
echo "Total nilai setelah mengabaikan 2 nilai tertinggi dan 2 nilai terendah: $total_nilai";
?>