<?php
/**
 * Лабораторна робота № 4. Тестування.
 */

// Підключаємо класи, вказуючи шлях до папки 'shop'
require_once '../shop/Product.php';
require_once '../shop/DiscountedProduct.php';
require_once '../shop/Category.php';

echo "<!DOCTYPE html><html><head><title>ЛР 4 ООП PHP</title><style>body { font-family: Arial, sans-serif; }</style></head><body>";

echo "<h2>1. Створення об'єктів Product та DiscountedProduct</h2>";

// Створення об'єктів
$itemA = new Product('Кавоварка автоматична Z9', 18500.00, 'Готує еспресо, капучино та лате одним натисканням.');
$itemB = new Product('Подарунковий ваучер 100 грн', -100.00, 'Ваучер на наступну покупку.'); // Тест валідації
$itemC = new DiscountedProduct('Бездротова миша Pro', 1800.00, 'Ергономічний дизайн, висока точність сенсора.', 25);
$itemD = new DiscountedProduct('Набір посуду "Елегант"', 4500.00, '12 предметів з нержавіючої сталі.', 12);

echo "<h3>2. Виведення інформації про окремі товари (getInfo())</h3>";

$itemA->getInfo();
$itemB->getInfo();
$itemC->getInfo();
$itemD->getInfo();


echo "<h3>3. Тестування Класу Category</h3>";

$category1 = new Category('Кухня та Дім');
$category2 = new Category('Аксесуари');

$category1->addProduct($itemA);
$category1->addProduct($itemD);
$category2->addProduct($itemC);
$category2->addProduct($itemB);

$category1->displayAllProducts();
$category2->displayAllProducts();

echo "</body></html>";