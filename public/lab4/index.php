<?php
/**
 * Файл для тестування (Крок 3)
 */

// Підключаємо всі класи
require_once 'Product.php';
require_once 'DiscountedProduct.php';
require_once 'Category.php';

// Використовуємо HTML для коректного відображення у браузері
echo "<!DOCTYPE html><html><head><title>ЛР 4 ООП PHP</title><style>body { font-family: Arial, sans-serif; }</style></head><body>";
// Видалений заголовок "Лабораторна Робота № 4: Тестування Класів"

// -----------------------------------------------------------------------------
// Крок 3: Створення та тестування об'єктів
// -----------------------------------------------------------------------------

echo "<h3>1. Створення об'єктів Product та DiscountedProduct</h3>";

// Product 1: Новий товар
$itemA = new Product(
    'Кавоварка автоматична Z9',
    18500.00,
    'Готує еспресо, капучино та лате одним натисканням.'
);

// Product 2: Тест від'ємної ціни
$itemB = new Product(
    'Подарунковий ваучер 100 грн',
    -100.00, // Спрацює валідація
    'Ваучер на наступну покупку.'
);

// DiscountedProduct 1: Новий товар зі знижкою
$itemC = new DiscountedProduct(
    'Бездротова миша Pro',
    1800.00,
    'Ергономічний дизайн, висока точність сенсора.',
    25 // 25% знижка
);

// DiscountedProduct 2: Новий товар зі знижкою
$itemD = new DiscountedProduct(
    'Набір посуду "Елегант"',
    4500.00,
    '12 предметів з нержавіючої сталі.',
    12 // 12% знижка
);

echo "<h3>2. Виведення інформації про окремі товари (getInfo())</h3>";

$itemA->getInfo();
$itemB->getInfo();
$itemC->getInfo();
$itemD->getInfo();


// -----------------------------------------------------------------------------
// Тестування класу Category
// -----------------------------------------------------------------------------

echo "<h3>3. Тестування Класу Category</h3>";

$category1 = new Category('Кухня та Дім');
$category2 = new Category('Аксесуари');

$category1->addProduct($itemA); // Кавоварка
$category1->addProduct($itemD); // Набір посуду

$category2->addProduct($itemC); // Миша
$category2->addProduct($itemB); // Ваучер (з ціною 0.00)

$category1->displayAllProducts();
$category2->displayAllProducts();

echo "</body></html>";