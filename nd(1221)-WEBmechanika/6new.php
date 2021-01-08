<!-- 6. Padarykite puslapį su dviem mygtukais. Mygtukus įdėkite į dvi skairtingas formas- vieną GET ir kitą POST. Nenaudodami jokių konkrečių $_GET ar $_POST reikšmių, o tik tikrindami pačius masyvus, nuspalvinkite foną žaliai, kai paspaustas mygtukas iš GET formos ir geltonai- kai iš POST. -->


<?php

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $backgroundColor = 'green';
} 
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $backgroundColor = 'yellow';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background-color:<?=$backgroundColor?>;
    }

</style>
<body>
    <form action="" method="get">
        <button type="sumbit">GET-zalias</button>
    </form>
    <form action="" method="post">
        <button type="submit" >POST-geltonas</button>
    </form>
</body>
</html>