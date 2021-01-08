<?php
// CIKLAI

echo '<br> 1----------------------<br><br>';

// 1 Naršyklėje nupieškite linija iš 400 “*”. 

for ($i=0; $i < 400; $i++) { 
    echo '*';
}



echo '<br><br> 1a ---------------------<br><br>';

// 1a Naudodami css stilių “suskaldykite” liniją taip, kad visos žvaigždutės matytųsi ekrane;

$stars = '';
for ($i=0; $i < 400; $i++) { 
    $stars .= '*';
}
echo "<p style=\"word-wrap: break-word;\">$stars</p>";



echo '<br><br> 1b ---------------------<br><br>';

// 1b Programiškai “suskaldykite” žvaigždutes taip, kad vienoje eilutėje nebūtų daugiau nei 50 “*”; 

$numberOfStars = 400;
$starsInOneLine = 50;

for ($i=0; $i < ($numberOfStars/$starsInOneLine); $i++) { 
    for ($j=0; $j <$starsInOneLine ; $j++) { 
        echo '*';
    }
    echo "<br>";
}



echo '<br><br> 2 ---------------------<br><br>';

// 2. Sugeneruokit 300 atsitiktinių skaičių nuo 0 iki 300, atspausdinkite juos atskirtus tarpais ir suskaičiuokite kiek tarp jų yra didesnių už 150. Skaičiai didesni nei 275 turi būti raudonos spalvos.

$count50=0;

for ($i = 0; $i < 300; $i++) { 
    $number = rand(0, 300);
    if ($number > 50){
        $count50++;
    }
    if ($number > 275){
        echo "<span style=\"color:red\">$number</span>\n";
    } else echo "$number\n";
}

echo '<br><br>';
echo 'Skaičių virš 50: ' . $count50;



echo '<br><br> 3 ---------------------<br><br>';

// 3 Vienoje eilutėje atspausdinkite visus skaičius nuo 1 iki atsitiktinio skaičiaus tarp 3000 - 4000 pvz(aibė nuo 1 iki 3476), kurie dalijasi iš 77 be liekanos. Skaičius atskirkite kableliais. Po paskutinio skaičiaus kablelio neturi būti. Jeigu reikia, panaudokite css, kad visi rezultatai matytųsi ekrane.

$from = 1;
$to = rand(3000, 4000);
while ($from <= $to){
    if($from % 77 == 0) {
        echo ($from == 77 ? $from : ', ' . $from);
    }
    $from++;
}


echo '<br><br> 4 ---------------------<br><br>';

// 4. Nupieškite kvadratą iš “*”, kurio kraštines sudaro 100 “*”. Panaudokite css stilių, kad kvadratas ekrane atrodytų kvadratinis.
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * *
// * * * * * * * * * * *

$square = '';

for ($i=0; $i < 100; $i++) { 
    for ($j=0; $j < 100; $j++) { 
        $square.='*';
    }
    $square.= '<br>';
}

echo "<div style=\"line-height:0.5;\">$square</div>";



echo '<br><br> 5 ---------------------<br><br>';

// 5. Prieš tai nupieštam kvadratui nupieškite raudonas istrižaines.

$square = '';
$size = 100;

for ($i=0; $i < 100; $i++) { 
    for ($j=0; $j < $size; $j++) { 
        if ($j==$i || $j==($size-$i-1)){
            $square .= "<span style=\"color:red\">*</span>";
        } else {
            $square.='*';
        } 
    }
    $square.= '<br>';
}

echo "<div style=\"line-height:0.5;\">$square</div>";



echo '<br><br> 6 ---------------------<br><br>';

// 6. Metam monetą. Monetos kritimo rezultatą imituojam rand() funkcija, kur 0 yra herbas, o 1 - skaičius. Monetos metimo rezultatus išvedame į ekraną atskiroje eilutėje: “S” jeigu iškrito skaičius ir “H” jeigu herbas. Suprogramuokite keturis skirtingus scenarijus kai monetos metimą stabdome:
// a Iškritus herbui;
// b Tris kartus iškritus herbui;
// c Tris kartus iš eilės iškritus herbui;

echo '<br> 6a ---------------------<br>';

