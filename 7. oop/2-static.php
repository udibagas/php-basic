<?php


class Math
{
  const PI = 3.14; // constant

  static $pi = 3.14; // static property

  // fungsi yang dipanngil dari class (tidak perlu instantiation)
  static function abs($number)
  {
    return abs($number);
  }

  static function min(...$number)
  {
    return min(...$number);
  }

  static function getCircleArea(int | float $radius)
  {
    return self::PI * $radius * $radius;
  }

  // tambahkan funsi statis yg lain
}


// $x = abs(-10);
$x = Math::abs(-10);
echo $x;
echo "\n";
$min = Math::min(1, 2, -10, 4, 9);
echo $min;
echo "\n";

// echo Math::PI;
// echo Math::$pi;

echo Math::getCircleArea(7);
