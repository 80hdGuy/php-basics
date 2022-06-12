<?php
$num = (int)readline("Enter the number: ");
echo ($num == 0?
        "Maybe positive, maybe negative. Who knows... " :
        ($num >= 0?
            "positive number ":
            "negative number"
        )
    ) . PHP_EOL;
