<?php

// untuk menyimpan kumpulan data yang sejenis
// aturan penamaan = plural (jamak)
$numbers = [1, 2, 3, 4, 5];

// 1. indexed array
$numbers = [1, 2, 3, 4, 5];
$names = ['Bagas', 'Denda', 'Herwin'];
// $names[0] => 'Bagas'
// $names[1] => 'Denda'
// ...
print_r($names);

// 2. associative array
$person = [
  'name' => 'Bagas',
  'age' => 30,
  'city' => 'Semarang'
];
// $person['name'] => 'Bagas'
// ...

// reassignment
$person['age'] = 31;
// add new element
$person['children'] = 4;

print_r($person);

// add new element
$numbers[] = 99;
// re-assignment
$numbers[1] = 100;
print_r($numbers);
