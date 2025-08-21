<?php

$person = [
  'name' => 'Bagas',
  'age' => 30,
  'city' => 'Semarang'
];

// $person = new stdClass();
// // assign property
// $person->name = "Bagas";
// $person->age = 30;
// $person->city = "Semarang";

$person = (object) $person;
echo $person->name;

// print_r($person);
