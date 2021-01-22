<?php

namespace Darzas;

use Darzas\Agurkas;
use Darzas\Pomidoras;
use Darzas\Store;
use Darzas\Cache;
use Darzas\Controller\SodinimasController;

class App {

    private static $storeSetting = 'db'; // gali buti json arba db

    public static function store($type){ //factory, gamins objektus
        if (self::$storeSetting == 'json'){
            return new JsonStore($type);
        }
        if (self::$storeSetting == 'db'){
            return new DbStore($type);
        }
        
    }

    public static function route(){

        $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);
        $uri = explode('/', $uri);

        // Router'is - mapina kintamuosius gautus is uri i tam tikrus failus
        if('sodinimas' == $uri[0]){
            if(!isset($uri[1])){
                return (new SodinimasController)->index();
            }
            if('listSodinimas' == $uri[1]){
                return (new SodinimasController)->list();
            }
            if('remove' == $uri[1]){
                return (new SodinimasController)->remove();
            }
            if('plantCucumber' == $uri[1]){
                return (new SodinimasController)->plantCucumber();
            }
            if('plantTomato' == $uri[1]){
                return (new SodinimasController)->plantTomato();
            }
            //gera vieta prideti 404 puslapi
        }





        if('auginimas' == $uri[0]){
            include DIR.'/auginimas.php';
        }
        if('skynimas' == $uri[0]){
            include DIR.'/skynimas.php';
        }
    }

}
