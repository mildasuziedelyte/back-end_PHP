<!-- // 11. papildomas -->
<!-- // Suprogramuokite žaidimą. Žaidimas prasideda dviem laukeliais, kuriuose žaidėjai įveda savo vardus ir mygtuku “pradėti”. Šone yra rodomas žaidėjų rezultatas. Paspaudus “pradėti” turi atsirasti pirmo žaidėjo vardas ir mygtukas “mesti kauliuką”. Jį nuspaudus skriptas automatiškai sugeneruoja skaičių nuo 1 iki 6 ir jį prideda prie žaidėjo rezultato, o pirmo žaidėjo vardas pakeičiamas antro žaidėjo vardu (parodo kieno eilė “mesti kauliuką”). Žaidimas tęsiamas iki tol, kol kažkuris žaidėjas surenka 30 taškų. Tada parodomas pranešimas apie laimėjimą ir vėl leidžiama suvesti žaidėjų vardus ir pradėti žaidimą iš naujo. -->
<?php
// session_start();

$player1 = $_GET['player1'] ?? 'Player 1';
$player2 = $_GET['player2'] ?? 'Player 2';
$player1score = $_GET['score1'] ?? 0;
$player2score = $_GET['score2'] ?? 0;

if (isset($_GET['game'])) {
    if ('on'==$_GET['game']) {
        $displayForm = 'none';
        $displayGame = 'block';
    }
    else {
        $displayForm = 'block';
        $displayGame = 'none';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>11-zaidimas</title>
</head>
<style>
form{
    display: <?=$displayForm?>;
}
.game{
    display: <?=$displayGame?>;
}

</style>
<body>

<form action="" method="get">
    <label for="">Player 1</label>
    <input type="text" name="player1" >
    <input type="hidden" name="score1" value='0'>
    <br>
    <label for="">Player 2</label>
    <input type="text" name="player2">
    <input type="hidden" name="score2" value='0'>
    <br>
    <button type="submit" name='game' value='on'>Pradėti</button>
    <input type="hidden" name="winner" value='0'>
</form>

<div class="game">
    <h4>Pirmo žaidėjo taškai: <?=$_GET['score1']?></h4>
    <h4>Antro žaidėjo taškai: <?=$_GET['score1']?></h4>
    <button type="submit" name='start' value='1'>Pradėti</button>
</div>

<?php
echo '<br>';
print_r($_GET);

if($_GET['start']){
    if($_GET['score1'] <30 && $_GET['score2'] <30){
        if($_GET['start']%2 != 0)
        {
            echo $_GET['player1'];
            $throw1 = rand(1,6);
            echo "<button type='submit' name='player1throw' value='$throw1'>Mesti</button>";
            echo 'Iškrito: ' .  $throw1;
            $_GET['score1'] +=$throw1;
        }
        else
        {
            echo $_GET['player2'];
            $throw2 = rand(1,6);
            echo "<button type='submit' name='player2throw' value='$throw2'>Mesti</button>";
            echo 'Iškrito: ' .  $throw2;
            $_GET['score2'] +=$throw2;

        }
    }
}


?>

</body>
</html>