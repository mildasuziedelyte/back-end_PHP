<!-- // 4. Sukurkite du puslapius lemon.php ir orange.php. Jų fonus nuspalvinkite atitinkamom spalvom. Į lemon.php puslapį įdėkite kodą, kuris naršyklę visada peradresuotų į puslapį orange.php. Pademonstruokite veikimą. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>html{background-color:yellow;}</style>
<body>
    <!-- Po 5 sekundžių būsite nukreipti į orange.php -->
</body>

<?php


header('Location: http://localhost/paskaitos/1221nd/4-orange.php');
// header('refresh:5; url=http://localhost/paskaitos/1221nd/4-orange.php');

