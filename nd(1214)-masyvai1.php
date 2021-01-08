<?php

echo '<br> 1 ---------------------<br><br>';

// 1. Sugeneruokite masyvą iš 30 elementų (indeksai nuo 0 iki 29), kurių reikšmės yra atsitiktiniai skaičiai nuo 5 iki 25.

$array = [];

for ($i=0; $i < 30 ; $i++) { 
    array_push($array, rand(5,25));
}

echo '<pre>';
print_r($array);



echo '<br> 2 ---------------------<br><br>';

// 2. Naudodamiesi 1 uždavinio masyvu:

echo '<br> 2a ---------------------<br><br>';

// a) Suskaičiuokite kiek masyve yra reikšmių didesnių už 10;

$count10 = 0;
foreach ($array as $value1) {
    ($value1 > 10) ? $count10++ : $count10;
}

echo '<br>';
echo $count10;

echo '<br><br> 2b ---------------------<br><br>';

// b)Raskite didžiausią masyvo reikšmę;

sort($array, SORT_NUMERIC | SORT_FLAG_CASE);
echo end($array[count($array)-1]);

echo '<br><br> 2c ---------------------<br><br>';

// c)Suskaičiuokite visų reikšmių sumą;

echo array_sum($array);

$sum = 0;
foreach ($array as $value2) {
    $sum += $value2;
}

echo '<br>';
echo $sum;

echo '<br><br> 2d ---------------------<br><br>';

// d)Sukurkite naują masyvą, kurio reikšmės yra 1 uždavinio masyvo reikšmes minus tos reikšmės indeksas;

$newArray = [];

foreach ($array as $index => $value3) {
    $newArray[] = $value3-$index;
    // array_push($newArray, $value3-$index);
}

echo '<pre>';
print_r($newArray);

echo '<br><br> 2e ---------------------<br><br>';

// e)Papildykite masyvą papildomais 10 elementų su reikšmėmis nuo 5 iki 25, kad bendras masyvas padidėtų iki indekso 39;

for ($i=0; $i < 10 ; $i++) { 
    $newArray[] = rand(5, 25);
    // array_push($newArray, rand(5, 25));
}

echo '<pre>';
print_r($newArray);

echo '<br><br> 2f ---------------------<br><br>';

// f) Iš masyvo elementų sukurkite du naujus masyvus. Vienas turi būti sudarytas iš neporinių indekso reikšmių, o kitas iš porinių;

$arrayEven = [];
$arrayOdd = [];

foreach ($newArray as $key => $value4) {
    ($key % 2 == 0) ? $arrayEven[] = $value4 : $arrayOdd[] = $value4;
    // ($key % 2 == 0) ? array_push($arrayEven, $value4) : array_push($arrayOdd, $value4);
}

echo '<pre>';
print_r($arrayEven);
echo '<br>';
echo '<pre>';
print_r($arrayOdd);

echo '<br><br> 2g ---------------------<br><br>';

// g) Masyvo elementus su poriniais indeksais padarykite lygius 0 jeigu jie didesni už 15;

foreach ($arrayEven as $key => $value5) {
    ($value5 > 15) ? $arrayEven[$key] = 0 : $arrayEven[$key] = $value5;
}

echo '<pre>';
print_r($arrayEven);

echo '<br><br> 2h ---------------------<br><br>';

// h)Suraskite pirmą (mažiausią) indeksą, kurio elemento reikšmė didesnė už 10;

$smallest = 0;
foreach ($array as $index => $value6) {
    if ($value6>10) {
        $smallest = $index;
        break;
    }
}

echo '<br>';
echo $smallest;

echo '<br><br> 2i---------------------<br><br>';

// i )Naudodami funkciją unset() iš masyvo ištrinkite visus elementus turinčius porinį indeksą;

foreach ($array as $index => $value7) {
    if ($index % 2 == 0) {
        unset($array[$index]);
    }
}

echo '<pre>';
print_r($array);



echo '<br><br> 3 ---------------------<br><br>';

// 3.Sugeneruokite masyvą, kurio reikšmės atsitiktinės raidės A, B, C ir D, o ilgis 200. Suskaičiuokite kiek yra kiekvienos raidės.

$array = [];

for ($i=0; $i < 200; $i++) { 
    $array[] = substr(str_shuffle("ABCD"),0, 1);
    // array_push($array, substr(str_shuffle("ABCD"),0, 1));
}

echo '<pre>';
print_r (array_count_values($array));

$countA = $countB = $countC = $countD = 0;
foreach ($array as $key => $value8) {
    ${'count' . $value8}++;
}

echo "A: $countA <br>B: $countB <br>C: $countC <br>D: $countD";



echo '<br><br> 4 ---------------------<br><br>';

// 4. Išrūšiuokite 3 uždavinio masyvą pagal abecėlę.

sort($array);
echo '<pre>';
print_r($array);



// echo '<br><br> 5 ---------------------<br><br>';

// 5. Sugeneruokite 3 masyvus pagal 3 uždavinio sąlygą. Sudėkite masyvus, sudėdami atitinkamas reikšmes. Paskaičiuokite kiek unikalių reikšmių kombinacijų gavote.

//sukuriam 3 naujus masyvus
$array0 = $array1 = $array2 = [];
for ($j=0; $j < 3; $j++) { 
   for ($i=0; $i < 200; $i++) { 
    array_push(${'array' . $j}, substr(str_shuffle("ABCD"),0, 1));
    }
}

// sudedam atitinkamas reiksmes
foreach ($array0 as $index0 => $value8) {
    $array0[$index0] = $value8 . $array1[$index0] . $array2[$index0];
}

//skaiciuojam unikalias, galima naudoti ir array_unique
$filteredArray = [];

