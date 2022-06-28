<?php

class SavingsAccount{
    public float $annualInterestRate = 0;
    public float $startingBalance = 0;
    public float $deposited = 0;
    public float $balance = 0;

    public function __construct(float $startingBalance)
    {
    }
    public function withdraw(float $amount): float{
        if($amount < 0){
            return 0;
        }
        $this->balance = $this->balance - $amount;
        return $amount;
    }
    public function addDeposit(float $amount){
        if($amount < 0){
            return;
        }
        $this->balance += $amount;
    }
    public function addMonthlyInterest(float $amount){

    }
}
