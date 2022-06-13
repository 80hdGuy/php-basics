<?php

echo "Enter first word: \n";
$firstWord = readline();

echo "Enter second word: \n";
$secondWord = readline();

echo $firstWord .
    (str_repeat(".",30-strlen($secondWord)-strlen($firstWord))) .
    $secondWord . PHP_EOL;