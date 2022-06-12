<?php

$inputText = readline("Give me a number:");


function CheckOddEven(int $number){
    if($number != 0){
        if(fmod($number,2) == 0){
            return "Even Number";
        }else{
            return "Odd Number";
        }
    }
    return "Wrong input!";
}

echo CheckOddEven((int)$inputText) . PHP_EOL . "bye!" . PHP_EOL;
