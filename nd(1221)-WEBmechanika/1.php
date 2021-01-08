<!-- 1. Sukurti puslapį su juodu fonu ir su dviem linkais (nuorodom) į save. Viena nuoroda su failo vardu, o kita nuoroda su failo vardu ir GET duomenų perdavimo metodu perduodamu kintamuoju color=1. Padaryti taip, kad paspaudus ant nuorodos su perduodamu kintamuoju fonas nusidažytų raudonai, o paspaudus ant nuorodos be perduodamo kintamojo, vėl pasidarytų juodas. -->

<?php
//// Destytojo
if (isset($_GET['color'])) {
    if (1==$_GET['color']) {
        $backgroundColor = '#ff0000';
    }
    if (2==$_GET['color']) {
        $backgroundColor = '#0000ff';
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
    <title>ND1</title>
</head>
<style>
    body{
        background-color:<?=$backgroundColor?>;
        /* background-color:<?php echo $backgroundColor?>; //virsuje trumpinys - vienos eilutes koda skuris kazka echoins*/
        color:white;
    }
    /* html{
        background-color:black;
        color:white;
    } */
    body a{
        color:white;
    }
</style>
<body>
    <a href="http://localhost/paskaitos/1221nd/1.php">Nuoroda i juoda</a><br>
    <a href="http://localhost/paskaitos/1221nd/1.php?color=1">Nuoroda i raudona</a><br>    
    <a href="http://localhost/paskaitos/1221nd/1.php?color=2">Nuoroda i melyna</a><br>    
</body>
</html>





<!-- <?php

// if(isset($_GET['color']) && $_GET['color']==1){
//     echo '<style>html{background-color:red;}</style>'; 
// }

?> -->
