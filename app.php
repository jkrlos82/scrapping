<?php

require('./Scrapper.class.php');
require('./Players.class.php');

$data = new Scrapper();

$players = $data->getData();

$players;

$height = readline('Enter Player Height in Inches: ');

$result = new Players($players, $height);

$result->pairPlayersByInches();
