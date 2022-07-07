<?php

class Point
{
    public int $x;
    public int $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function swapPoints(Point $p1, Point $p2): void
    {
        $tempPoint = new Point($p1->x, $p1->y);
        $p1->x = $p2->x;
        $p1->y = $p2->y;
        $p2->x = $tempPoint->x;
        $p2->y = $tempPoint->y;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
echo "(" . $p1->x . ", " . $p1->y . ")";
echo PHP_EOL;
echo "(" . $p2->x . ", " . $p2->y . ")";
echo PHP_EOL . PHP_EOL;
$p1->swapPoints($p1, $p2) . PHP_EOL;
echo "(" . $p1->x . ", " . $p1->y . ")";
echo PHP_EOL;
echo "(" . $p2->x . ", " . $p2->y . ")";
echo PHP_EOL;