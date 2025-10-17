<?php

require_once '../account/BankAccount.php';
require_once '../account/SavingsAccount.php';

echo "<!DOCTYPE html><html><head><title>ЛР 5 Банківські Рахунки</title><style>body { font-family: Arial, sans-serif; }</style></head><body>";
// Видалено: echo "<h1>Лабораторна робота № 5</h1>";

echo "<h2>1. Тестування функціоналу рахунків</h2>";

$currentUSD = new BankAccount(1000.00, "USD");
$savingsEUR = new SavingsAccount(5000.00, "EUR");

try {
    echo "<h4>1.1. Успішні операції:</h4>";
    $currentUSD->deposit(200.00);
    $savingsEUR->withdraw(150.00);
    $savingsEUR->applyInterest();

} catch (Exception $e) {
    echo "<p style='color:red;'>Помилка: {$e->getMessage()}</p>";
}

echo "<h4>1.2. Тест: Недостатньо коштів (BankAccount)</h4>";
try {
    $currentUSD->withdraw(5000.00);
} catch (Exception $e) {
    echo "<p style='color:red; font-weight: bold;'>⚠️ Виняток успішно перехоплено: {$e->getMessage()}</p>";
}

echo "<h4>1.3. Тест: Некоректна сума для поповнення (SavingsAccount)</h4>";
try {
    $savingsEUR->deposit(-100.00);
} catch (Exception $e) {
    echo "<p style='color:red; font-weight: bold;'>⚠️ Виняток успішно перехоплено: {$e->getMessage()}</p>";
}

echo "<h4>1.4. Зміна статичної ставки та повторне застосування відсотків:</h4>";
SavingsAccount::$interestRate = 5.5;
echo "<p>Статична ставка змінена на " . SavingsAccount::$interestRate . "%.</p>";

try {
    $savingsEUR->applyInterest();
} catch (Exception $e) {
    echo "<p style='color:red;'>Помилка: {$e->getMessage()}</p>";
}

echo "<h3>2. Фінальний баланс рахунків</h3>";
echo "<p>USD (Звичайний) Рахунок: " . number_format($currentUSD->getBalance(), 2) . " USD</p>";
echo "<p>EUR (Накопичувальний) Рахунок: " . number_format($savingsEUR->getBalance(), 2) . " EUR</p>";


echo "</body></html>";