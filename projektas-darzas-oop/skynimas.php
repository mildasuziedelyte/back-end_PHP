<?php

session_start();

include __DIR__.'/vendor/autoload.php';

// include __DIR__.'/Vegetable.php';
// include __DIR__.'/App.php';
// include __DIR__.'/Darzove.php';
// include __DIR__.'/Agurkas.php';
// include __DIR__.'/Pomidoras.php';

use Darzas\App;
use Darzas\Pomidoras;
use Darzas\Agurkas;

App::createSession();

//Skynimo su input scenarijus
if(isset($_POST['skinti'])){
    App::pick($_POST['skinti']);
}

if(isset($_SESSION['er'])){
    $msg = $_SESSION['er']['msg'];
    $id = $_SESSION['er']['id'];
    unset($_SESSION['er']);
}

//Skinti visus nuo vieno krumo SCENARIJUS
if(isset($_POST['skintiVisus'])){
    App::pickAllFromBush($_POST['skintiVisus']);
}

//Skinti visus SCENARIJUS
if(isset($_POST['nuimtiVisaDerliu'])){
    Agurkas::pickAll();
    Pomidoras::pickAll();
    App::redirect('skynimas');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daržas: skynimas</title>
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
                    <h3>Skynimas</h3>
                    <nav>
                    <a class="selected" href="http://localhost/back-end_PHP/projektas-darzas-oop/sodinimas.php">Sodinimas</a>
                    <a href="http://localhost/back-end_PHP/projektas-darzas-oop/auginimas.php">Auginimas</a>
                    <a href="http://localhost/back-end_PHP/projektas-darzas-oop/skynimas.php">Skynimas</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main class="container">
            <form class="row" action="" method="post">
            <?php foreach ($_SESSION['myVegetables'] as $key => $value):?>
            <?php $value = unserialize($value)?>
            <div class="plant col-6 col-lg-12">
                <div class="img">
                    <img src="<?= $value->img ?>" alt="vegetable-photo">
                </div>
                <div class="info">
                    <h4> <?= $value->type ?> Krūmas nr. <?= $value->id ?> </h4>
                    <p class='p'> Daržovių: <?= $value->count ?> </p>
                    <?php if($value->count > 0):?>
                        <label for="">Skinamų daržovių skaičius:</label>
                        <div class="input">
                            <input type="text" name="kiekisSkinti[<?= $value->id ?>]">
                            <button class="buttonS" type="submit" name="skinti" value="<?= $value->id ?>">Skinti</button>
                        </div>
                        <?php if(isset($id) && $id == $key ):?>
                            <div class="er"><?= $msg ?? '' ?></div>
                        <?php endif?>
                        <button class="buttonS buttonVisus" type="submit" name="skintiVisus" value="<?= $value->id ?>">Skinti Visus</button>
                    <?php else:?>
                        <?php if(isset($id) && $id == $key ):?>
                            <div class="er"><?= $msg ?? '' ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach ?>
            <div class="sodinti col-12">
                 <button class="buttonB" type="submit" name="nuimtiVisaDerliu">NUIMTI VISĄ DERLIŲ</button>
            </div>
            </form>
        </div>
    </main>
</body>
</html>
