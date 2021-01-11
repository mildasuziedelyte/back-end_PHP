<?php

session_start();

include __DIR__.'/vendor/autoload.php';

// include __DIR__.'/Vegetable.php';
// include __DIR__.'/App.php';
// include __DIR__.'/Darzove.php';
// include __DIR__.'/Agurkas.php';
// include __DIR__.'/Pomidoras.php';

use Darzas\App;

App::createSession();


// AUGINIMO SCENARIJUS
if (isset($_POST['auginti'])) {
    App::grow();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daržas: auginimas</title>
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
                    <a class="selected" href="http://localhost/back-end_PHP/projektas-darzas/sodinimas.php">Sodinimas</a>
                    <a href="http://localhost/back-end_PHP/projektas-darzas/auginimas.php">Auginimas</a>
                    <a href="http://localhost/back-end_PHP/projektas-darzas/skynimas.php">Skynimas</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main class="container">
            <form class="row" action="" method="post">
            <?php foreach ($_SESSION['myVegetables'] as $key => $value):?>
            <?php $value = unserialize($value)?>
            <div class="plant auginimas col-6 col-sm-12">
                <div class="img">
                    <img src="<?= $value->img ?>" alt="vegetable-photo">
                </div>
                <div class="info">
                    <h4> <?=$value->type?>. Krūmas nr. <?= $value->id ?> </h4>
                    <p> Daržovių: <?= $value->count ?> </p>
                    <?php $value->grow(); ?>
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

<?php

_d($_POST, 'post');




