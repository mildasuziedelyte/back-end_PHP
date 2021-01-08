<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php

echo '<br> 1 ---------------------<br><br>';

// 1. Sugeneruokite masyvą iš 10 elementų, kurio elementai būtų masyvai iš 5 elementų su reikšmėmis nuo 5 iki 25.

$array1 = [];
foreach (range(0, 9) as $value1) {
    $array111=[];
    foreach (range(0, 4) as $value111) {
        $array111[] = rand(5, 25);
    }
    $array1[] = $array111;
}

// echo '<pre>';
// print_r($array1);



echo '<br><br> 2 ---------------------<br><br>';

// 2. Naudodamiesi 1 uždavinio masyvu:

echo '<br><br> 2a ---------------------<br><br>';

// a) Suskaičiuokite kiek masyve yra elementų didesnių už 10;

$count10 = 0;
foreach ($array1 as $value) {
    foreach ($value as $value1) {
        ($value1 > 10) ? $count10++ : $count10;
    }
}

// echo $count10;

echo '<br><br> 2b ---------------------<br><br>';

// b) Raskite didžiausio elemento reikšmę;

$biggest = PHP_INT_MIN;
foreach ($array1 as $value) {
    foreach ($value as $value1) {
        if ($value1 > $biggest){
            $biggest = $value1; 
        }
    }
}

// echo $biggest;

echo '<br><br> 2c ---------------------<br><br>';

// c) Suskaičiuokite kiekvieno antro lygio masyvų su vienodais indeksais sumas (t.y. suma reikšmių turinčių indeksą 0, 1 ir t.t.)

$sums = ['0' => 0, '1' => 0,'2' => 0,'3' => 0,'4' => 0];
foreach ($array1 as $value) {
    foreach ($value as $key => $value1) {
        $sums[$key] = $sums[$key] + $value1;
    }
}

// echo '<pre>';
// print_r($sums);

echo '<br><br> 2d ---------------------<br><br>';

// d) Visus masyvus “pailginkite” iki 7 elementų

foreach ($array1 as $key => $value) {
    foreach (range(0,1) as $value1) {
        $value[]=rand(5, 25);
        $array1[$key] = $value;
    }   
}

// echo '<pre>';
// print_r($array1);

echo '<br><br> 2e ---------------------<br><br>';

// e) Suskaičiuokite kiekvieno iš antro lygio masyvų elementų sumą atskirai ir sumas panaudokite kaip reikšmes sukuriant naują masyvą. T.y. pirma naujo masyvo reikšmė turi būti lygi mažesnio masyvo, turinčio indeksą 0 dideliame masyve, visų elementų sumai.

////galima panaudoti arraysum

$sumArray = [];
foreach ($array1 as $value) {
    $sum = 0;
    foreach ($value as $value1) {
        $sum += $value1;
    }
    $sumArray[] =$sum;
}

// echo '<pre>';
// print_r($sumArray);



echo '<br><br> 3 ---------------------<br><br>';

// 3. Sukurkite masyvą iš 10 elementų. Kiekvienas masyvo elementas turi būti masyvas su atsitiktiniu kiekiu nuo 2 iki 20 elementų. Elementų reikšmės atsitiktinai parinktos raidės iš intervalo A-Z. Išrūšiuokite antro lygio masyvus pagal abėcėlę (t.y. tuos kur su raidėm).

$array3 = [];
foreach (range(0, 9) as $value) {
    $array33 = [];
    $array33length = rand(2,20);
    $range = range('A', 'Z');
    foreach (range(1, $array33length) as $value1) {
        $index = array_rand($range);
        $array33[] = $range[$index];
    }
    sort($array33);
    $array3[] = $array33;
}

// echo '<pre>';
// print_r($array3);



echo '<br><br> 4 ---------------------<br><br>';

// 4. Išrūšiuokite trečio uždavinio pirmo lygio masyvą taip, kad elementai kurių masyvai trumpiausi eitų pradžioje.

foreach($array3 as $value4) {
    $sorted[count($value4)] = $value4;
}

////array_multisort($kitasmasyvas);
////sort($arrRez);

// ksort($sorted);
// echo '<pre>';
// print_r($sorted);



echo '<br><br> 5 ---------------------<br><br>';

// 5. Sukurkite masyvą iš 30 elementų. Kiekvienas masyvo elementas yra masyvas [user_id => xxx, place_in_row => xxx] user_id atsitiktinis unikalus skaičius nuo 1 iki 1000000, place_in_row atsitiktinis skaičius nuo 0 iki 100. 

// $array1 = [];
foreach (range(0, 29) as $value5) {
    $array55 = [];
    $array55['user_id'] = rand(1, 1000000);
    $array55['place_in_row'] = rand(1, 100);
    $array5[] = $array55;
}

// echo '<pre>';
// print_r($array5);



echo '<br><br> 6 ---------------------<br><br>';

// 6. Išrūšiuokite 5 uždavinio masyvą pagal user_id didėjančia tvarka. Ir paskui išrūšiuokite pagal place_in_row mažėjančia tvarka.

$userIDs = array_column($array5, 'user_id');
array_multisort($userIDs, SORT_ASC, $array5);
echo '<pre>';
print_r($array5);

$placeInRow = array_column($array5, 'place_in_row');
array_multisort($placeInRow, SORT_DESC, $array5);
echo '<pre>';
print_r($array5);


