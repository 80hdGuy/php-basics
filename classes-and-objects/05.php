<?php

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function setMonth(int $month): void
    {
        $this->month = $month;
    }

    public function setDay(int $day): void
    {
        $this->day = $day;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function DisplayDate(): void
    {
        echo str_pad($this->day, 2, "0", STR_PAD_LEFT) . "/";
        echo str_pad($this->month, 2, "0", STR_PAD_LEFT) . "/";
        echo str_pad($this->year, 4, "0", STR_PAD_LEFT);
    }

}

$date = new Date(11, 2, 2000);
$date->DisplayDate();
echo PHP_EOL;
$date->setDay(5);
$date->DisplayDate();
echo PHP_EOL;
$date->setMonth($date->getMonth() + 10);
$date->DisplayDate();
echo PHP_EOL;
$date->setYear(3005);
$date->DisplayDate();
echo PHP_EOL;
$date->setYear($date->getYear() + 4);
$date->DisplayDate();
echo PHP_EOL;