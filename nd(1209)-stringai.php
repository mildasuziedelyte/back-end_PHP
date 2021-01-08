<?php

echo '<br> 1 ---------------------<br><br>';
// 1. Sukurti du kintamuosius. Jiems priskirti savo mylimo aktoriaus vardą ir pavardę kaip stringus (Jonas Jonaitis). Atspausdinti trumpesnį stringą.

$name = 'Tilda';
$surname = 'Swinton';

echo mb_strlen($name) < mb_strlen($surname) ? $name : $surname;



echo '<br><br> 2 ---------------------<br><br>';
// 2. Sukurti du kintamuosius. Jiems priskirti savo mylimo aktoriaus vardą ir pavardę kaip stringus. Vardą atspausdinti tik didžiosiom raidėm, o pavardę tik mažosioms.

$name = 'Jake';
$surname = 'Gyllenhaal';

echo mb_strtoupper($name) . ' ' . mb_strtolower($surname);



echo '<br><br> 3 ---------------------<br><br>';

// 3. Sukurti du kintamuosius. Jiems priskirti savo mylimo aktoriaus vardą ir pavardę kaip stringus. Sukurti trečią kintamąjį ir jam priskirti stringą, sudarytą iš pirmų vardo ir pavardės kintamųjų raidžių. Jį atspausdinti.

$name = 'Cate';
$surname = 'Blanchett';
$name1 = mb_substr($name, 0, 1);
$surname1 = mb_substr($surname, 0, 1);

echo  "$name1 $surname1" ;



echo '<br><br> 4 ---------------------<br><br>';

// 4. Sukurti du kintamuosius. Jiems priskirti savo mylimo aktoriaus vardą ir pavardę kaip stringus. Sukurti trečią kintamąjį ir jam priskirti stringą, sudarytą iš trijų paskutinių vardo ir pavardės kintamųjų raidžių. Jį atspausdinti.

$name = 'Xavier';
$surname = 'Dolan';
$name3 = mb_substr($name, -3);
$surname = mb_substr($surname, -3);

echo "$name3 $surname";



echo '<br><br> 5 ---------------------<br><br>';

// 5. Sukurti kintamąjį su stringu: “An American in Paris”. Jame visas “a” (didžiąsias ir mažąsias) pakeisti žvaigždutėm “*”.  Rezultatą atspausdinti.

$string1 = 'An American in Paris';

echo str_ireplace('a', '*', $string1);

echo '<br><br> 6 ---------------------<br><br>';

// 6. Sukurti kintamąjį su stringu: “An American in Paris”. Suskaičiuoti visas “a” (didžiąsias ir mažąsias) raides. Rezultatą atspausdinti.

echo substr_count($string1, 'A') + substr_count($string1, 'a');



echo '<br><br> 7 ---------------------<br><br>';

// 7. Sukurti kintamąjį su stringu: “An American in Paris”. Jame ištrinti visas balses. Rezultatą atspausdinti. Kodą pakartoti su stringais: “Breakfast at Tiffany's”, “2001: A Space Odyssey” ir “It's a Wonderful Life”.

$string2 = 'An American in Paris';
$string3 = 'Breakfast at Tiffany\'s';
$string4 = '2001: A Space Odyssey';
$string5 = 'It\'s a Wonderful Life';

$vowels = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U');

echo str_replace($vowels, '', $string2);
echo '<br>';
echo str_replace($vowels, '', $string3);
echo '<br>';
echo str_replace($vowels, '', $string4);
echo '<br>';
echo str_replace($vowels, '', $string5);



echo '<br><br> 8 ---------------------<br><br>';

// 8. Stringe, kurį generuoja toks kodas: 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope'; Surasti ir atspausdinti epizodo numerį.

$string6 = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';
echo $string6;

$re = '/(\d)+/m';
preg_match_all($re, $string6, $matches, PREG_SET_ORDER, 0);

echo '<br>';
echo ('Epizodas nr: ' . $matches[0]['1']);

print_r($array1[3]);



echo '<br><br> 9 ---------------------<br><br>';

// 9. Suskaičiuoti kiek stringe “Don't Be a Menace to South Central While Drinking Your Juice in the Hood” yra žodžių trumpesnių arba lygių nei 5 raidės. Pakartokite kodą su stringu “Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale”.

$string6 = 'Don\'t Be a Menace to South Central While Drinking Your Juice in the Hood';

$splitString1 = explode(' ', $string6);

$count1 = 0;
for ($x = 0; $x < count($splitString1); $x++) {
  if (mb_strlen($splitString1[$x])<=5) $count1++;
}

echo $count1;
echo '<br>';

$string7 = 'Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale';

$splitString2 = explode(' ', $string7);

$count2 = 0;
for ($x = 0; $x < count($splitString2); $x++) {
  if (mb_strlen($splitString2[$x])<=5) $count2++;
}

echo $count2;




echo '<br><br> 10 ---------------------<br><br>';

// 10. Parašyti kodą, kuris generuotų atsitiktinį stringą iš lotyniškų mažųjų raidžių. Stringo ilgis 3 simboliai.

$length = 3;
$chars = 'abcdefghijklmnopqrstuvwxyz';

$str = '';
for ($i = 0; $i < $length; $i++) {
    $str .= $chars[mt_rand(0, strlen($chars) - 1)];
}

echo $str;



echo '<br><br> 11 ---------------------<br><br>';

// 11. Papildomas. Parašykite kodą, kuris generuotų atsitiktinį stringą su 10 atsitiktine tvarka išdėliotų žodžių, o žodžius generavimui imtų iš 9-me uždavinyje pateiktų dviejų stringų. Žodžiai neturi kartotis. (reikės masyvo)

$length2 = 10;
$wordsArray = explode(' ', ($string6 . ' ' . $string7));

$str2 = '';   
$wordsCountNewString = count(explode(' ', $str2))-1;

while ($wordsCountNewString < $length2){
    $wordNumber = rand(0, count($wordsArray)-1);
    if (!in_array($wordsArray["$wordNumber"], explode(" ", $str2))){
        $str2 .= $wordsArray["$wordNumber"];
        $wordsCountNewString = count(explode(" ", $str2));
        $str2 .= ' ';
    }    
}

echo '<br>';
echo $str2;

// $string10 = 'a Juice sultis While Central Pietų nereikia Hood gąsdinti Centro';

// echo str_word_count('a Juice sultis While Central Pietų nereikia Hood gąsdinti Centro'); 
