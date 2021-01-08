
<?php
if (isset($_GET['color'])) {
    if (1==$_GET['color']) {
        $backgroundColor = '#ff0000';
    }
    if (2==$_GET['color']) {
        $backgroundColor = '#0000ff';
    }
    else {
        ////reikia validacijos
        $backgroundColor = '#'.$_GET['color'];
    }
} else {
    $backgroundColor = '#000';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ND2</title>
</head>
<style>
    body{
        background-color:<?=$backgroundColor?>;
        color:white;
    }
    body a{
        color:white;
    }
</style>
<body>
    <a href="http://localhost/paskaitos/1221nd/2dest.php">Nuoroda i juoda</a><br>
    <a href="http://localhost/paskaitos/1221nd/2dest?color=1">Nuoroda i raudona</a><br>    
    <a href="http://localhost/paskaitos/1221nd/2dest?color=2">Nuoroda i melyna</a><br>    
</body>
</html>


