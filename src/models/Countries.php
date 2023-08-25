<?php

namespace Jonathan\Ap\models;

class Countries
{
  public function returnCountriesData($countries)
  {
    $numerosAleatorios = [];

    for ($i = 0; $i < 4; $i++) { 
      $numeroAleatorioGerado = rand(0, count($countries) - 1);
      if(!in_array($numeroAleatorioGerado, $numerosAleatorios)){
        array_push($numerosAleatorios, $numeroAleatorioGerado);
      } else {
        $i--;
      }
    }

    $countryData = $countries[$numerosAleatorios[0]];

    $countriesData = array();

    for ($i = 0; $i < 4; $i++) { 
      $nameCountry = $countries[$numerosAleatorios[$i]]['flag_name'];
      array_push($countriesData, $nameCountry);
    }

    shuffle($countriesData);

    $data = array(
      "status" => true,
      "countryData" => $countryData,
      "countries" => $countriesData,
    );

    return json_encode($data);
  }
}
