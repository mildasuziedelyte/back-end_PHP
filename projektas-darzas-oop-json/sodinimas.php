<?php

defined('DOOR_BELL') || die('Įėjimas tik pro duris');

$store = new Darzas\Store('darzas');

//SODINIMO SCENARIJUS
if(isset($_POST['sodintiAgurka'])){
    $store->plant('Agurkas');
    header('Location: '.URL.'sodinimas');
    exit;   
}

if(isset($_POST['sodintiPomidora'])){
    $store->plant('Pomidoras');
    header('Location: '.URL.'sodinimas');
    exit;   
}

//Rovimo SCENARIJUS
if(isset($_POST['rauti'])){
    $store->remove($_POST['rauti']);
    header('Location: '.URL.'sodinimas');
    exit;  
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
                    <a href="<?=URL.'auginimas'?>">Auginimas</a>
                    <a href="<?=URL.'skynimas'?>">Skynimas</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main class="container">
    <form class="row" action="<?=URL.'sodinimas'?>" method="post">
            <?php foreach ($store->getAll() as $key => $value):?>
            <div class="plant sodinimas col-6 col-sm-12">
                <div class="img">
                    <img src="<?= $value->img ?>" alt="vegetable-photo">
                </div>
                <div class="info">
                    <h4> <?= $value->type ?>. Krūmas nr. <?= $value->id ?> </h4>
                    <p> Daržovių: <?= $value->count ?> </p>
                </div>
                <button class='buttonI' type="submit" name="rauti" value="<?= $value->id ?>">Išrauti</button>
            </div>
            <?php endforeach ?>

            <div class="sodinti col-12">
                <button class="buttonB" type="submit" name="sodintiAgurka">SODINTI AGURKĄ</button>
                <button class="buttonB" type="submit" name="sodintiPomidora">SODINTI POMIDORĄ</button>
            </div>
            </form>
        </div>

    </main>
</body>
</html>

<?php
