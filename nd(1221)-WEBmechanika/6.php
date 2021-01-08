<!-- // 6. Padarykite puslapį su dviem mygtukais. Mygtukus įdėkite į dvi skairtingas formas- vieną GET ir kitą POST. Nenaudodami jokių konkrečių $_GET ar $_POST reikšmių, o tik tikrindami pačius masyvus, nuspalvinkite foną žaliai, kai paspaustas mygtukas iš GET formos ir geltonai- kai iš POST. -->

<?php
if (!empty($_GET)){
    echo '<style>html{background-color:lightgreen;}</style>'; 
} elseif (!empty($_POST)){
    echo '<style>html{background-color:lightyellow;}</style>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nd6</title>
</head>
<body>
    <form action="?" method="get">
        <button type="submit" name="get" value="get">Send get metodu</button>
    </form>

    <form action="?" method="post">
        <button type="submit" name="post" value="post">Send post metodu</button>
    </form>
</body>
</html>



