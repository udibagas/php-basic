<?php

$hari = 'senin';

$seragam = match ($hari) {
  'senin' => 'PDH',
  'selasa' => 'Casual',
  // ....
  default => 'Libur'
};


echo $seragam;
