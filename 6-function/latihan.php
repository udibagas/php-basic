<?php


function getGradeByScore(int | float $score): string
{
  // validation
  if ($score < 0 || $score > 100) {
    throw new Exception("Nilai tidak valid");
  }

  if ($score >= 85) return "A";
  if ($score >= 75) return "B";
  if ($score >= 60) return "C";
  if ($score >= 50) return "D";
  return "E";
}

$hasil1 = getGradeByScore(87);
echo "Hasil1 : " . $hasil1;
$hasil2 = getGradeByScore(75);
echo "\nHasil2 : " . $hasil2;
$hasil3 = getGradeByScore(67);
echo "\nHasil3 : " . $hasil3;
$hasil4 = getGradeByScore(54);
echo "\nHasil4 : " . $hasil4;
$hasil5 = getGradeByScore(201);
echo "\nHasil5 : " . $hasil5;
