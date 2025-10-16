<?php

class Product {
    public string $name;
    public string $description;
    protected float $price;

    public function __construct(string $name, float $price, string $description) {
        $this->name = $name;
        $this->description = $description;
        $this->setPrice($price);
    }

    protected function setPrice(float $price): void {
        if ($price < 0) {
            $this->price = 0.0;
            // Важно: Валидационный вывод также должен использовать <br>
            echo "❗️ Валідація (Product): Ціна товару '{$this->name}' скоригована на 0.0.<br>";
        } else {
            $this->price = $price;
        }
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getInfo(): void {
        // Замена "--------------------------\n" на <hr>
        echo "<hr style='margin: 10px 0;'>";
        echo "Назва: {$this->name}<br>"; // Замена \n на <br>
        echo "Ціна: " . number_format($this->getPrice(), 2) . " грн<br>";
        echo "Опис: {$this->description}<br>";
    }
}