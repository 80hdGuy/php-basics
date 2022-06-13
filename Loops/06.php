<?php
const size = 7;
const rowLength = (size - 1) * 4 * 2;

for ($i = 0; $i < size; $i++){
    $halfStarTextSize = ($i * 4);
    for ($j = 0; $j < rowLength / 2  - $halfStarTextSize; $j++){
        echo "/";
    }
    for ($j = 0; $j < $halfStarTextSize * 2; $j++){
        echo "*";
    }
    for ($j = 0; $j < rowLength / 2 - $halfStarTextSize; $j++){
        echo "\\";
    }
    echo "\n";
}

