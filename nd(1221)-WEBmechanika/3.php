<!-- // 3. Perdarykite 2 uždavinį taip, kad spalvą būtų galimą įrašyti į laukelį ir ją išsiųsti mygtuku GET metodu formoje. -->

<a style="color:white;" href="?">Nuoroda i juoda</a><br>

<form action="" method="get">
    <label style="color:white;" for="color">Enter color</label>
    <input type="text" placeholder="Enter color, eg. ff1234" name="color"><br>
    <button type="submit">Send</button>
</form>


<?php

echo '<style>html{background-color:black;}</style>';
if(!empty($_GET) && isset($_GET['color'])){
    echo '<style>html{background-color:#'.$_GET['color'].';}</style>'; 
}

?>