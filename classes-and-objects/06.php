<?php

$surveyed = 12467;
class Surveyed{
    public static float $purchased_energy_drinks = 0.14;
    public static float $prefer_citrus_drinks = 0.64;
}
function calculate_energy_drinkers(int $numberSurveyed): float
{
    return $numberSurveyed * Surveyed::$purchased_energy_drinks;
}

function calculate_prefer_citrus(int $numberSurveyed): float
{
    return calculate_energy_drinkers($numberSurveyed) * Surveyed::$prefer_citrus_drinks;
}


echo "Total number of people surveyed " . $surveyed;
echo PHP_EOL;
echo "Approximately "
    . round(calculate_energy_drinkers($surveyed))
    . " bought at least one energy drink";
echo PHP_EOL;
echo round(calculate_prefer_citrus($surveyed))
    . " of those " . "prefer citrus flavored energy drinks.";
echo PHP_EOL;
