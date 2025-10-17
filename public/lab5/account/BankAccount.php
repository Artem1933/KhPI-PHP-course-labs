<?php
require_once 'AccountInterface.php';

class BankAccount implements AccountInterface {
    public const MIN_BALANCE = 0.0;
    protected float $balance;
    protected string $currency;

    public function __construct(float $initialBalance, string $currency) {
        $this->currency = $currency;
        $this->balance = 0.0;
        $this->deposit($initialBalance);
    }

    public function deposit(float $amount): void {
        if ($amount <= 0) {
            throw new Exception("Сума для поповнення має бути додатною.");
        }
        $this->balance += $amount;
        echo "✅ Рахунок '{$this->currency}': Поповнено на " . number_format($amount, 2) . ". Новий баланс: " . number_format($this->balance, 2) . " {$this->currency}.<br>";
    }

    public function withdraw(float $amount): void {
        if ($amount <= 0) {
            throw new Exception("Сума для зняття має бути додатною.");
        }
        if ($this->balance - $amount < self::MIN_BALANCE) {
            throw new Exception("Недостатньо коштів. Поточний баланс: " . number_format($this->balance, 2) . " {$this->currency}.");
        }

        $this->balance -= $amount;
        echo "✅ Рахунок '{$this->currency}': Знято " . number_format($amount, 2) . ". Новий баланс: " . number_format($this->balance, 2) . " {$this->currency}.<br>";
    }

    public function getBalance(): float {
        return $this->balance;
    }
}