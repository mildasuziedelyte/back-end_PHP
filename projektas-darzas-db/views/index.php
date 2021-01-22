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
    <script src="http://localhost/back-end_PHP/projektas-darzas-db/js/appS.js" defer ></script>
    <script> const apiURL = 'http://localhost/back-end_PHP/projektas-darzas-db/sodinimas';</script>
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