do {
     $metimas = rand(0,1);
     echo ($metimas == 0) ? 'H <br>' : 'S <br>';
} while ($metimas != 0);

echo '<br> 6b ---------------------<br>';

$countH=0;
do {
    $metimas = rand(0,1);
    echo ($metimas == 0) ? 'H <br>' : 'S <br>';
    if($metimas==0){
        $countH++;
    }
} while ($countH<3);

echo '<br> 6c ---------------------<br>';

$countH=0;
do {
    $metimas = rand(0,1);
    echo ($metimas == 0) ? 'H <br>' : 'S <br>';
    ($metimas == 0) ? $countH++ : $countH = 0;
} while ($countH<3);




echo '<br> 7 ---------------------<br>';

// 7. Kazys ir Petras žaidžiai šaškėm. Petras surenka taškų kiekį nuo 10 iki 20, Kazys surenka taškų kiekį nuo 5 iki 25. Vienoje eilutėje išvesti žaidėjų vardus su taškų kiekiu ir “Partiją laimėjo: ​laimėtojo vardas​”. Taškų kiekį generuokite funkcija ​rand()​. Žaidimą laimi tas, kas greičiau surenka 222 taškus. Partijas kartoti tol, kol kažkuris žaidėjas pirmas surenka 222 arba daugiau taškų.

$kazioSuma = 0;
$petroSuma = 0;

while ($kazioSuma <222 && $petroSuma <222) {
    $kazioRez = rand(10,20);
    $petroRez = rand(5,25);
    $kazioSuma += $kazioRez;
    $petroSuma += $petroRez;
    echo ($kazioRez > $petroRez) ? "Kazio taškai: $kazioSuma, Petro taškai: $petroSuma. Partiją laimėjo: ​Kazys, suma: $kazioSuma <br>" : "Kazio taškai: $kazioSuma, Petro taškai: $petroSuma. Partiją laimėjo: ​Petras, suma: $petroSuma <br> ​";
}

echo "--- LAIMETOJAS --- ";
echo ($kazioRez > $petroRez) ? "KAZYS" : "PETRAS";

do {
    $kazioRez = rand(10,20);
    $petroRez = rand(5,25);
    $kazioSuma += $kazioRez;
    $petroSuma += $petroRez;
    echo ($kazioRez > $petroRez) ? "Kazio taškai: $kazioSuma, Petro taškai: $petroSuma. Partiją laimėjo: ​Kazys, suma: $kazioSuma <br>" : "Kazio taškai: $kazioSuma, Petro taškai: $petroSuma. Partiją laimėjo: ​Petras, suma: $petroSuma <br> ​";
} while ($kazioSuma <222 && $petroSuma <222);




echo '<br> 8 ---------------------<br><br>';

// 8. Reikia nupaišyti pilnavidurį rombą, taip pat, kaip ir pilnavidurį kvadratą (https://lt.wikipedia.org/wiki/Rombas), kurio aukštis 21 eilutė. Reikia padaryti, kad kiekviena rombo žvaigždutė būtų atsitiktinės RGB spalvos (perkrovus puslapį spalvos turi keistis).

$size = 21;

for ($i = 0; $i < $size; $i++) {
    for ($j=0; $j < (($i<$size/2) ? $size/2-$i-1 : $i-$size/2); $j++) { 
        echo "<span style=\"font-family: monospace; font-size:50px; line-height:0.6;\">&nbsp;</span>";
    }
    for ($k=0; $k < (($i<$size/2) ? $i*2+1: $size-($i - floor($size/2))*2) ; $k++) { 
        $colorR = rand(0, 255);
        $colorG = rand(0, 255);
        $colorB = rand(0, 255);
        echo "<span style=\"font-family: monospace; font-size:50px; line-height:0.6; color: rgb($colorR, $colorG, $colorB);\">*</span>";
    }
    echo '<br>';
}



echo '<br> 9 ---------------------<br><br>';

// 9 Panaudokite funkciją microtime(). Paskaičiuokite kiek sekundžių užtruks kodą:
// $c = "10 bezdzioniu suvalge 20 bananu.";
// Įvykdyti 1 milijoną kartų ir palyginkite kiek užtruks įvykdyti kodą: 
// $c = '10 bezdzioniu suvalge 20 bananu.';
// (Stringas viengubose ir dvigubose kabutėse)

