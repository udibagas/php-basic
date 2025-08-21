<?php

$person = new stdClass();

// // property
// $person->name = "Bagas";
// $person->gender = "Male";
// $person->age = 17;

$arr = [
  'name' => "Bagas",
  "gender" => "Male",
  "age" => 17
];


print_r($person);

// aturan penamaan class
// 1. PascalCase
// 2. English
// 3. Singular (Tunggal)


class Person
{
  // properties
  public string $name;
  public string $gender;
  public int $age;
  public string $city;

  // fungsi yang otomatis dipanggil pada saat proses instantiation (pembuatan object)
  function __construct(string $name, string $gender, int $age, string $city = 'Jakarta')
  {
    // $this = mengacu ke object yg dibuat ($person, $person1)
    $this->name = $name;
    $this->gender = $gender;
    $this->age = $age;
    $this->city = $city;
  }

  // method/function
  public function eat(string $food = 'gorengan')
  {
    echo "Nyum nyum.. Saya makan " . $food;
  }

  public function intro()
  {
    echo "\nNama = " . $this->name;
    echo "\nGender = " . $this->gender;
    echo "\nAge = " . $this->age;
    echo "\nCity = " . $this->city;
  }
}

// instantiation => (object) instance
$person = new Person("Bagas", "Male", 17, "Semarang");
// $person->gender = "Male";
// $person->age = 17;
// tidak boleh membuat dynamic property
// $person->isMarried = true;

$person1 = new Person("Putri", "Female", 15);
// $person1->gender = "Female";
// $person1->age = 15;

$people = [$person, $person1];

// print_r($people);

foreach ($people as $p) {
  echo "\nNama = " . $p->name;
  echo "\nGender = " . $p->gender;
  echo "\nAge = " . $p->age;
  echo "\nCity = " . $p->city;
  echo "\n---------------";
}

class User
{
  // property promotion
  function __construct(public string $name, public string $email, public string $password) {}
}

$user = new User('User1', 'user@mail.com', 'rahasia');
print_r($user);

$person->intro();
