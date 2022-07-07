<?php

for ($i = 1; $i <= 110; $i++) {
    switch (true) {
        case fmod($i, 3) == 0 && fmod($i, 7) == 0://multiples of 3 and 7
            echo "CozaWoza";
            break;
        case fmod($i, 3) == 0 && fmod($i, 5) == 0://multiples of 3 and 5
            echo "CozaLoza";
            break;
        case fmod($i, 5) == 0 && fmod($i, 7) == 0://multiples of 5 and 7
            echo "LozaWoza";
            break;
        case fmod($i, 7) == 0://multiples of 7
            echo "Woza";
            break;
        case fmod($i, 5) == 0://multiples of 5
            echo "Loza";
            break;
        case fmod($i, 3) == 0://multiples of 3
            echo "Coza";
            break;
        default :
            echo $i;
    }
    if (fmod($i, 11) == 0)
        echo PHP_EOL;
    else
        echo " ";
}