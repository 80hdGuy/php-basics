<?php

//Exercise 1
function Word(string $word): string
{
    return $word;
}
echo Word("codelex") . PHP_EOL;

//Exercise 2
function Multiplication(int $base, int $multiplyiedBy): int
{
    return $base * $multiplyiedBy;
}
echo Multiplication(10, 5) . PHP_EOL;

//Exercise 3
$person = new stdClass();
$person->name = "Pēteris";
$person->surname = "Labais";
$person->age = 13;

function IsAdult(stdClass $someDude): bool{
    return $someDude->age >= 18;
}
function PrintResult(stdClass $person): void{
    $result = "Person has reached age of 18";
    if (!IsAdult($person))
        $result = "Person has NOT reached age of 18";
    echo $result . PHP_EOL;
}


//Exercise 4
function CreatePerson(string $name, string $surname, int $age) : stdClass {
    $person = new stdClass();
    $person->name = $name;
    $person->surname = $surname;
    $person->age = $age;
    return $person;
}
$people = [
    CreatePerson("Jānis", "Bērziņš", 12),
    CreatePerson("Egīls", "Mauriņš", 52),
    CreatePerson("Elvijs", "Jankovs", 30),
    CreatePerson("Rihards", "Jansons", 25),
];

foreach ($people as $person) {
    PrintResult($person);
}

//Exercise 5
$fruits = [
    ["Name" => "Banāns", "Weight" => 9],
    ["Name" => "Ābols", "Weight" => 20],
    ["Name" => "Bumbiers", "Weight" => 3],
    ["Name" => "Persiks", "Weight" => 15]
];

function IsFruitOverWeightForCheapShipping(array $fruit, float $weightLimit): bool
{
    return $fruit["Weight"] > $weightLimit;
}
//[[price over 10, normal price]]
$shippingCosts = [
    "Banāns" => [2, 1],
    "Ābols" => [3, 2],
    "Bumbiers" => [5, 3],
    "Persiks" => ["Štuka", 500]
];

foreach ($fruits as $fruit) {
    $cost = IsFruitOverWeightForCheapShipping($fruit, 10) ?
        $shippingCosts[$fruit["Name"]][0] :
        $shippingCosts[$fruit["Name"]][1];

    echo $fruit["Name"] . " maksās " . $cost . " EUR izsūtīt." . PHP_EOL;
}

//Exercise 6

$threeIntOneFloatOneString = [1, 2, 3, 3.6, "teksts"];
function DoublesIntegerNumber(int $number): int{
    return $number * 2;
}
for ($i = 0; $i < count($threeIntOneFloatOneString); $i++)
{
    if(is_integer($threeIntOneFloatOneString[$i]))
        echo DoublesIntegerNumber($threeIntOneFloatOneString[$i]) . PHP_EOL;
}


//Exercise 7
//Only certain guns can be purchased with license types.

//Create an object (person) that will be the requester to purchase a gun (object)
// Person object has a name, valid licenses (multiple) & cash.
// Guns are objects stored within an array.
// Each gun has license letter, price & name.

// Using PHP in-built functions determine if the requester (person) can buy a gun from the store.
function CreateGun( string $name, string $license, float $price) : stdClass
{
    $gun = new stdClass();
    $gun->name = $name;
    $gun->license = $license;
    $gun->price = $price;
    return $gun;
}
$guns = [
    CreateGun("nazis", "A", 4.99),
    CreateGun("AK-47", "B", 199.99),
    CreateGun("M1A4", "B", 149.99),
    CreateGun("Granāta", "C", 49.99),
    CreateGun("C4", "C", 99.99),
    CreateGun("Bazuka", "C", 499.99),
    CreateGun("Dakša", "A", 2.00),
    CreateGun("Pildspalva", "A", 0.50),
    CreateGun("Glock 17", "B", 74.99),
];


$person = new stdClass();
$person->name = "Rihards";
$person->licenses = ["A"];
$person->cash = 500.00;


$result = implode("\n",
    array_column(
        array_filter(
        $guns,
        fn($gun): bool => in_array($gun->license, $person->licenses) &&
                          $gun->price <= $person->cash),
    "name"));



echo $person->name . " can buy:" . PHP_EOL . $result;




