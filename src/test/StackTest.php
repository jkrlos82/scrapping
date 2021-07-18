<?php
require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use src\app\Players;
use src\app\Scrapper;

class StackTest extends TestCase{

    public function testGetDataFromUrlAsArray() {

        $data = new Scrapper();

        $this->assertIsArray($data->getData(), "assert we receive an array from the Url");

    }

    public function testNegativeValuesAsInput() {

        $data = new Scrapper();
        $players = $data->getData();
        $result = new Players($players, -10);

        $this->expectOutputString("No matches found \n");
        $result->pairPlayersByInches();

    }

    public function testValue139(){
        $data = new Scrapper();
        $players = $data->getData();
        $result = new Players($players, 139);

        $this->expectOutputString("- Nate Robinson   Mike Wilks \n- Nate Robinson   Brevin Knight \n");
        $result->pairPlayersByInches();
    }
}