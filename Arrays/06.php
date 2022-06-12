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
//wordList[rand(0,count(wordList) -1)]
$word = "dog";
$wordLength = strlen($word);
$misses = "";
$hiddenWord = implode(array_fill(0,$wordLength,'_'));

function displayField(string $misses, string $hiddenWord){
    echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL. PHP_EOL;
    echo "Word:	". implode(" ", str_split($hiddenWord)) . PHP_EOL. PHP_EOL;
    echo "Misses:" . $misses . PHP_EOL. PHP_EOL;

}

function makeGuess(): string{
    return readline("Guess: ");
}

function isGuessRight(string $input, string $answer):bool {
    if (in_array($input,str_split($answer)))
       return true;
    return false;
}

function isGuessValid(string $guess): bool {
    if(strlen($guess) != 1){
        return false;
    }
    return true;
}

while(in_array("_", str_split($hiddenWord)) && strlen($misses) < 5){
    DisplayField($misses, $hiddenWord);
    $guess = MakeGuess();
    if(!isGuessValid($guess)){
        echo "[ERROR] Make valid guess please :) \n";
        continue;
    }
    $isGuessRight = IsGuessRight($guess, $word);
    $misses .= $isGuessRight? '': $guess;
    if ($isGuessRight)
        $hiddenWord[array_search($guess, str_split($word))] = $guess;
}
DisplayField($misses, $hiddenWord);




