<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $backgroundColor = 'green';
    header('refresh:3; url=http://localhost/paskaitos/1221nd/6dest.php');
    die;
}

if($_SERVER['REQUEST_METHOD'] === 'GET'){
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