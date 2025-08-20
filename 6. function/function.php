<?php

// syntax
// function namaFungsi(...params) {
//   // body function (logic)
//   return $hasil;
// }

function hello()
{
  echo "Hello World!";
}

// hello();

// fungsi dengan parameter
function hello1($name)
{
  echo "Hello $name!";
}

// hello1('Budi');

// fungsi dengan default parameter
function hello2($name = 'World')
{
  echo "Hello $name!";
}

// hello2();
// hello2('Agus');

// fungsi dengan return
function add($a, $b)
{
  $hasil = $a + $b;
  return $hasil;
}

$x = add(10, 30); // 40
// echo $x;

// fungsi dengan typed parameter & return
function add1(int $a, int $b): int
{
  return $a + $b;
}

$x = add1(10, 30); // 40
// echo $x;

function subtract(int $a, int $b): int
{
  return $a - $b;
}

// named argument
$x = subtract(b: 80, a: 70);
echo $x;


function kali10(int $number): int
{
  return $number * 10;
}

// call another function
function addThenKali10($a, $b)
{
  $x = $a + $b;
  $x = kali10($x);
  return $x;
}

$x = addThenKali10(2, 3);
// echo $x;

// 5! = 5 x 4 x 3 x 2 x 1 = 5 x 4!

// recursive
function factorial($number)
{
  if ($number == 1) {
    return 1;
  }

  $hasil = $number * factorial($number - 1);
  return $hasil;
}

$hasil = factorial(5);
echo "Hasilnya adalah " . $hasil;
