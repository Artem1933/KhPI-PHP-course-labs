<?php
require_once 'Product.php';

class Category {
    private string $categoryName;
    private array $productsArray = [];

    public function __construct(string $name) {
        $this->categoryName = $name;
    }

    public function addProduct(Product $product): void {
        $this->productsArray[] = $product;
    }

    public function displayAllProducts(): void {
        // Убрали лишние \n и добавили HTML
        echo "<h1>Категорія: {$this->categoryName}</h1>";
        echo "<p>Всього товарів: " . count($this->productsArray) . "</p>";

        if (empty($this->productsArray)) {
            echo "<p>У цій категорії немає товарів.</p>";
            return;
        }

        foreach ($this->productsArray as $product) {
            $product->getInfo();
        }
    }
}