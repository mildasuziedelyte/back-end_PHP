<!-- // 9.Padarykite juodą puslapį, kuriame būtų POST forma, mygtukas ir atsitiktinis kiekis (3-10) checkbox su raidėm A,B,C… Padarykite taip, kad paspaudus mygtuką, fono spalva pasikeistų į baltą, forma išnyktų ir atsirastų skaičius, rodantis kiek buvo pažymėta checkboksų (ne kurie, o kiek).  -->

<?php
if(!empty($_POST)){
    $background = 'white';
    $display = 'none';
    $color = 'black';
    echo 'Pažymėta: '. count($_POST);
} else {
    $background = 'black';
    $display = 'block';
    $color = 'white';

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
        background-color:<?=$background?>;
        color: <?=$color?>;
    }
    form{
        display: <?=$display?>;
    }
</style>
<body>
    <form action="" method="post">
    <button type="submit">Mygtukas</button><br><br>

    <?php
    $letters = implode(range('a', 'z'));
    for ($i=0; $i < rand(3,10) ; $i++) { 
        echo "<label for=''>$letters[$i]</label>";
        echo "<input type='checkbox' name='$letters[$i]' value='on'><br>";
    }
    ?>
    
    </form>
</body>
</html>