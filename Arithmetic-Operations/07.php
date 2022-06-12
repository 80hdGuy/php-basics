<?php
//Acceleration
const a = -9.81;
//Time
const t = 10;
//Initial velocity
const vi = 0;
//Initial position
$xi = (int)readline("Give me object initial position (m): ");

echo "New position should be: " . (0.5 * a * pow(t,2) + vi * t + $xi) . PHP_EOL;





