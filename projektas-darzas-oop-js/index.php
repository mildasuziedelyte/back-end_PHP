<?php

use Darzas\App;

define('DOOR_BELL', 'ring');
define('INSTALL_FOLDER', '/back-end_PHP/projektas-darzas-oop-js/');
define('URL', 'http://localhost/back-end_PHP/projektas-darzas-oop-js/');
define('DIR', __DIR__);

include __DIR__.'/bootstrap.php';
App::route();