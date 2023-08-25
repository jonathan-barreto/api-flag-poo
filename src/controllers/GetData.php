<?php

namespace Jonathan\Ap\controllers;

use Jonathan\Ap\models\Connection;
use Jonathan\Ap\models\CountryDataManager;
use Jonathan\Ap\models\Countries;

class GetData
{
  public function getData($continente)
  {
    try {
      $connection = new Connection();
      $countryDataManager = new CountryDataManager($connection);
      $countriesData = $countryDataManager->fetchCountriesData($continente);
      
      $countries = new Countries();
      $json = $countries->returnCountriesData($countriesData);
      
      return $json;
    } catch (\Exception $e) {
      echo "Ocorreu um erro: " . $e->getMessage();
    }
  }
}
