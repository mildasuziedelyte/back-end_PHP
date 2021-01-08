<?php

// 1. Sukurkite 4 kintamuosius, kurie saugotų jūsų vardą, pavardę, gimimo metus ir šiuos metus (nebūtinai tikrus). Parašykite kodą, kuris pagal gimimo metus paskaičiuotų jūsų amžių ir naudodamas vardo ir pavardės kintamuosius atspausdintų tokį sakinį :
// "Aš esu Vardenis Pavardenis. Man yra XX metai(ų)".

echo '<br> 1 užduotis ---------------------------------- <br><br>';

$name = 'Milda';
$surname = 'Suziedelyte';
$birthDate = 1990;
$thisYear = 2020;
$age = $thisYear - $birthDate;

echo "Aš esu $name $surname. Man yra $age metai(ų).";


// 2. Naudokite funkcija rand(). Sukurkite du kintamuosius ir naudodamiesi funkcija rand() jiems priskirkite atsitiktines reikšmes nuo 0 iki 4. Didesnę reikšmę padalinkite iš mažesnės. Atspausdinkite rezultatą jį suapvalinę iki 2 skaičių po kablelio.

echo '<br><br> 2 užduotis ---------------------------------- <br><br>';

$pirmasSkaicius = rand(0, 4);
$antrasSkaicius = rand(0, 4);

echo "Pirmas skaičius: $pirmasSkaicius";
echo '<br>';
echo "Antras skaičius: $antrasSkaicius";
echo '<br>';

if ($pirmasSkaicius > $antrasSkaicius && $antrasSkaicius != 0){
    echo (round($pirmasSkaicius/$antrasSkaicius, 2));
} else if ($pirmasSkaicius < $antrasSkaicius && $pirmasSkaicius != 0){
    echo (round($antrasSkaicius/$pirmasSkaicius, 2));
} elseif($pirmasSkaicius === $antrasSkaicius){
    echo 'Skaičiai yra vienodi, atsakymas 1.';
} else {
    echo 'Dalyba iš 0 negalima.';
}

// 3. Naudokite funkcija rand(). Sukurkite tris kintamuosius ir naudodamiesi funkcija rand() jiems priskirkite atsitiktines reikšmes nuo 0 iki 25. Raskite ir atspausdinkite kintąmąjį turintį vidurinę reikšmę.

echo '<br><br> 3 užduotis ---------------------------------- <br><br>';

$firstNumber = rand(0, 25);
$secondNumber = rand(0, 25);
$thirdNumber = rand(0, 25);

echo "First: $firstNumber";
echo '<br>';
echo "Second: $secondNumber";
echo '<br>';
echo "Thirds: $thirdNumber";
echo '<br>';

if ($firstNumber > $secondNumber && $firstNumber < $thirdNumber){
    echo "<br> $firstNumber";
} elseif ($secondNumber > $firstNumber && $secondNumber< $thirdNumber){
    echo "<br> $secondNumber";
} else {
    echo "<br> $thirdNumber";
}

// 4. Įvedami skaičiai -a, b, c –kraštinių ilgiai, trys kintamieji (naudokite ​rand()​ funkcija nuo 1 iki 10). Parašykite PHP programą, kuri nustatytų, ar galima sudaryti trikampį ir atsakymą atspausdintų. 

echo '<br><br> 4 užduotis ---------------------------------- <br><br>';

$q = rand(0, 10);
$w = rand(0, 10);
$z = rand(0, 10);

echo "First: $q";
echo '<br>';
echo "Second: $w";
echo '<br>';
echo "Thirds: $z";
echo '<br>';

if ($q != 0 && $w != 0 && $z != 0){
    if($q + $w > $z && $w + $z > $q && $q + $z > $w){
        echo 'Trikampį sudaryti galima.';    
    } else {
    echo 'Trikampio sudaryti negalima';
    }
}


//5. Sukurkite keturis kintamuosius ir ​rand()​ funkcija sugeneruokite jiems reikšmes nuo 0 iki 2. Suskaičiuokite kiek yra nulių, vienetų ir dvejetų. (sprendimui masyvo nenaudoti).

