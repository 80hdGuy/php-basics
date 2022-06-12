<?php
$nums = [];
for ($i = 1; $i <= 3; $i++){
    array_push($nums, (int)readline("Input the {$i}st number: "));
}
rsort($nums );
echo "largest number: ". $nums[0] . PHP_EOL;


