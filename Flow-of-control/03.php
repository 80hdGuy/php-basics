<?php

$num = (string)readline("Give me positive number: ");
echo "It has " . strlen($num) . " digit".(strlen($num) == 1? "" : "s") . PHP_EOL;