foreach ($array0 as $key => $value9) {
    if (!in_array($value9, $filteredArray)) {
        array_push($filteredArray, $value9);
    }
}

echo count($filteredArray);




echo '<br><br> 6 ---------------------<br><br>';

// 6. Sugeneruokite du masyvus, kurių reikšmės yra atsitiktiniai skaičiai nuo 100 iki 999. Masyvų ilgiai 100. Masyvų reikšmės turi būti unikalios savo masyve (t.y. neturi kartotis).

$array1 = $array2 = [];

for ($i=1; $i < 3; $i++) { 
    while (count(${'array'.$i})<100){
        $number = rand(100, 999);
        if (!in_array($number, ${'array'.$i})) {
             array_push(${'array'.$i}, $number);
        }    
    }
}


// 7. Sugeneruokite masyvą, kuris būtų sudarytas iš reikšmių, kurios yra pirmame 6 uždavinio masyve, bet nėra antrame 6 uždavinio masyve.

$array3 = [];

foreach ($array1 as $key => $value10) {
    if(!in_array($value10, $array2)){
        $array3[] = $value10;
        // array_push($array3, $value10);
    }
}

echo '<pre>';
print_r($array3);



echo '<br><br> 8 ---------------------<br><br>';

// 8. Sugeneruokite masyvą iš elementų, kurie kartojasi abiejuose 6 uždavinio masyvuose.

$array4 = [];

foreach ($array1 as $key => $value11) {
    if(in_array($value11, $array2)){
        array_push($array4, $value11);
    }
}

echo '<pre>';
print_r($array4);



echo '<br><br> 9 ---------------------<br><br>';

// 9. Sugeneruokite masyvą, kurio indeksus sudarytų pirmo 6 uždavinio masyvo reikšmės, o jo reikšmės būtų iš antrojo masyvo.

$keys = array_keys($array1);
$values = array_values($array2);
$array5 = array_combine($keys, $values);

echo '<pre>';
// print_r($array1);
// echo '<br>';
// echo '<pre>';
// print_r($array2);
// echo '<br>';
// echo '<pre>';
// print_r($array5);



echo '<br><br> 10 ---------------------<br><br>';

// 10. Sugeneruokite 10 skaičių masyvą pagal taisyklę: Du pirmi skaičiai- atsitiktiniai nuo 5 iki 25. Trečias, pirmo ir antro suma. Ketvirtas- antro ir trečio suma. Penktas trečio ir ketvirto suma ir t.t.

$array6 = [];
for ($i=0; $i <10 ; $i++) { 
    if($i==0 || $i==1 ){
        $num = rand(5, 25);
        array_push($array6, $num);
    } else {
        $num = $array6[$i-1] + $array6[$i-2];
        array_push($array6, $num);
    }
}

echo '<pre>';
print_r($array6);



echo '<br><br> 11 ---------------------<br><br>';

// 11. Sugeneruokite 101 elemento masyvą su atsitiktiniais skaičiais nuo 0 iki 300. Reikšmes kurios tame masyve yra ne unikalios pergeneruokite iš naujo taip, kad visos reikšmės masyve būtų unikalios. Išrūšiuokite masyvą taip, kad jo didžiausia reikšmė būtų masyvo viduryje, o einant nuo jos link masyvo pradžios ir pabaigos reikšmės mažėtų. Paskaičiuokite pirmos ir antros masyvo dalies sumas (neskaičiuojant vidurinės). Jeigu sumų skirtumas (modulis, absoliutus dydis) yra didesnis nei | 30 | rūšiavimą kartokite. (Kad sumos nesiskirtų viena nuo kitos daugiau nei per 30).

//susigeneruojam 101 elemento masyva
$firstArray = [];
for ($i=0; $i < 101; $i++) { array_push($firstArray, rand(0, 300));}
// echo '<pre>';
// print_r($firstArray);

// pergeneruojam neunikalias reiksmes
$secondArray = [];
foreach ($firstArray as $key => $value) {
    (in_array($value, $secondArray)) ? $secondArray[$key] = rand(11, 15): array_push($secondArray, $value); }

// echo '<br>';
// echo '<pre>';
// print_r($secondArray);

//isrusiuojam
sort($secondArray);
// echo '<pre>';
// print_r($secondArray);

$sumIsBigger = true;

$biggest = end($secondArray);
unset($secondArray[sizeof($secondArray)-1]);

while($sumIsBigger){
    shuffle($secondArray);
    $chunks = array_chunk($secondArray, 50);
    $sum = array_sum($chunks[0]) - array_sum($chunks[1]);
    if ($sum < 30){
        $sumIsBigger = false;
    }
}

$begining = $chunks[0];
$end = $chunks[1];
sort($begining);
rsort($end);
$begining['50'] = $biggest;

$res = array_merge($begining, $end);

echo '<br>';
echo '<pre>';
print_r($res);

////VISAS SPRENDIMAS

$firstArray = [];
for ($i=0; $i < 101; $i++) { array_push($firstArray, rand(0, 300));}
$secondArray = [];
foreach ($firstArray as $key => $value) {
    (in_array($value, $secondArray)) ? $secondArray[$key] = rand(11, 15): array_push($secondArray, $value); }

sort($secondArray);

$sumIsBigger = true;

$biggest = end($secondArray);
unset($secondArray[sizeof($secondArray)-1]);

while($sumIsBigger){
    shuffle($secondArray);
    $chunks = array_chunk($secondArray, 50);
    $sum = array_sum($chunks[0]) - array_sum($chunks[1]);
    if ($sum < 30){
        $sumIsBigger = false;
    }
}

$begining = $chunks[0];
$end = $chunks[1];
sort($begining);
rsort($end);
$begining['50'] = $biggest;

$res = array_merge($begining, $end);

echo '<br>';
echo '<pre>';
print_r($res);
