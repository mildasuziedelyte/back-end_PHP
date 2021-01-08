<!-- P7. akartokite 6 uždavinį. Papildykite jį kodu, kuris naršyklę po POST metodo peradresuotų tuo pačiu adresu (t.y. į patį save) jau GET metodu. -->

<?php

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $backgroundColor = 'green';
} 
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $backgroundColor = 'yellow';
    header('refresh:3; url=http://localhost/paskaitos/1221nd/7.php');
    die;
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



<!-- <form action="?" method="get">
    <button type="submit" name="get" value="get">Send get metodu</button>
</form>

<form action="?" method="post">
    <button type="submit" name="post" value="post">Send post metodu</button>
</form> -->


<!-- // if (!empty($_GET)){
//     echo '<style>html{background-color:lightgreen;}</style>'; 
// } elseif (!empty($_POST)){
//     echo '<style>html{background-color:lightyellow;}</style>';
//     header('refresh:3; url = http://localhost/paskaitos/1221nd/7.php?post=post');
// } -->