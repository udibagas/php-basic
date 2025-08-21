<?php

// Polymorphism: means that objects of different classes can be treated as objects of a common superclass. 
// In PHP, this can be achieved through method overriding and interfaces.

// - method overriding: a child class can provide a specific implementation of a method that is already defined in its parent class.
// - interface: allows different classes to implement the same set of methods, enabling polymorphic behavior.

interface CanWalk
{
  public function walk();
}

class Animal
{
  function __construct(public string $type, public string $name, public int $totalLegs) {}

  function makeSound()
  {
    echo "Suara hewan";
  }
}

// inheritance
class Mammal extends Animal implements CanWalk
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

  function walk()
  {
    echo "Jalan pakai 4 kaki";
  }
}

class Puoltry extends Animal implements CanWalk
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

  function swim()
  {
    echo "Blebek blebek";
  }

  function walk()
  {
    echo "Jalan pakai 2 kaki";
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