echo '<br><br> 5 užduotis ---------------------------------- <br><br>';

$g = rand(0, 2);
$h = rand(0, 2);
$i = rand(0, 2);
$j = rand(0, 2);

echo "First: $g";
echo '<br>';
echo "Second: $h";
echo '<br>';
echo "Third: $i";
echo '<br>';
echo "Fourth: $j";
echo '<br>';

$count0 = 0;
$count1 = 0;
$count2 = 0;

if($g == 0) $count0++; 
elseif ($g == 1) $count1++; 
else $count2++;


if($h == 0){
    $count0++;
} elseif ($h == 1){
    $count1++;
} else {
    $count2++;
}
if($i == 0){
    $count0++;
} elseif ($i == 1){
    $count1++;
} else {
    $count2++;
}
if($j == 0){
    $count0++;
} elseif ($j == 1){
    $count1++;
} else {
    $count2++;
}

echo '<br>';
echo "0: $count0";
echo '<br>';
echo "1: $count1";
echo '<br>';
echo "2: $count2";

// 6. Naudokite funkcija rand(). Sugeneruokite atsitiktinį skaičių nuo 1 iki 6 ir jį atspausdinkite atitinkame h tage. Pvz skaičius 3- rezultatas: <h3>3</h3>

echo '<br><br> 6 užduotis ---------------------------------- <br>';

$h = rand(1,6);
echo "<h$h>$h</h$h>";

// 7. Naudokite funkcija rand(). Atspausdinkite 3 skaičius nuo -10 iki 10. Skaičiai mažesni už 0 turi būti žali, 0 - raudonas, didesni už 0 mėlyni. 

echo '<br>7 užduotis ---------------------------------- <br>';

$k = rand(-10,10);
$l = rand(-10,10);
$m = rand(-10,10);


if($k<0){
    echo "<p style='color:green;'>$k</p>";
} elseif($k == 0){
    echo "<p style='color:red;'>$k</p>";
} else {
    echo "<p style='color:blue;'>$k</p>";
}

echo '<br>8 užduotis ---------------------------------- <br><br>';

// 8. Įmonė parduoda žvakes po 1 EUR. Perkant daugiau kaip už 1000 EUR taikoma 3 % nuolaida, daugiau kaip už 2000 EUR - 4 % nuolaida. Parašykite programą, kuri skaičiuos žvakių kainą ir atspausdintų atsakymą kiek žvakių ir kokia kaina perkama. Žvakių kiekį generuokite ​rand()​ funkcija nuo 5 iki 3000.

$zvakiuKiekis = rand(5, 3000);
$zvakiuKaina = 1;
$suma = $zvakiuKaina*$zvakiuKiekis;

if($suma > 1000){
    $naujaSuma = round($suma*0.97, 2);
    echo "Perkama $zvakiuKiekis uz $naujaSuma.";
} else if ($suma > 2000){
    $naujaSuma = round ($suma*0.96, 2);
    echo "Perkama $zvakiuKiekis uz $naujaSuma.";
} else {
    echo "Perkama $zvakiuKiekis zvakiu uz $suma.";
}

echo '<br><br><br> 9 užduotis ---------------------------------- <br><br>';

// 9. Naudokite funkcija rand(). Sukurkite tris kintamuosius su atsitiktinėm reikšmėm nuo 0 iki 100. Paskaičiuokite jų aritmetinį vidurkį. Ir aritmetinį vidurkį atmetus tas reikšmes, kurios yra mažesnės nei 10 arba didesnės nei 90. Abu vidurkius atspausdinkite. Rezultatus apvalinkite iki sveiko skaičiaus.

$n = rand(0, 100);
$o = rand(0, 100);
$p = rand(0, 100);

echo '<br>';
echo "Pirmas skaicius: $n";
echo '<br>';
echo "Antras skaicius: $o";
echo '<br>';
echo "Trecias skaicius: $p";
echo '<br>';

$aritmetinisVidurkis = round((($n+$o+$p)/3),0);
$suma = $n+$o+$p; 
$kiekis = 3;
$kitaSuma = $suma; //suma atmetant reiksmes mazesnes uz 10 ir didesnes uz 90

