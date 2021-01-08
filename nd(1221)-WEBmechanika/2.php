<!-- 2. Sukurti puslapį panašų į 1 uždavinį, tiktai antro linko su perduodamu kintamuoju nedarykite, o vietoj to padarykite, URL eilutėje ranka įvedus GET kintamąjį color su RGB spalvos kodu (pvz color=ff1234) puslapio fono spalva pasidarytų tokios spalvos. -->

<a style="color:white;" href="?">Nuoroda i juoda</a><br>

<?php

echo '<style>html{background-color:black;}</style>';
if(!empty($_GET) && isset($_GET['color'])){
    echo '<style>html{background-color:#'.$_GET['color'].';}</style>'; 
}

?>
