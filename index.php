<?php

require 'vendor/autoload.php';

header('Content-Type: application/json; charset=utf8');

use Jonathan\Ap\controllers\GetData;

$continente = $_REQUEST["request"] ?? null;

$controller = new GetData();
echo $controller->getData($continente);
