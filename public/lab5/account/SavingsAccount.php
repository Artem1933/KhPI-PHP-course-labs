<?php
require_once 'BankAccount.php';

class SavingsAccount extends BankAccount {
    public static float $interestRate = 4.0;

    public function __construct(float $initialBalance, string $currency) {
        parent::__construct($initialBalance, $currency);
        echo "🏦 Створено накопичувальний рахунок. Поточна ставка: " . self::$interestRate . "%.<br>";
    }

    public function applyInterest(): void {
        $interest = $this->balance * (self::$interestRate / 100);
        $this->balance += $interest;

        echo "💰 Рахунок '{$this->currency}' (Накопичувальний): Застосовано відсоток " . self::$interestRate . "%. Додано " . number_format($interest, 2) . ". Новий баланс: " . number_format($this->balance, 2) . " {$this->currency}.<br>";
    }
}