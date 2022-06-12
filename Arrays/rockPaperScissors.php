<?php

$cpuWinCounter = 0;
$playerWinCounter = 0;
$dictionary = ["Rock", "Paper", "Scissors", "Lizard", "Spock"];

const winningCombosForPlayer = [
    [3,4],
    [1,5],
    [2,5],
    [5,2],
    [3,1],
];
function isPlayerWinner(int $playerInput, int $cpuInput):bool {
    return (in_array($cpuInput, winningCombosForPlayer[$playerInput - 1]));
}

while ($playerWinCounter != 2 && $cpuWinCounter != 2) {
    echo "Your rounds won = $playerWinCounter" . " | My rounds won = $cpuWinCounter\n";
    echo "Rock = 1, Paper = 2 and Scissors = 3 Lizard = 4, Spock = 5", PHP_EOL;


    $playerInput = readline("Make your move: ");
    //Input validation
    if((int)$playerInput > 5 || $playerInput < 1){
        echo "[Error]: Wrong input! ({$playerInput})\n";
        continue;
    }

    $cpuInput = rand(1, 5);
    echo PHP_EOL . "My move: {$dictionary[$cpuInput - 1]}" . PHP_EOL;
    //game tie
    if ((int)$playerInput == $cpuInput) {
        echo "\nThis round is tie: " . $dictionary[$cpuInput - 1] . " = " . $dictionary[$cpuInput - 1] . PHP_EOL;
        continue;
    }
    //if Player won
    if (isPlayerWinner($playerInput, $cpuInput)) {
        $playerWinCounter++;
        echo "\nYou win this round:" . $dictionary[(int)$playerInput - 1] . " > " . $dictionary[$cpuInput - 1] . "\n\n";
        continue;
    }

    $cpuWinCounter++;
    echo "\nI win this round: " . $dictionary[$cpuInput - 1] . " > " . $dictionary[(int)$playerInput - 1] . "\n\n";
}

echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";
echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n";
echo "Your rounds won = $playerWinCounter" . " | My rounds won = $cpuWinCounter\n";
echo ($playerWinCounter > $cpuWinCounter? "You are cheating!" : "I win") . PHP_EOL;
