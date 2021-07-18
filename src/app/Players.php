<?php

namespace src\app;

class Players {

    private $players;
    private $height;

    public function __construct(array $players, int $height){

        $this->players = $players;
        $this->height = $height;
    }

    private function getComplement(int $val): array {
        $result = [];
        foreach($this->players as $key=>$value){
            if($val == $value){
                $result[$key] = $value;
            }
        }

        return $result;

    }

    public function pairPlayersByInches(){
        $has_pair = false;
        asort($this->players);
        foreach($this->players as $key => $value){
            $diff = $this->height - $value;
            if($diff > 0){
                $pairs = $this->getComplement($diff);
                if(sizeof($pairs) > 0){
                    foreach($pairs as $pkey => $pvalue){
                        echo "- $key   $pkey \n";
                    }
                    $has_pair = true;
                }
            }
            unset($this->players[$key]);
        }

        if(!$has_pair){
            echo "No matches found \n";
        }

    }

}