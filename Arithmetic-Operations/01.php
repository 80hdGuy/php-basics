<?php


$int1 = (integer)readline("Give me a integer:");
$int2 = (integer)readline("Give me another one:");

if($int1 == 15 || $int2 == 15 || $int1 + $int2 == 15 || $int1 - $int2 == 15 || $int2 - $int1 == 15)
    echo 'true' . PHP_EOL;
else
    echo 'false' . PHP_EOL;



