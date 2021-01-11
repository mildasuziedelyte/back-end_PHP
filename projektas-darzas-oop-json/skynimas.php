<?php

defined('DOOR_BELL') || die('Įėjimas tik pro duris');

$store = new Darzas\Store('darzas');

//Skynimo su input scenarijus
if(isset($_POST['skinti'])){
    $store->pick($_POST['skinti']);
    header('Location: '.URL.'skynimas');
    exit;  
}

if(isset($_SESSION['er'])){
    $msg = $_SESSION['er']['msg'];
    $id = $_SESSION['er']['id'];
    unset($_SESSION['er']);
}

//Skinti visus nuo vieno krumo SCENARIJUS
if(isset($_POST['skintiVisus'])){
    $store->pickAllfromBush($_POST['skintiVisus']);
    header('Location: '.URL.'skynimas');
    exit;  
}

//Skinti visus SCENARIJUS
if(isset($_POST['nuimtiVisaDerliu'])){
    $store->pickAll();
    header('Location: '.URL.'skynimas');
    exit;  
}

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
    <main class="container">
            <form class="row" action="" method="post">
            <?php foreach ($store->getAll() as $key => $value):?>
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
