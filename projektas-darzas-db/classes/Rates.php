<?php

namespace Darzas;

class Rates{

    public static function getRate($DATA){
        $answer = $DATA->get();

        // $method = false === $answer ? 'API' : 'CATCHE';
        // _d($method);

        if (false === $answer) {
            // API START
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://api.exchangeratesapi.io/latest');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $answer = curl_exec($ch); // siuntimas ir laukimas atsakymo

            $answer = json_decode($answer);

            $DATA->set($answer); // <---- uzkesinam naujus duomenis

            // API END
        }

    $rate=$answer->rates->USD;

    return $rate;
    }

}