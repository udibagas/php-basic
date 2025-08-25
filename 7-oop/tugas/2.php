<?php

class Tumbler
{
  public float $volume;

  function __construct(
    public string $color,
    public float $capacity,
    public string $material,
    public string $height,
    public string $brand,
    private Owner $owner
  ) {
    $this->volume = 0;
  }

  public function getOwner()
  {
    return $this->owner;
  }

  public function fillFull()
  {
    $this->volume = $this->capacity;
  }

  public function fill(float $v)
  {
    if ($v > $this->capacity) {
      throw new Exception("Luber bos");
    }

    $this->volume = $v;
  }

  public function wash()
  {
    $this->volume = 0;
    echo "Cuci cuci";
    // dst
  }
}

class Owner
{
  public function __construct(public string $name, public string $phoneNumber) {}
}

$owner = new Owner('Wawan', '+62867887687');
$tumbler = new Tumbler('Black', 500, 'Stainless Steel', '15cm', 'Hactiv8', $owner);
print_r($tumbler);
print_r($tumbler->getOwner());
