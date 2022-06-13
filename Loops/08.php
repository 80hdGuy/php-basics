<?php

$minNum = readline("Min? ");
$maxNum = readline("Max? ");
$numList = range($minNum, $maxNum);

for ($i = $minNum; $i <= $maxNum; $i++){
    echo implode($numList) . PHP_EOL;
    $itemToSwap = array_shift($numList);
    $numList[] = $itemToSwap;
}



