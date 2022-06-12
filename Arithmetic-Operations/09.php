<?php

$metricWeight = (float)readline("Give me your weight (kg): ");
$metricHeight = (float)readline("Give me your height (cm): ");

$bmi = ($metricWeight * 2.2046) * 703 / pow(($metricHeight / 2.54),2);

if($bmi < 18.5)
    echo "You are underweight!" . PHP_EOL;
elseif ($bmi > 25)
    echo "You are overweight!" . PHP_EOL;
else
    echo "You are in good.. for the time being.." . PHP_EOL;
