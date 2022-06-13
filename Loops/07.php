<?php

$desiredSum = (int)readline("Desired sum: ");
if($desiredSum < 2 || $desiredSum > 12){
    echo "Not possible.\n";
    return;
}
do{
    $diceOneVal = rand(1,6);
    $diceTwoVal = rand(1,6);
    $sum = $diceOneVal + $diceTwoVal;
    echo $diceOneVal . " and " . $diceTwoVal . " = " . $sum . PHP_EOL;
}while($sum != $desiredSum);

