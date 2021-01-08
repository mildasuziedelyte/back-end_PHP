<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php

// echo '<br><br> 1 ---------------------<br><br>';

// 1. Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra įterpiamas į h1 tagą;

function insert_to_h1($text)
{
    echo "<h1>$text</h1>";
}

// echo '<br><br> 2 ---------------------<br><br>';

// 2. Parašykite funkciją su dviem argumentais, pirmas argumentas tekstas, įterpiamas į h tagą, o antrasis tago numeris (1-6). Rašydami šią funkciją remkitės pirmame uždavinyje parašytą funkciją;

// $text = 'kate';
// $h = rand(1,6);

function insert_to_h($text, $h)
{
    return "<h$h>$text</h$h>";
}

// echo insert_to_h($text, $h);

// echo '<br><br> 3 ---------------------<br><br>';

// 3. Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()). Visus skaitmenis stringe įdėkite į h1 tagą. Jegu iš eilės eina keli skaitmenys, juos į tagą reikią dėti kartu (h1 atsidaro prieš pirmą ir užsidaro po paskutinio) Keitimui naudokite pirmo uždavinio funkciją //veliau uzduotyje atsirado ir preg_replace_callback();

$string = md5(time());
echo $string . '<br>';
$tmp = '';
for ($i=0; $i < strlen($string); $i++) { 
    if(is_numeric($string{$i})){
        $tmp = $tmp . $string{$i};
        if (!isset($string{$i+1})) {
            echo insert_to_h1($tmp);
        }
    } else {
        echo insert_to_h1($tmp);
        $tmp = '';
    }
}

// echo '<br><br> 4 ---------------------<br><br>';

// 4. Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos argumentas dalijasi be liekanos (išskyrus vienetą ir patį save) Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių;

function countDividers(int $number){
    $count = 0;
    for ($i=2; $i < $number; $i++) { 
        if($number%$i == 0){
            $count++;
        }
    }
    return $count;
}

// echo 'Skaičius 12 be liekanos dalijasi iš ' . countDividers(12) . ' sveikų skaičių.';

// echo '<br><br> 5 ---------------------<br><br>';

// 5. Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77. Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo tvarka, panaudodami ketvirto uždavinio funkciją.

$masyvas5 = [];
foreach (range(1, 100) as $value) {
    $masyvas5[] = rand(33,77);
}

usort($masyvas5, function($a, $b) {
    return countDividers($b) <=> countDividers($a);
  });

// echo '<pre>';
// print_r ($masyvas5);

// echo '<br><br> 6 ---------------------<br><br>';

// 6. Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 333 iki 777. Naudodami 4 uždavinio funkciją iš masyvo ištrinkite pirminius skaičius.

$masyvas6 = [];
foreach (range(1, 100) as $value) {
    $masyvas6[] = rand(33,77);
}

// echo '<pre>';
// print_r ($masyvas6);

foreach ($masyvas6 as $key6 => $value6) {
    if (countDividers($value6) == 0) {
        unset($masyvas6[$key6]);
    }
}

// echo '<pre>';
// print_r ($masyvas6);

// echo '<br><br> 7 ---------------------<br><br>';

// 7. Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą, kurio visi, išskyrus paskutinį, elementai yra atsitiktiniai skaičiai nuo 0 iki 10, o paskutinis masyvas, kuris generuojamas pagal tokią pat salygą kaip ir pirmasis masyvas. Viską pakartokite atsitiktinį nuo 10 iki 30  kiekį kartų. Paskutinio masyvo paskutinis elementas yra lygus 0;

function rekursija ($ilgis){
    if ($ilgis == 0){
        return 0;
    }
    $length = rand(10,20);
    foreach (range(1, $length-1) as $value) {
        $array7[] = rand(0, 10);
    }
    $array7[] = rekursija($ilgis-1);
    return $array7;
}

echo '<pre>';
// print_r(rekursija(rand(10, č0)));

// echo '<br><br> 8 ---------------------<br><br>';

// 8. Suskaičiuokite septinto uždavinio elementų, kurie nėra masyvai, sumą.

function rekursija_sum($array){
    $sum = 0;
    foreach ($array as $value) {
        (!is_array($value)) ? $sum +=$value : $sum += rekursija_sum($value);
    }
    return $sum;
}

// echo '<br><br> 9 ---------------------<br><br>';

// 9. Sugeneruokite masyvą iš trijų elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 33. Jeigu tarp trijų paskutinių elementų yra nors vienas ne pirminis skaičius, prie masyvo pridėkite dar vieną elementą- atsitiktinį skaičių nuo 1 iki 33. Vėl patikrinkite pradinę sąlygą ir jeigu reikia pridėkite dar vieną elementą. Kartokite, kol sąlyga nereikalaus pridėti elemento. 

foreach (range(1,3) as $key => $value) {
    $array9[] = rand(1,33);
}

function rec9(&$array){
    $slice = array_slice($array, -3, 3, true);
    $countNepirminis = 0;
    foreach ($slice as $sliceValue) {
        if (countDividers($sliceValue)) {
            $array[] = rand(1,33);
            rec9($array);
            break;
        }
    }
    return;
}

// rec9($array9);
// print_r($array9);

// echo '<br><br> 10 ---------------------<br><br>';

// 10. Sugeneruokite masyvą iš 10 elementų, kurie yra masyvai iš 10 elementų, kurie yra atsitiktiniai skaičiai nuo 1 iki 100. Jeigu tokio masyvo pirminių skaičių vidurkis mažesnis už 70, suraskite masyve mažiausią skaičių (nebūtinai pirminį) ir prie jo pridėkite 3. Vėl paskaičiuokite masyvo pirminių skaičių vidurkį ir jeigu mažesnis nei 70 viską kartokite. 

foreach (range(1, 10) as $key => $_) {
    foreach (range(1, 10)  as $value) {
        $array10[$key][$value] = rand(1, 100);
    }
}

// print_r($array10);

function rec10(&$array10){
    $countPirminis = 0;
    $sumPirminis = 0;
    $min = PHP_INT_MAX;

    foreach ($array10 as $key => &$value10) {
        foreach ($value10 as $key => &$value1010) {
            if (!countDividers($value1010)) {
                $countPirminis++;
                $sumPirminis += $value1010;
            }
            if($value1010 < $min){
                $min = &$value1010;
            }
        }
    }

    if(($sumPirminis / $countPirminis) < 15){
        $min +=3;
        rec10($array10);
    } else {
        return;
    }
}

// echo '<br>-----------------<br>';
// rec10($array10);
// print_r($array10);