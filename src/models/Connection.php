<?php

namespace Jonathan\Ap\models;

class Connection
{
  public function getConnection()
  {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "flag";
    
    try {
      $connection = new \PDO("mysql:host=$servername;dbname=$database", $username, $password);
      $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (\Exception $e) {
      throw new \Exception($e->getMessage(), 1);
    }

    return $connection;
  }
}
