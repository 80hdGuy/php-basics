<?php

$givenNumber = (int)readline("Give me number: ");
$result = 1;
for ($i = 1; $i <= $givenNumber; $i++) {
    $result *= $i;
}
echo "Product of numbers from 1 up to " . $givenNumber . " is "
    . $result;


