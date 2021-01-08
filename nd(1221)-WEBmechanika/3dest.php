
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
    <title>ND3</title>
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
    <a href="http://localhost/paskaitos/1221nd/3dest.php">Nuoroda i juoda</a><br>
    <a href="http://localhost/paskaitos/1221nd/3dest?color=1">Nuoroda i raudona</a><br>    
    <a href="http://localhost/paskaitos/1221nd/3dest?color=2">Nuoroda i melyna</a><br>    

    <form action="http://localhost/paskaitos/1221nd/3dest.php" method="get">
        <input type="text" name="color">
        <button type="submit" value="123">set color</button>
        <!-- <input type="submit" value="set color 2"> -->
        <!-- input'as kaip value perduoda mygtuko pvadinima, o jis gali keistis ir pan -->
    </form>
</body>
</html>


