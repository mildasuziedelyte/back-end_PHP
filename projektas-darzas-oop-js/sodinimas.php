<?php

defined('DOOR_BELL') || die('Įėjimas tik pro duris');

$store = new Darzas\Store('darzas');

// CATCHE START
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
        include __DIR__.'/listSodinimas.php';
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
elseif (isset($rawData['sodintiAgurka'])) {
    $store->plant('Agurkas');

    ob_start();
    include __DIR__.'/listSodinimas.php';
    $out = ob_get_contents();
    ob_end_clean();
    $json = ['list' => $out];
    $json = json_encode($json);
    header('Content-type: application/json');
    http_response_code(201);
    echo $json;
    die;
}

elseif (isset($rawData['sodintiPomidora'])) {
    $store->plant('Pomidoras');

    ob_start();
    include __DIR__.'/listSodinimas.php';
    $out = ob_get_contents();
    ob_end_clean();
    $json = ['list' => $out];
    $json = json_encode($json);
    header('Content-type: application/json');
    http_response_code(201);
    echo $json;
    die;
}

if (isset($rawData['rauti'])) {
    $store->remove($rawData['id']);

    ob_start();
    include __DIR__.'/listSodinimas.php';
    $out = ob_get_contents();
    ob_end_clean();
    $json = ['list' => $out];
    $json = json_encode($json);
    header('Content-type: application/json');
    http_response_code(200);
    echo $json;
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darzas. Sodinimas</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/layout.css">
    <link rel="stylesheet" href="./css/custom.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/back-end_PHP/projektas-darzas-oop-js/js/appS.js" defer ></script>
    <script> const apiURL = 'http://localhost/back-end_PHP/projektas-darzas-oop-js/sodinimas';</script>
</head>
<body>
    <header class="container">
        <div class="row">
            <div class="col-12">
                <h1>Daržas</h1>
                <div class="header-bottom">
                    <h3>Sodinimas</h3>
                    <nav>
                    <a class="selected" href="<?=URL.'sodinimas'?>">Sodinimas</a>
                    <a href="auginimas">Auginimas</a>
                    <a href="skynimas">Skynimas</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main class="">
        <form class="container" action="<?=URL.'sodinimas'?>" method="post">
            <div id="list" class="row list"></div>
            <div class="row">
                <div class="sodinti col-12">
                    <button class="buttonB" type="button" name="sodintiAgurka">SODINTI AGURKĄ</button>
                    <button class="buttonB" type="button" name="sodintiPomidora">SODINTI POMIDORĄ</button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>

<?php
