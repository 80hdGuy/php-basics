<?php




$randNumbers = array_fill(0,10,null);
$randNumbers = array_map(fn(): int => rand(1,100),$randNumbers);

$secondRandNumbers = $randNumbers;
$randNumbers[count($randNumbers) - 1] = -7;

echo "Array 1: " . implode(" ",$randNumbers) . PHP_EOL .
     "Array 2: " . implode(" ",$secondRandNumbers) . PHP_EOL;




