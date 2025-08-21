<?php

// anonymous function
// $fn = function () {
//   return "Anon";
// };

$fn = fn() =>  "Anon";

// echo $fn();

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];

// contoh imple,entasi closure
// $genap = array_filter($numbers, function ($number) {
//   return $number % 2 == 0;
// });

$genap = array_filter($numbers, fn($number) => $number % 2 == 0);

var_dump($genap);

// console.log()
// arr.push
// str.split()
// number.toLocaleString()
// Array.isArray()
// Date.now()
// Math.random()
