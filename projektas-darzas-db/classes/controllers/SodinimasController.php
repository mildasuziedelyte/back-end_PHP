<?php

namespace Darzas\Controller;

use Darzas\Store;
use Darzas\Cache;
use Darzas\Rates;
use Darzas\App;

class SodinimasController {

    private $store, $rawData;

    public function __construct(){
       if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $this->store = App::Store('darzas');

        $this->rawData = file_get_contents("php://input");
        $this->rawData = json_decode($this->rawData, 1);
       }
    }


    public function rates(){
        include DIR.'/classes/Cache.php';
        $DATA = new Cache();
        $rate = Rates::getRate($DATA);
        $store = $this->store->updatePrice($rate);

        return $store;

    }

    //SODINIMO rodymo scenarijus
    public function index(){
        include DIR.'/views/index.php';
    }

    // LIST'o generavimo SCENARIJUS
    public function list(){
        ob_start();
        $store = $this->rates();

        include DIR.'/views/listSodinimas.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }

    // SODINIMO SCENARIJAI
    public function plantCucumber(){
        $this->store->plant('Agurkas');
        $store = $this->rates();
        ob_start();
        include DIR.'/views/listSodinimas.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    }

    public function plantTomato(){
        $this->store->plant('Pomidoras');
        $store = $this->rates();
        ob_start();
        include DIR.'/views/listSodinimas.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    }


    //ROVIMO scenarijus
    public function remove(){
        $this->store->remove($this->rawData['id']);
        ob_start();
        $store = $this->store;
        include DIR.'/views/listSodinimas.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }
}

    // public function rates(){
    //     $store = $this->store;
    //     include DIR.'/classes/Cache.php';
    //     $DATA = new Cache();
    //     $rate = Rates::getRate($DATA);

    //     if(App::$storeSetting == "json"){
    //         foreach ($store->getAll() as $key => $value){
    //             $tmp = $value;
    //             $store->remove($value->id);
    //             $tmp->setPriceUSD($rate);
    //             $store->addNewVegetable($tmp);
    //         }
            
    //     } else {
    //         foreach ($store->getAll() as $key => &$value){
    //              $value->setPriceUSD($rate);
    //              $store->update($value->id, $value->priceUSD);
    //         }
    //     }
    //     return $this->store = $store;

    // }