<?php

namespace Darzas;

use Darzas\Agurkas;
use Darzas\Pomidoras;
use Darzas\Store;
use Darzas\Cache;

class App {

    public static function route(){

        $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);
        $uri = explode('/', $uri);

        // Router'is - mapina kintamuosius gautus is uri i tam tikrus failus
        if('sodinimas' == $uri[0]){
            include DIR.'/sodinimas.php';
        }
        if('auginimas' == $uri[0]){
            include DIR.'/auginimas.php';
        }
        if('skynimas' == $uri[0]){
            include DIR.'/skynimas.php';
        }
    }

}
