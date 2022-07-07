<?php

$randNum = rand(1, 100);
echo "I'm thinking of a number between 1-100.  Try to guess it." . PHP_EOL;

$tryCounter = 3;
$givenNumber = -1;
//while (true){
//    $givenNumber = (int)readline(">");
//    if ($givenNumber > $randNum)
//        echo PHP_EOL . "Sorry, you are too high. " . PHP_EOL;
//    else if($givenNumber < $randNum){
//        echo PHP_EOL . "Sorry, you are too low." . PHP_EOL;
//    }else{
//        echo PHP_EOL . "You guessed it!  What are the odds?!?";
//        break;
//    }
//    if($tryCounter == 1){
//        echo "I was thinking of " . $randNum . PHP_EOL;
//        break;
//    }
//    $tryCounter--;
//}

$givenNumber = (int)readline(">");
if ($givenNumber > $randNum)
    echo PHP_EOL . "Sorry, you are too high. I was thinking of " . $randNum . PHP_EOL;
else if ($givenNumber < $randNum) {
    echo PHP_EOL . "Sorry, you are too low. I was thinking of " . $randNum . PHP_EOL;
} else {
    echo PHP_EOL . "You guessed it!  What are the odds?!?";
};



