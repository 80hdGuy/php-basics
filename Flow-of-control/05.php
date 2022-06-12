<?php
$keypadButtons = [
    ["A","B","C"],
    ["D","E","F"],
    ["G","H","I"],
    ["J","K","L"],
    ["M","N","O"],
    ["P","Q","R","S"],
    ["T","U","V"],
    ["W","X","Y","Z"]
];
$userInput = str_split(readline("Write something: "));
$outputStr = "";
foreach ($userInput as $char){
    for ($i = 0; $i < count($keypadButtons); $i++){
        $charKeyInButton = array_search(strtoupper($char), $keypadButtons[$i], true);
        if (gettype($charKeyInButton) == "integer") {
            if (ctype_upper($char)) {
                $outputStr .= "#";
            }
            $outputStr .= str_repeat(($i + 2), $charKeyInButton + 1) . " ";
            break;
        }
    }
}
echo $outputStr . PHP_EOL;


