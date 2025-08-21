<?php

// Abstraction: means hiding the complex implementation details and showing only the essential features of an object. 
// In PHP, this can be achieved using abstract classes and interfaces.

// - abstract class: a class that cannot be instantiated and may contain abstract methods (methods without implementation) that must be implemented by subclasses.
// - interface: a contract that defines methods that must be implemented by any class that implements the interface.

interface CanWalk
{
  public function walk();
}

trait Walkable
{
  public function walk()
  {
    echo "Jalan";
  }
}

trait HasAddress
{
  public $address;
}

abstract class Animal
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
  use Walkable;

  // polymorhpism overiding
  function __construct(string $name, int $totalLegs = 4)
  {
    parent::__construct('Mammal', $name, $totalLegs);
  }

  // function makeSound()
  // {
  //   echo "Suara mamalia";
  // }
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

class Person
{
  use Walkable, HasAddress;

  function __construct(public string $name) {}
}

$animal = new Mammal('Singa', 4);
print_r($animal);

class Customer
{
  use Walkable, HasAddress;
}

$p = new Person('Bagas');

$p->walk();

print_r(new Customer());