$micro1 = microtime(true);

for ($i=0; $i < 1000000; $i++) { 
    $c = "10 bezdzioniu suvalge 20 bananu.";
}

$micro2 = microtime(true);

for ($i=0; $i < 1000000; $i++) { 
    $c = '10 bezdzioniu suvalge 20 bananu.';
}

$micro3 = microtime(true);

echo $micro2-$micro1;
echo '<br>';
echo $micro3-$micro2;



echo '<br> 10 ---------------------<br><br>';

// 10 Sumodeliuokite vinies kalimą. Įkalimo gylį sumodeliuokite pasinaudodami rand() funkcija. Vinies ilgis 8.5cm (pilnai sulenda į lentą).
// “Įkalkite” 5 vinis mažais smūgiais. Vienas smūgis vinį įkala 5-20 mm. Suskaičiuokite kiek reikia smūgių.
// “Įkalkite” 5 vinis dideliais smūgiais. Vienas smūgis vinį įkala 20-30 mm, bet yra 50% tikimybė (pasinaudokite rand() funkcija tikimybei sumodeliuoti), kad smūgis nepataikys į vinį. Suskaičiuokite kiek reikia smūgių.

echo '<br> 10a ---------------------<br><br>';

$viniesIlgis = 8.5*10;
$count = 0;

for ($i=0; $i < 5; $i++) { 
    $viniesIlgis = 8.5*10;
    while ($viniesIlgis >0){
        $smugis = rand(5, 20);
        ($smugis > $viniesIlgis) ? $viniesIlgis = 0 : $viniesIlgis-=$smugis;        
        $count++;
    }
}

echo $count;


echo '<br> 10b ---------------------<br><br>';

$viniesIlgis = 8.5*10;
$count = 0;

for ($i=0; $i < 5; $i++) { 
    $viniesIlgis = 8.5*10;
    while ($viniesIlgis >0){
        $arPataikys = rand(0, 1);
        ($arPataikys == 1) ? $smugis = rand(20, 30) : $smugis = 0;          
        ($smugis > $viniesIlgis) ? $viniesIlgis = 0 : $viniesIlgis-=$smugis;  
        $count++; 
        // ($smugis != 0) ? $count++ : $count = $count;
    }
}

echo $count;



// echo '<br> 11 ---------------------<br><br>';

// 11 Sugeneruokite stringą, kurį sudarytų 50 atsitiktinių skaičių nuo 1 iki 200, atskirtų tarpais. Skaičiai turi būti unikalūs (t.y. nesikartoti). Sugeneruokite antrą stringą, pasinaudodami pirmu, palikdami jame tik pirminius skaičius (t.y tokius, kurie dalinasi be liekanos tik iš 1 ir patys savęs). Skaičius stringe sudėliokite didėjimo tvarka, nuo mažiausio iki didžiausio.

// $randomSkaiciai = substr(str_shuffle(str_repeat(implode(' ', range('1', '200')), 3)), 0, 50);

// $randomSkaiciai = '';
// for ($i=0; $i < 50; $i++) { 
//     $randomSkaicius = rand(0, 200);
//     if(!in_array($randomSkaicius, explode(' ', $randomSkaiciai))){
//         ($i == 0) ? $randomSkaiciai .= rand(0, 200): $randomSkaiciai .= ' ' . rand(0, 200);
//     }
// }

// echo 'Pirmas stringas: ' . $randomSkaiciai;

// $naujasStringas=' ';
// $array = explode(' ', $randomSkaiciai);

// for ($i=0; $i < count($array); $i++) { 
//     $isPrime = false;
//     for ($j=2; $j < ($array[$i]); $j++) { 
//         if (($array[$i] % $j) == 0) {
//             $isPrime = false;
//             break;
//         } else {
//             $isPrime = true;
//         }
//     }
//     if($isPrime){
//         ($i == 0) ? $naujasStringas .= "$array[$i]" : $naujasStringas .= ' ' . "$array[$i]";
//     }
// }

// echo '<br>';
// echo 'Antras stringas: ' . $naujasStringas;

//// NEPADARYTAS IKI GALO, KARTOJASI STRINGE IR NEISRUSIUOTA