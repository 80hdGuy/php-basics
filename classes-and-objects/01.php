<?php

class Product
{
    private string $name;
    private float $startPrice;
    private int $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function printProduct(): string
    {
        return $this->name . ', price ' . $this->startPrice . ', amount ' . $this->amount;
    }

    public function changeQuantity(int $newAmount): void
    {
        $this->amount = $newAmount;
    }

    public function changePrice(float $newPrice): void
    {
        $this->startPrice = $newPrice;
    }
}

class Test
{
    private array $products;

    public function main(Product $product): void
    {
        $this->products[] = $product;
    }

    public function printOutProducts(): void
    {
        foreach ($this->products as $product) {
            echo $product->printProduct() . PHP_EOL;
        }
    }

}

$test = new Test();

$test->main(new Product("Logitech mouse", 70.00, 14));
$test->main(new Product("iPhone 5s", 999.99, 3));
$test->main(new Product("Epson EB-U05", 440.46, 1));

$test->printOutProducts();


