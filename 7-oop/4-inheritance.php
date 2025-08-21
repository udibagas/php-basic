<?php

// Inheritance :  means that a class can inherit properties and methods from another class, 
// allowing for code reuse and the creation of a hierarchy of classes. In PHP, this is done using the `extends` keyword.
// - parent class: the class being inherited from
// - child class: the class that inherits from the parent class

class Animal
{
  function __construct(public string $type, public string $name, public int $totalLegs) {}

  function makeSound()
  {
    echo "Suara hewan";
  }
}

//inheritance
class Mammal extends Animal
{
  // polymorhpism overiding
  function __construct(string $name, int $totalLegs = 4)
  {
    parent::__construct('Mammal', $name, $totalLegs);
  }

  function makeSound()
  {
    echo "Suara mamalia";
  }
}

class Puoltry extends Animal
{
  public $wings;
  public $color;

  // polymorhpism overiding
  function __construct(string $name)
  {
    parent::__construct('Poultry', $name, 2);
  }

  function makeSound()
  {
    echo "Cuit cuit";
  }

  function fly()
  {
    echo "terbang...";
  }
}

class Bebek extends Puoltry {}

$kambing = new Mammal('kambing');
$burung = new Puoltry('burung');
$paus = new Mammal('Paus', 0);
$bebek = new Bebek('donald');

print_r($kambing);
print_r($burung);
print_r($paus);
print_r($bebek);

$burung->makeSound();
echo  "\n";
$kambing->makeSound();
echo  "\n";

$burung->fly();
