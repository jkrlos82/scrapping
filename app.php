<?php

require 'vendor/autoload.php';

use src\app\Scrapper;
use src\app\Players;

$data = new Scrapper();

$players = $data->getData();

$height = readline('Enter Player Height in Inches: ');

$result = new Players($players, $height);

$result->pairPlayersByInches();
