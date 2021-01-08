<!-- 5. Sukurkite du atskirus puslapius blue.php ir red.php Juose sukurkite linkus į pačius save (abu į save ne į kitą puslapį!). Padarykite taip, kad paspaudus ant  linko puslapis ne tiesiog persikrautų, o PHP kodas (ne tiesiogiai html tagas!) naršyklę peradresuotų į kitą puslapį (iš raudono į mėlyną ir atvirkščiai). -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red</title>
</head>
<style>html{background-color:lightsalmon;}</style>
<body>
    <a href="?r">Linkas i save</a>
</body>

<?php
if(!empty($_GET) && isset($_GET['r'])){
    header('refresh:1; url = http://localhost/paskaitos/1221nd/5-blue.php');
}