<?php

class SavingsAccount
{
    private float $annualInterestRate;
    private float $deposited = 0;
    private float $withdrawn = 0;
    private float $interestEarned = 0;
    private float $balance;

    public function __construct(float $startingBalance, float $annualInterestRate)
    {

        $this->balance = $startingBalance;
        $this->annualInterestRate = $annualInterestRate;
    }

    public function withdraw(float $amount): void
    {
        if ($amount < 0) {
            return;
        }
        $this->balance = $this->balance - $amount;
        $this->withdrawn += $amount;
    }

    public function addDeposit(float $amount): void
    {
        if ($amount < 0) {
            return;
        }
        $this->balance += $amount;
        $this->deposited += $amount;
    }

    public function addMonthlyInterest()
    {
        $monthsInterest = $this->balance * ($this->annualInterestRate / 12);
        $this->balance += $monthsInterest;
        $this->interestEarned += $monthsInterest;

    }


    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getDeposited(): float
    {
        return $this->deposited;
    }

    public function getInterestEarned(): float
    {
        return $this->interestEarned;
    }


    public function getWithdrawn(): float
    {
        return $this->withdrawn;
    }
}

class Test
{
    static public function run()
    {
        $savingsAccount = new SavingsAccount(
            (float)readline("How much money is in the account?: "),
            (float)readline("Enter the annual interest rate: ")
        );

        $months = (int)readline("How long has the account been opened?: ");
        for ($i = 1; $i <= $months; $i++) {
            $savingsAccount->addDeposit(
                (float)readline("Enter amount deposited for month: {$i}: ")
            );
            $savingsAccount->withdraw(
                (float)readline("Enter amount withdrawn for {$i}: ")
            );
            $savingsAccount->addMonthlyInterest();
        }
        echo "Total deposited: $" . number_format($savingsAccount->getDeposited(), 2) . "\n";
        echo "Total withdrawn: $" . number_format($savingsAccount->getWithdrawn(), 2) . "\n";
        echo "Interest earned: $" . number_format($savingsAccount->getInterestEarned(), 2) . "\n";
        echo "Ending balance: $" . number_format($savingsAccount->getBalance(), 2) . "\n";
    }
}

Test::run();

