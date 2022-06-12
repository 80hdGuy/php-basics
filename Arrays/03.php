<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

$needle = (int)readline("Enter the value to search for: ");

//todo check if an array contains a value user entered

echo !in_array($needle, $numbers, true) ? "Exists in array" : "Don't exist in array";



