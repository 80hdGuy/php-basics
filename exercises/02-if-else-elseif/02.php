<?php

//Exercise 1
$number = 10;
$text = "10";

if ($number == $text) {
    echo "same" . "\n";
} else {
    echo "different" . "\n";
}

//Exercise 2
$givenNumber = 50;

if ($givenNumber > 1 && $givenNumber < 100 ) {
    echo $givenNumber . " " . " IS in the 1 to 100 range" . "\n";
} else {
    echo $givenNumber . " " . " IS NOT in the 1 to 100 range" . "\n";
}

//Exercise 3
$someText  = "hello";

if($someText == "hello")
{
    echo "world" . "\n";
}
//Exercise 4
$givenNumber = 5;


if ($givenNumber > 2 && $givenNumber < 6 && (fmod($givenNumber,2) > 0.0))
{
    echo "Given number is grater than 2 and less than 6. and it is odd" . "\n";
}

//Exercise 5

$givenNumber = 50;
$z = 49;
$y = 51;
if($givenNumber > $z && $givenNumber < $y){
    echo "correct" . "\n";
}

//Exercise 6
$plateNumber = "DEV-666";
$resoult = "";
switch ($plateNumber)
{
    case "DEV-666":
        $resoult = "That's my car pate number!";
         break;
    default:
        $resoult = "Dont know that plate";
        break;
}
echo $resoult . "\n";


//Exercise 7

$number = 50;

switch (true)
{
    case  $number < 50:
        $resoult = "low";
        break;
    case $number >= 50 && $number <= 100:
        $resoult = "medium";
        break;
    case $number > 100:
        $resoult = "high";
        break;
}
echo $resoult . "\n";





