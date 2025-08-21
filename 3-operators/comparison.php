<?php

// membandingkan value (nilai) tanpa melihat tipe data
$a = 1 == 1; // true
echo $a . "\n";
// membandingkan value (nilai) dengan melihat tipe data
$a = 1 === 1.0; // false
echo $a . "\n";

$a = 4 < 10; // true
$a = 4 <= 3; // false
$a = 6 > 4; // true
$a = 6 >= 6; // true
$a = 6 != 7; // true
$a = 6 !== 6.0; // true 
