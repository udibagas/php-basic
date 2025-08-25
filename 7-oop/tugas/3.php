<?php

class Notebook
{
  function __construct(
    public string $brand,
    public string $model,
    public string $processor,
    public string $ram,
    public string $storage,
    public string $graphics,
    public float $price
  ) {}

  function shut(string $message): string
  {
    return "Shutting down the notebook: " . $message;
  }
}

$notebook = new Notebook("Asus", "ROG Zephyrus", "AMD Ryzen 9", "32GB", "1TB SSD", "NVIDIA RTX 3080", 25000000);
$notebook1 = new Notebook("Dell", "XPS 15", "Intel Core i7", "16GB", "512GB SSD", "NVIDIA GTX 1650", 35000000);

foreach ([$notebook, $notebook1] as $item) {
  echo "Brand: " . $item->brand . "\n";
  echo "Model: " . $item->model . "\n";
  echo "Processor: " . $item->processor . "\n";
  echo "RAM: " . $item->ram . "\n";
  echo "Storage: " . $item->storage . "\n";
  echo "Graphics: " . $item->graphics . "\n";
  echo "Price: Rp " . $item->price . "\n\n";
}

echo $notebook->shut("See you soon!") . "\n";
