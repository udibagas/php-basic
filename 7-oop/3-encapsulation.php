<?php

// Encapsulation : means that the properties and methods of a class are bundled together, 
// and access to them can be controlled using visibility keywords (public, private, protected).

class User
{
  function __construct(public string $name, public string $email, private string $password) {}

  private function rahasia()
  {
    echo "Ini rahasia";
  }

  public function getPassword()
  {
    return $this->password;
  }

  // digunkanan untuk mengakses property (getter/accessor)
  public function __get($name)
  {
    if ($name == 'password') {
      return "******";
    }

    if (property_exists($this, $name)) {
      return $this->$name;
    }

    return null;
  }

  function setPasssword(string $newPassword)
  {
    if (strlen($newPassword) < 8) {
      throw new Exception("Password harus lebih dari atau sama dengan 8 karakter");
    }

    $this->password = $newPassword;
  }

  // fungsi yang digunakan untuk memberikan nilai pada property (setter/mutator)
  function __set($name, $value)
  {
    if ($name == 'password') {
      if (strlen($value) < 8) {
        throw new Exception("Password harus lebih dari atau sama dengan 8 karakter");
      }

      $this->password = md5($value);
      return;
    }

    $this->$name = $value;
  }

  // string representation of the object
  function __toString()
  {
    // json_encode = mengubah object / array menjadi json string (JSON.stringify)
    // json_decode = mengubah json string menjadi object/array (JSON.parse)
    return json_encode($this);
  }

  // fungsi yang dipanggil ketika object di hancurkan / dihapus
  function __destruct()
  {
    echo "User destroyed!";
  }
}

$user = new User("user 1", "user@mail.com", "rahasia");

$user->password = '123t675776';

// $user->setPasssword("123");

print_r($user->password);

// $user->rahasia();

echo $user;

$user = null;
// unset($user);
