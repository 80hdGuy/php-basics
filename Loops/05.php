<?php

echo "Welcome to Piglet!\n";
$score = 0;
$isGameGoing = true;
do{
    $roll = rand(($score != 0? 1 : 2 ), 6);
    $score += $roll;
    echo "You rolled a {$roll}!\n";
    if($roll == 1){
        $score = 0;
        break;
    }
    $isGameGoing = (readline("Roll again? ") == "yes");

}while($isGameGoing);

echo "You got {$score} points.";
