<?php

$wajah = 'cantik';
$ekonomi = 'kaya';

// and
$masukKriteria = $wajah == 'cantik' && $ekonomi == 'kaya';
echo $masukKriteria . "\n";

// or
$masukKriteria = $wajah == 'cantik' || $ekonomi == 'kaya';
echo $masukKriteria . "\n";

// not
$masukKriteria = $wajah != 'jelek' || $ekonomi != 'susah';
echo $masukKriteria . "\n";
