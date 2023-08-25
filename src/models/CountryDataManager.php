<?php

namespace Jonathan\Ap\models;

class CountryDataManager
{
  private $connection;

  public function __construct(Connection $connection)
  {
    $this->connection = $connection;
  }

  public function fetchCountriesData($continente = null)
  {
    $continentes = [
      "america" => "América",
      "asia" => "Ásia",
      "africa" => "África",
      "europa" => "Europa",
      "oceania" => "Oceania",
    ];

    try {
      $conn = $this->connection->getConnection();
      $query = "SELECT * FROM flags";

      if ($continente !== null) {
        $query .= " WHERE continente = :continente";
      }

      $stmt = $conn->prepare($query);

      if ($continente !== null) {
        $stmt->bindParam(':continente', $continentes[$continente]);
      }

      $stmt->execute();
      $conn = null;

      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
      throw new \Exception($e->getMessage(), 1);
    }
  }
}