if($n<10 || $n>90){$kitaSuma -= $n; $kiekis--;}
if($o<10 || $o>90){$kitaSuma -= $o; $kiekis--;}
if($p<10 || $p>90){$kitaSuma -= $p; $kiekis--;}

echo "Aritmetinis vidurkis: $aritmetinisVidurkis.";
echo '<br>';
if($kiekis != 0){
    $kitasVidurkis = round($kitaSuma/$kiekis,0);
    echo "Vidurkis atmetus reikšmes: $kitasVidurkis.";
} else {
    echo 'Visi skaičiai buvo mažesni už 10 arba didesni už 90.';
}

echo '<br><br> 10 užduotis ---------------------------------- <br><br>';

// 10. Padarykite skaitmeninį laikrodį, rodantį valandas, minutes ir sekundes. Valandom, minutėm ir sekundėm sugeneruoti panaudokite funkciją rand(). Sugeneruokite skaičių nuo 0 iki 300. Tai papildomos sekundės. Skaičių pridėkite prie jau sugeneruoto laiko. Atspausdinkite laikrodį prieš ir po sekundžių pridėjimo ir pridedamų sekundžių skaičių.

$valandos = rand(0,23);
$minutes = rand(0,59);
$sekundes = rand(0,59);

echo "Laikrodis rodo: $valandos h : $minutes m : $sekundes s";

$laikasSekundemis = $valandos*60*60 + $minutes*60 +$sekundes;

$papildomasLaikas = rand(0,300);
echo '<br>';
echo "Sugeneruotas papildomas laikas : $papildomasLaikas";

$naujasLaikasSekundemis = $laikasSekundemis+$papildomasLaikas;

$naujosValandos = floor($naujasLaikasSekundemis / 3600);
if($naujosValandos>=24){
    $naujosValandos = $naujosValandos - 24;
}
$naujosMinutes = floor ($naujasLaikasSekundemis / 60 % 60);
$naujosSekundes = floor ($naujasLaikasSekundemis %60);

echo '<br>';
print "Naujas laikrodis rodo: $naujosValandos h : $naujosMinutes  m : $naujosSekundes  s";

echo '<br><br> 11 užduotis ---------------------------------- <br><br>';

// 11 Papildomas. Naudokite funkcija rand(). Sugeneruokite 6 kintamuosius su atsitiktinem reikšmėm nuo 1000 iki 9999. Atspausdinkite reikšmes viename strige, išrūšiuotas nuo didžiausios iki mažiausios, atskirtas tarpais. Naudoti ciklų ir masyvų NEGALIMA.

$a = rand(1000, 9999);
$b = rand(1000, 9999);
$c = rand(1000, 9999);
$d = rand(1000, 9999);
$e = rand(1000, 9999);
$f = rand(1000, 9999);

echo "$a, $b, $c, $d, $e, $f";

$tmp;

if ($a < $b){$tmp = $a; $a = $b; $b = $tmp;};
if ($b < $c){$tmp = $b; $b = $c; $c = $tmp;};
if ($c < $d){$tmp = $c; $c = $d; $d = $tmp;};
if ($d < $e){$tmp = $d; $d = $e; $e = $tmp;};
if ($e < $f){$tmp = $e; $e = $f; $f = $tmp;};
if ($a < $b){$tmp = $a; $a = $b; $b = $tmp;};
if ($b < $c){$tmp = $b; $b = $c; $c = $tmp;};
if ($c < $d){$tmp = $c; $c = $d; $d = $tmp;};
if ($d < $e){$tmp = $d; $d = $e; $e = $tmp;};
if ($a < $b){$tmp = $a; $a = $b; $b = $tmp;};
if ($b < $c){$tmp = $b; $b = $c; $c = $tmp;};
if ($c < $d){$tmp = $c; $c = $d; $d = $tmp;};
if ($a < $b){$tmp = $a; $a = $b; $b = $tmp;};
if ($b < $c){$tmp = $b; $b = $c; $c = $tmp;};
if ($a < $b){$tmp = $a; $a = $b; $b = $tmp;};

echo '<br>';
echo '<br>';
echo "$a $b $c $d $e $f";