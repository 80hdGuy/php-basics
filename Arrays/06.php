<?php


const wordList = [
    "horse",
    "door",
    "song",
    "trip",
    "backbone",
    "bomb",
    "round",
    "treasure",
    "garbage",
    "park",
    "pirate",
    "ski",
    "state",
    "whistle",
    "palace",
    "baseball",
    "coal",
    "queen",
    "dominoes",
    "photograph",
    "computer",
    "hockey",
    "aircraft",
    "hot",
    "dog",
    "salt",
    "pepper",
    "key",
    "iPad",
    "whisk",
    "frog",
    "lawnmower",
    "mattress",
    "pinwheel",
    "cake",
    "circus",
    "battery",
    "mailman",
    "cowboy",
    "password",
    "bicycle",
    "skate",
    "electricity",
    "thief",
    "teapot",
    "deep",
    "spring",
    "nature",
    "shallow",
    "toast",
    "outside",
    "America",
    "roller",
    "blading",
    "gingerbread",
    "man",
    "bowtie",
    "half",
    "spare",
    "wax",
    "light",
    "bulb",
    "platypus",
    "music"
];
$wordChars = str_split(strtolower(wordList[rand(0,count(wordList) -1)]));
$tempWordChars = $wordChars;
$hiddenWordChars = array_fill(0,count($wordChars),"_");
$misses = "";


function displayField(string $misses, array $hiddenWord){
    echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL. PHP_EOL;
    echo "Word:	". implode(" ", $hiddenWord) . PHP_EOL. PHP_EOL;
    echo "Misses:" . $misses . PHP_EOL. PHP_EOL;

}

function makeGuess(): string{
    return readline("Guess: ");
}

function isGuessRight(string $input, array $answer):bool {
    if (in_array(strtolower($input), $answer)) {
        return true;
    }
    return false;
}

function isGuessValid(string $guess): bool {
    if(strlen($guess) != 1 || $guess == "_"){
        return false;
    }
    return true;
}

while(in_array("_", $hiddenWordChars) && strlen($misses) < 5){
    DisplayField($misses, $hiddenWordChars);
    $guess = MakeGuess();
    if(!isGuessValid($guess)){
        echo "[ERROR] Make valid guess please :) \n";
        continue;
    }
    if(IsGuessRight($guess, $tempWordChars)){
        $hiddenWordChars[array_search($guess, $tempWordChars,true)] = $guess;
        $tempWordChars[array_search($guess, $tempWordChars,true)] = "_";


    }else{
        $misses .= $guess;
    }
}

echo (!in_array("_", $hiddenWordChars) ?
        "Good job! You guessed it! It's \"".implode($wordChars)."\"" :
        "Too bad. You ran out of attempts. It's \"".implode($wordChars)."\""
    ) . PHP_EOL;
