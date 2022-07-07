<?php

class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    function show_user_name_and_balance(): string
    {
        return $this->name . ', '
            . ($this->balance < 0 ? "-" : " ")
            . "\$"
            . number_format($this->balance * ($this->balance < 0 ? -1 : 1), 2);
    }
}

$benAcc = new BankAccount("Benson", 500);
$bobAcc = new BankAccount("Bobson", -500.3);

echo $benAcc->show_user_name_and_balance();
echo PHP_EOL;
echo $bobAcc->show_user_name_and_balance();
echo PHP_EOL;