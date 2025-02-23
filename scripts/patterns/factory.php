<?php

// сделать динамическое создание объектов

interface PaymentInterface
{
    public function pay(int $sum): void;
}

final class BankPayment implements PaymentInterface
{
    public function pay(int $sum): void
    {
        echo 'BankPayment: ' . $sum . PHP_EOL;
    }
}

final class CryptoPayment implements PaymentInterface
{
    public function pay(int $sum): void
    {
        echo 'CryptoPayment: ' . $sum . PHP_EOL;
    }
}

echo '===========' . PHP_EOL;

// решение
final class PaymentFactory
{
    public static function factory(string $type): PaymentInterface
    {
        return match ($type) {
            'bank' => new BankPayment(),
            'crypto' => new CryptoPayment(),
            default => throw new Exception("invalid type."),
        };
    }
}

$bankPayment = PaymentFactory::factory('bank');
var_dump($bankPayment);
$cryptoPayment = PaymentFactory::factory('crypto');
var_dump($cryptoPayment);