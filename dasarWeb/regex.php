<?php
$pattern = '/[a-z]/'; // Cocokkan huruf kecil.
$text = 'This is a Sample Text.';

if (preg_match($pattern, $text)) {
  echo "Huruf kecil ditemukan!<br>";
} else {
  echo "Tidak ada huruf kecil!<br>";
}

$pattern = '/[0-9]+/'; // Cocokkan satu atau lebih digit.
$text = 'There are 123 apples.';

if (preg_match($pattern, $text, $matches)) {
  echo "Cocokkan: " . $matches[0] ;
} else {
  echo "Tidak ada yang cocok!<br>";
}

$pattern = '/apple/';
$replacement = 'banana';
$text = '<br>I like apple pie.<br>';

$new_text = preg_replace($pattern, $replacement, $text);
echo $new_text; // Output: "I like banana pie."

$pattern = '/go{1,3}d/'; // "o" muncul minimal 1 kali dan maksimal 3 kali.
$tests = ['gd', 'god', 'good', 'goood', 'goooood'];

foreach ($tests as $text) {
  if (preg_match($pattern, $text, $matches)) {
    echo $text . " => Cocokkan: " . $matches[0] . "<br>";
  } else {
    echo $text . " => Tidak cocok<br>";
  }
}
?>