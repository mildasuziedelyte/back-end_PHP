<?php

defined('DOOR_BELL') || die('Įėjimas tik pro duris');

$store = new Darzas\Store('darzas');

// AUGINIMO SCENARIJUS
if (isset($_POST['auginti'])) {
    $store->grow();
    header('Location: '.URL.'auginimas');
    exit; 

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daržas. Auginimas</title>
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
                    <h3>Auginimas</h3>
                    <nav>
                    <a href="<?=URL.'sodinimas'?>">Sodinimas</a>
                    <a class="selected" href="<?=URL.'auginimas'?>">Auginimas</a>
                    <a href="<?=URL.'skynimas'?>">Skynimas</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main class="container">
            <form class="row" action="" method="post">
            <?php $store->newVegs()?>
            <?php foreach ($store->getAll() as $key => $value):?>
            <div class="plant auginimas col-6 col-sm-12">
                <div class="img">
                    <img src="<?= $value->img ?>" alt="vegetable-photo">
                </div>
                <div class="info">
                    <h4> <?=$value->type?>. Krūmas nr. <?= $value->id ?> </h4>
                    <p> Daržovių: <?= $value->count ?> </p>
                    <h3 style="display:inline;color:green;">+<?= $value->newVegetables ?> daržovės </h3>
                </div>
            </div>
            <?php $_SESSION['myVegetables'][$key] = serialize($value)?>
            <?php endforeach ?>

            <div class="sodinti col-12">
               <button class="buttonB" type="submit" name="auginti">AUGINTI</button>
            </div>
            </form>
        </div>
    </main>
</body>
</html>

