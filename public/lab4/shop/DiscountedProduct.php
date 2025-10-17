<?php
require_once 'Product.php';

class DiscountedProduct extends Product {
    private float $discount;

    public function __construct(string $name, float $price, string $description, float $discount) {
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }

    public function calculateNewPrice(): float {
        return $this->price * (1 - ($this->discount / 100));
    }

    public function getInfo(): void {
        echo "<hr style='margin: 10px 0;'>";
        echo "Назва: {$this->name} (ЗНИЖКА!)<br>";
        echo "Ціна (стара): " . number_format($this->getPrice(), 2) . " грн<br>";
        echo "Знижка: {$this->discount}%<br>";
        echo "Ціна (нова): " . number_format($this->calculateNewPrice(), 2) . " грн<br>";
        echo "Опис: {$this->description}<br>";
    }
}