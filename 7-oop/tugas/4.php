<?php

interface IElectronic
{
  public function turnOn();

  public function turnOff();
}

trait HasScreen
{
  public float | int $screenSize;
  public string $resolution;
  public string $material;
  public bool $isTouchScreen = false;
}

abstract class Electronic implements IElectronic
{

  public function __construct(public string $brand, private int | float $price, public string $type) {}

  public function turnOn()
  {
    echo "Nyala";
  }

  public function turnOff()
  {
    echo "Mati";
  }
}

class Television extends Electronic
{
  use HasScreen;

  public int $size;
  public string $color;

  public function __construct($brand,  $size,  $color,  $resolution,  $price)
  {
    parent::__construct($brand, $price, "Television");
    $this->size = $size;
    $this->color = $color;
    $this->resolution = $resolution;
  }

  public function turnOn()
  {
    echo "oke sudah menyala";
  }

  public function turnOff()
  {
    echo "oke sudah mati";
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function __get($name)
  {
    if (property_exists($this, $name)) {
      return $this->$name;
    }
    return null;
  }

  public function __set($name, $value)
  {
    if (property_exists($this, $name)) {
      $this->$name = $value;
    }
    return $this;
  }
}

class Notebook extends Electronic
{
  use HasScreen;

  function __construct(
    string $brand,
    public string $model,
    public string $processor,
    public string $ram,
    public string $storage,
    public string $graphics,
    float $price
  ) {
    parent::__construct($brand, $price, 'Notebook');
  }

  function shut(string $message)
  {
    return "Shutting down the notebook: " . $message;
  }
}

$Television = new Television("Samsung", "55 inch", "Black", "4K", 1500);

echo "Brand: " . $Television->brand . "\n";
echo "Size: " . $Television->size . "\n";
echo "Color: " . $Television->color . "\n";
echo "Resolution: " . $Television->resolution . "\n";
echo "Price: $" . $Television->price . "\n";


$Television->turnOn();
echo "\n";
$Television->turnOff();
echo "\n";

// Example of using __get and __set
$Television->price = 9800;
echo "Updated Price: " . $Television->price . "\n";
