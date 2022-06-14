<?php
//Exercise 1
$items = [0,1,2];

echo array_sum($items) . "\n";

//Exercise 2
$person = [
    "name" => "John",
    "surname" => "Doe",
    "age" => 50
];
var_dump($person["name"], $person["surname"], $person["age"]);
echo PHP_EOL;
//Exercise 3

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;

var_dump(
    $person->name,
    $person->surname,
    $person->age
);

echo PHP_EOL;
//Exercise 4
$items = [ [
    [ "name" => "John", "surname" => "Doe", "age" => 50],
    ["name" => "Jane", "surname" => "Doe", "age" => 41]
] ];

echo $items[0][1]["name"] . " " . $items[0][1]["surname"] . " " . $items[0][1]["age"] . "\n";

//Exercise 5

echo $items[0][0]["name"] . " & " . $items[0][1]["name"] . " " .  $items[0][1]["surname"] . "'s" . "\n";


//John & Jane Doe`s






