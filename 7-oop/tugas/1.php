<?php

class Laptop
{
  public function __construct(
    private int $price,
    private string $merk,
    private int $storage,
    private string $display,
    private int $ram,
    public bool $isTouchScreen = false,
    public string $owner = 'Pribadi'
  ) {}

  public function showDetail()
  {
    echo
    "Merk: $this->merk \nPrice: $this->price \nStorage: {$this->storage}GB \nDisplay: $this->display \nRAM: {$this->ram}GB";
  }

  // public function layar()
  // {
  //   echo "Sudah Touchscreen";
  // }

  // public function status()
  // {
  //   echo "Bagus Tapi Punya Kantor";
  // }

  public function getPrice()
  {
    return "Rp. " + $this->price;
  }

  public function turnOn()
  {
    echo "Nyala";
  }

  public function turnOff()
  {
    echo "Mati";
  }

  public function __get($name)
  {
    if ($name == "price") {
      return $this->getPrice();
    }

    if (property_exists($this, $name)) {
      return $this->$name;
    }

    return null;
  }
}

$laptop = new Laptop(10000000, "Asus", 512, "15.6 inch", 16);

echo "Harga : Rp." . $laptop->price . "\n";
echo "Merk :" . $laptop->merk . "\n";
echo "Penyimpanan :" . $laptop->storage . "\n";
echo "Display :" . $laptop->display . "\n";
echo "RAM :" . $laptop->ram . "\n";

// echo $laptop->getPrice();
// echo "\n";
// echo $laptop->Detail();
// echo "\n";
// echo $laptop->layar();
echo "\n";
// echo $laptop->status();
