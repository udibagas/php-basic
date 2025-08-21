<?php

$hari = 'sabtu';
$seragam = '';

switch ($hari) {
  case "senin":
    $seragam = 'PDH';
    break;

  case "selasa":
    $seragam = 'Casual';
    break;

  case "rabu":
    $seragam = 'Putih';
    break;

  case "kamis":
    $seragam = 'Pangsi';
    break;

  case "jumat":
    $seragam = 'Batik';
    break;

  default:
    $seragam = "Libur";
}

echo $seragam;
