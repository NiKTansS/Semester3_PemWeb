<?php
$siswa = [
  ["Andi", 75],
  ["Budi", 88],
  ["Citra", 95],
  ["Dinda", 70],
  ["Farhan", 82]
];

//menghitung nilai total
$totalNilai = 0;
$jumlahSiswa = count($siswa);

for ($i = 0; $i < $jumlahSiswa; $i++) {
    $totalNilai += $siswa[$i][1]; 
}

//menghitung rata rata
$rataRata = $totalNilai / $jumlahSiswa;
echo "Rata-rata nilai kelas: $rataRata <br><br>";

//menanampilkan siswa dengan nilai diatas rata rata
echo "Siswa dengan nilai di atas rata-rata: <br>";
for ($i = 0; $i < $jumlahSiswa; $i++) {
  if ($siswa[$i][1] > $rataRata) {
    echo $siswa[$i][0] . " : " . $siswa[$i][1] . "<br>";
  }
}
?>