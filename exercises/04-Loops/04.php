<?php
//Exercise 1
$numbers = [];
for ($i = 0; $i <= 10; $i++)
{
    $numbers[$i] = $i;
}

foreach ($numbers as $number) {
    echo $number . " ";
}
echo PHP_EOL;

//Exercise 2
for ($i = 0; $i <= count($numbers); $i++)
{
    echo $numbers[$i] . " ";

}
echo PHP_EOL;

//Exercise 3
$x = 1;
while($x < 10)
{

    echo "codelex" . PHP_EOL;
    $x++;
}

//Exercise 4

foreach ($numbers as $number) {
    if ($number != 0 && fmod($number,3) == 0){
        echo $number . " ";
    }
}
echo PHP_EOL;

//Exercise 5
$person = new stdClass();
$people = [
    "Sētnieks" => new $person,
    "Skolotājs" => new $person,
    "Policists" => new $person,
];
$people["Sētnieks"]->name = "Jānis";
$people["Skolotājs"]->name = "Juris";
$people["Policists"]->name = "Gatis";

$people["Sētnieks"]->surname = "Bērziņš";
$people["Skolotājs"]->surname = "Lapiņš";
$people["Policists"]->surname = "Kalniņš";

$people["Sētnieks"]->age = 18;
$people["Skolotājs"]->age = 32;
$people["Policists"]->age = 50;

$people["Sētnieks"]->birthday = "02.05";
$people["Skolotājs"]->birthday = "02.06";
$people["Policists"]->birthday = "02.07";

foreach ($people as $person) {
    echo $person->name . " "
        . $person->surname . " "
        . $person->age . " "
        . $person->birthday . " "
        . PHP_EOL;
}

