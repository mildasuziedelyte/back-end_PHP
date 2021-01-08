<?php

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    header('Location:http://localhost/paskaitos/1221nd/8dest-pink.php');
    die;
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rose</title>
</head>
<style>
    body{
        background-color:#ff007f;
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