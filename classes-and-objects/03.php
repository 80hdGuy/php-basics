<?php

class FuelGauge
{
    private int $fuelAmount = 0;

    public function getFuelAmount(): int
    {
        return $this->fuelAmount;
    }

    public function addLiterOfFuel(): void
    {
        if ($this->fuelAmount < 70) {
            $this->fuelAmount++;
        }
    }

    public function burnLiterOfFuel(): bool
    {
        if ($this->fuelAmount > 0) {
            $this->fuelAmount--;
            return true;
        }
        return false;
    }
}

class Odometer
{
    private int $mileage = 0;
    private int $currentDistanceOnLastLiter = 10;

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function addKilometer(FuelGauge $fuelGauge): bool
    {
        if ($this->currentDistanceOnLastLiter == 10) {
            if (!$fuelGauge->burnLiterOfFuel()) {
                return false;
            }
            $this->currentDistanceOnLastLiter = 0;
        }
        $this->currentDistanceOnLastLiter++;
        if ($this->mileage < 999999) {
            $this->mileage++;
            return true;
        }
        $this->mileage = 0;
        return true;
    }
}

$fuelGauge = new FuelGauge();
$odometer = new Odometer();
while ($fuelGauge->getFuelAmount() < 70) {
    $fuelGauge->addLiterOfFuel();
}
while ($odometer->addKilometer($fuelGauge)) {
    echo $fuelGauge->getFuelAmount() . " l fuel left ";
    echo $odometer->getMileage() . " km driven" . PHP_EOL;
}
