<?php

use Darzas\App;

define('DOOR_BELL', 'ring');
define('INSTALL_FOLDER', '/back-end_PHP/projektas-darzas-oop-json/');
define('URL', 'http://localhost/back-end_PHP/projektas-darzas-oop-json/');
define('DIR', __DIR__);

// $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);
// $uri = explode('/', $uri);

// include __DIR__.'/vendor/autoload.php';
include __DIR__.'/bootstrap.php';
App::route();

// _d($uri);

// Router'is - mapima kintamuosius gautus is uri i tam tikrus failus
// if('sodinimas' == $uri[0]){
//     include __DIR__.'/sodinimas.php';
// }
// if('auginimas' == $uri[0]){
//     include __DIR__.'/auginimas.php';
// }
// if('skynimas' == $uri[0]){
//     include __DIR__.'/skynimas.php';
// }



// $page = preg_replace('/[^\d]/', '', $_SERVER['REQUEST_URI']);

// _d($page);