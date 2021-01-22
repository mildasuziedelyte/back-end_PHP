<?php

defined('DOOR_BELL') || die('Įėjimas tik pro duris');

// $store = new Darzas\Store('darzas');
$store = Darzas\App::Store('darzas');;

// CACHE START
include __DIR__ . '/classes/Cache.php';
$DATA = new Darzas\Cache;
$rate = Darzas\Rates::getRate($DATA);

if('POST' == $_SERVER['REQUEST_METHOD']) {
    $rawData = file_get_contents("php://input");
    $rawData = json_decode($rawData, 1);
}

// LIST'o generavimo SCENARIJUS
if (isset($rawData['list'])) {
    ob_start();
    include __DIR__.'/views/listSkynimas.php';
    $store->removeErr();
    $out = ob_get_contents();
    ob_end_clean();
    $json = ['list' => $out];
    $json = json_encode($json);
    header('Content-type: application/json');
    http_response_code(200);
    echo $json;
    die;
}

// Skynimo su input scenarijus
elseif (isset($rawData['skinti'])) {
    $store->pick($rawData['id'], $rawData['skinti']);
    ob_start();
    include __DIR__.'/views/listSkynimas.php';
    $store->removeErr();
    $out = ob_get_contents();
    ob_end_clean();
    $json = ['list' => $out];
    $json = json_encode($json);
    header('Content-type: application/json');
    http_response_code(201);
    echo $json;
    die;
}

if (isset($rawData['skintiVisus'])) {
    $store->pickAllfromBush($rawData['id']);

    ob_start();
    include __DIR__.'/views/listSkynimas.php';
    $out = ob_get_contents();
    ob_end_clean();
    $json = ['list' => $out];
    $json = json_encode($json);
    header('Content-type: application/json');
    http_response_code(200);
    echo $json;
    die;
}

//Skinti visus SCENARIJUS
elseif (isset($rawData['visaDerliu'])) {
    $store->pickAll();

    ob_start();
    include __DIR__.'/views/listSkynimas.php';
    $out = ob_get_contents();
    ob_end_clean();
    $json = ['list' => $out];
    $json = json_encode($json);
    header('Content-type: application/json');
    http_response_code(201);
    echo $json;
    die;
}

// if(isset($_POST['nuimtiVisaDerliu'])){
//     $store->pickAll();
//     header('Location: '.URL.'skynimas');
//     exit;  
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daržas. Skynimas</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/layout.css">
    <link rel="stylesheet" href="./css/custom.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/back-end_PHP/projektas-darzas-db/js/appSk.js" defer ></script>
    <script> const apiURL = 'http://localhost/back-end_PHP/projektas-darzas-db/skynimas';</script>

</head>
<body>
    <header class="container">
        <div class="row">
            <div class="col-12">
                <h1>Daržas</h1>
                <div class="header-bottom">
                    <h3>Skynimas</h3>
                    <nav>
                    <a href="<?=URL.'sodinimas'?>">Sodinimas</a>
                    <a href="<?=URL.'auginimas'?>">Auginimas</a>
                    <a class="selected" href="<?=URL.'skynimas'?>">Skynimas</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main class="">
        <form class="container" action="" method="post">
            <div id="list" class="row">
               
            </div>
            <div class="row">
                <div class="sodinti col-12">
                    <button class="buttonB" type="submit" name="nuimtiVisaDerliu">NUIMTI VISĄ DERLIŲ</button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>

