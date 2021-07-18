<?php

class Scrapper {

    private $data;

    public function __construct(string $url = 'https://mach-eight.uc.r.appspot.com/'){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $this->data = curl_exec($ch);
    }

    public function getData(): ?array {
        $data = json_decode($this->data, true);
        $players = [];
        foreach ($data['values'] as $player){
            $players[$player['first_name'].' '.$player['last_name']] = $player['h_in']; 
            
        }
        return $players;
    }

}