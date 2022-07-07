<?php

echo "Geometry Calculator\n";
echo "1. Calculate the Area of a Circle\n";
echo "2. Calculate the Area of a Rectangle\n";
echo "3. Calculate the Area of a Triangle\n";
echo "4. Quit\n";

$choice = readline("Enter your choice (1-4) : ");
$output = "The area is: ";

class Geometry
{
    static function AreaOfCircle(float $radius): float
    {
        return round(pi() * ($radius ** 2), 2);
    }

    static function AreaOfRectangle(float $length, float $width): float
    {
        return round($length * $width, 2);
    }

    static function AreaOfTriangle(float $baseLength, float $height): float
    {
        return round($baseLength * $height * 0., 2);
    }
}

switch ($choice) {
    case "1":
        $output .= Geometry::AreaOfCircle((float)readline("Give me a radius of the circle: "));
        break;
    case "2":
        $length = (float)readline("Give me a length of the rectangle: ");
        $width = (float)readline("Give me a width of the rectangle: ");
        $output .= Geometry::AreaOfRectangle($length, $width);
        break;
    case "3":
        $baseLength = (float)readline("Give me a base length of the triangle: ");
        $height = (float)readline("Give me a height of the rectangle: ");
        $output .= Geometry::AreaOfTriangle($baseLength, $height);
        break;
    case "4":
        $output = "bye!";
        break;
}


echo $output . PHP_EOL;



