<!-- // 10. Pakartokite 9 uždavinį. Padarykite taip, kad atsirastų du skaičiai. Vienas rodytų kiek buvo pažymėta, o kitas kiek iš vis buvo jų sugeneruota. -->

<?php

if(!empty($_POST)){
    $background = 'white';
    $display = 'none';
    $color = 'black';
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
    <?php
    $letters = implode(range('a', 'z'));
    $count = rand(3,10);
    for ($i=0; $i < $count  ; $i++) { 
        echo "<label for=''>$letters[$i]</label>";
        echo "<input type='checkbox' name='$letters[$i]' value='[$i]'><br>";
    }
    echo "<br><button type='submit' name='generated' value ='$count'>Mygtukas</button>";
    ?>
    </form>

    <?php
        if(!empty($_POST)){
            echo 'Pažymėta: '. (count($_POST)-1);
            echo '<br> Sugeneruota: '. $_POST['generated'];
        }
    ?>
</body>
</html>