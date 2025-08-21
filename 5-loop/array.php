<?php

$numbers = [1, 2, 3, 4, 5, 6];

// for ($i = 0; $i < count($numbers); $i++) {
//   echo $numbers[$i] . "\n";
// }

foreach ($numbers as $number) {
  echo $number . "\n";
}

$person = [
  'name' => 'Bagas',
  'age' => 30,
  'city' => 'Semarang'
];

foreach ($person as $key => $value) {
  echo $key . " = " . $value . "\n";
}
