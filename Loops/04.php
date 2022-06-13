<?php

$num = readline("Give me a whole number: ");

for ($i = 1; $i <= $num; $i++){
    switch (true){
        case fmod($i,3) == 0 && fmod($i,5) == 0://multiples of 3 and 5
            echo "FizzBuzz";
            break;
        case fmod($i,5) == 0://multiples of 5
            echo "Buzz";
            break;
        case fmod($i,3) == 0://multiples of 3
            echo "Fizz";
            break;
        default :
            echo $i;
    }
    if(fmod($i,20) == 0){
        echo PHP_EOL;
    }
    else{
        echo " ";
    }
}