echo '<br><br> 7 ---------------------<br><br>';

// 7. Prie 6 uždavinio masyvo antro lygio masyvų pridėkite dar du elementus: name ir surname. Elementus užpildykite stringais iš atsitiktinai sugeneruotų lotyniškų raidžių, kurių ilgiai nuo 5 iki 15.

// echo substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"),0, 3); 

foreach ($array5 as $key => $value) {
    $value['name'] = ucfirst(substr(str_shuffle(str_repeat(implode('', range('a', 'z')), 3)), 0, rand(5, 15)));
    $value['surname'] = ucfirst(substr(str_shuffle(str_repeat(implode('', range('a', 'z')), 3)), 0, rand(5, 15)));
    $array5[$key] = $value;
}

// echo '<pre>';
// print_r($array5);



echo '<br><br> 8 ---------------------<br><br>';

// 8. Sukurkite masyvą iš 10 elementų. Masyvo reikšmes užpildykite pagal taisyklę: generuokite skaičių nuo 0 iki 5. Ir sukurkite tokio ilgio masyvą. Jeigu reikšmė yra 0 masyvo nekurkite. Antro lygio masyvo reikšmes užpildykite atsitiktiniais skaičiais nuo 0 iki 10. Ten kur masyvo nekūrėte reikšmę nuo 0 iki 10 įrašykite tiesiogiai.

foreach (range(0, 9) as $value) {
    $rand = rand(0, 5);
    if($rand === 0){
        $masyvas[] = rand(0, 10);
    } else {
        $array8 = [];
        foreach (range(1, $rand) as $value){
            $array8[] = rand(0,10);
        }
        $masyvas[] = $array8;
    }
}

// echo '<pre>';
// print_r($masyvas);



echo '<br><br> 9 ---------------------<br><br>';

// 9. Paskaičiuokite 8 uždavinio masyvo visų reikšmių sumą ir išrūšiuokite masyvą taip, kad pirmiausiai eitų mažiausios masyvo reikšmės arba jeigu reikšmė yra masyvas, to masyvo reikšmių sumos.

//negerai padaryta

// foreach ($masyvas as $key => $value) {
//     if(is_array($value)){
//         $sum = 0;
//         foreach ($value as $value9) {
//             $sum += $value9;
//         }
//         $masyvas[$key] = $sum;
//     }
// }
// sort($masyvas, SORT_NUMERIC);



echo '<br><br> 10 ---------------------<br><br>';

// 10. Sukurkite masyvą iš 10 elementų. Jo reikšmės masyvai iš 10 elementų. Antro lygio masyvų reikšmės masyvai su dviem elementais value ir color. Reikšmė value vienas iš atsitiktinai parinktų simbolių: #%+*@裡, o reikšmė color atsitiktinai sugeneruota spalva formatu: #XXXXXX. Pasinaudoję masyvų atspausdinkite “kvadratą” kurį sudarytų masyvo reikšmės nuspalvintos spalva color.

foreach (range(0, 9) as $key1 => $value1) {
    $masyvas1010 = [];
    foreach (range(0, 9) as $key2 => $value2) {
        $masyvas101010 = [];
        foreach (range(0, 9) as $key2 => $value3) {
            $masyvas101010['value'] = explode(' ', '# % + * @ 裡')[rand(0, 5)];
            $masyvas101010['color'] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);;
        }
        $masyvas1010[] = $masyvas101010;
    }
    $masyvas10[] = $masyvas1010;
}

foreach ($masyvas10 as $key => $value4) {
    foreach ($value4 as $key => $value5) {
        $value = $value5['value'];
        $color = $value5['color'];
        echo "<span style=\"color: $color;\"> $value </span>";
    }
    echo '<br>';
}



echo '<br><br> 11 ---------------------<br><br>';

// 11. Duotas kodas, generuojantis masyvą:

// Reikia apskaičiuoti kiek buvo $sk1 ir $sk2 naudojantis matematika.
// NEGALIMA! naudoti jokių palyginimo operatorių (if-else, swich, ()?:)
// NEGALIMA! naudoti jokių regex ir string funkcijų.
// GALIMA naudotis tik aritmetiniais veiksmais ir matematinėmis funkcijomis iš skyrelio: https://www.php.net/manual/en/ref.math.php

// Jeigu reikia, kodo patogumui galima panaudoti įvairias funkcijas, bet sprendimo pagrindas turi būti matematinis.

// Atsakymą reikia pateikti formatu:
// echo '<h3>Skaičius 789 yra pakartotas '.$sk1.' kartų, o skaičius 123 - '.$sk2.' kartų.</h3>';

// Kur rudi skaičiai yra pakeisti skaičiais $a ir $b generuojamais kodo.

do {
    $a = rand(0, 1000);
    echo $a . '<br>';
    $b = rand(0, 1000);
    echo $b . '<br>';
} while ($a == $b);
echo '---------------<br>';
$long = rand(10,30);
echo $long . '<br>';

$sk1 = $sk2 = 0;
echo '<h3>Skaičiai '.$a.' ir '.$b.'</h3>';
$c = [];
for ($i=0; $i<$long; $i++) {
    $c[] = array_rand(array_flip([$a, $b]));
}
echo '<h4>Masyvas:</h4>';
echo '<pre>';
print_r($c);
echo '</pre>';

