<?php

class Account
{
    public string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function __toString(): string
    {
        return $this->name . ", " . number_format($this->balance, 2);
    }

    public function withdrawal(float $amount): float
    {
        if ($amount < 0 || $amount > $this->balance) return 0;
        $this->balance -= $amount;
        return $amount;
    }

    public function deposit(float $amount): void
    {
        if ($amount < 0) return;
        $this->balance += $amount;
    }

    public function balance(): float
    {
        return $this->balance;
    }

    public function transfer(Account $recipientAcc, float $amount)
    {
        $recipientAcc->deposit($this->withdrawal($amount));
    }
}

$mattAccount = new Account("Matt's account", 1000);
$myAccount = new Account("My account", 0);

echo "Initial state" . PHP_EOL;
echo $mattAccount . PHP_EOL;
echo $myAccount . PHP_EOL;

$mattAccount->withdrawal(100.0);
echo "Matt's account balance is now: " . number_format($mattAccount->balance(), 2) . PHP_EOL;
$myAccount->deposit(100);
echo "My account balance is now: " . number_format($myAccount->balance(), 2) . PHP_EOL;


echo "Final state";
echo $mattAccount . PHP_EOL;
echo $myAccount . PHP_EOL;
echo PHP_EOL;


$aAccount = new Account("A", 100);
$bAccount = new Account("B", 0);
$cAccount = new Account("C", 0);

echo "***Initial state***" . PHP_EOL;
echo $aAccount . PHP_EOL;
echo $bAccount . PHP_EOL;
echo $cAccount . PHP_EOL;
echo PHP_EOL;
$aAccount->transfer($bAccount, 50);
echo $aAccount . PHP_EOL;
echo $bAccount . PHP_EOL;
echo $cAccount . PHP_EOL;
echo PHP_EOL;
$bAccount->transfer($cAccount, 25.5);


echo "***Final state***" . PHP_EOL;
echo $aAccount . PHP_EOL;
echo $bAccount . PHP_EOL;
echo $cAccount . PHP_EOL;
echo PHP_EOL;


