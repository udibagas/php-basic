<?php

class Database
{
  public $connection;

  function __construct(private string $host, private int $port, private string $user, private string $password, private string $db_name)
  {
    // logic untuk konek database
    // $this->connection = ???
  }

  function readData($table)
  {
    $this->connection->query("SELECT * FROM $table");
  }

  function createData($table, $data)
  {
    $this->connection->query("INSERT INTO $table VALUES ($data)");
  }
}

$db = new Database('localhost', 5432, 'postgres', 'postgres', 'my_db');

$db->readData('users');
