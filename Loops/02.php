<?php

$num = (int)readline("Input base (i): ");
$exponent = (int)readline("Input exponent (n): ");
$result = 0;

for ($i = 1; $i < $exponent; $i++){
    $result += $num * $num;
}
echo $result . PHP_EOL;
