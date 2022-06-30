<?php
namespace APP\Model;

class Product{
    private string $name;
    private float $price;
    private int $quantity;
    private Provider $provider;

    //__ métodos padrões do php (override)

    public function __construct(
        float $cost,
        float $tax,
        float $costOfOperation,
        float $lucre,
        string $name,
        float $quantity,
        Provider $provider
    )
    {
        self::calculateFinalPrice($cost, $tax, $costOfOperation, $lucre);
        $this->name = $name;
        $this->quantity = $quantity;
        $this->provider = $provider;
    }

    private function calculateFinalPrice (float $cost, float $tax, float $costOfOperation, float $lucre = 0.4):void
    {
        $this->price = ($cost + $tax + $costOfOperation) / (1 - $lucre);
    }

    public function calculateCostPrice (float $cost, float $tax, float $costOfOperation, float $lucre = 0.4):float
    {
        return $this->price - $tax - $costOfOperation - ($this->price * $lucre);
    }

    public function calculateMarkUp(float $costOfOperation):float
    {
        return $this->price / $costOfOperation;
    }
}