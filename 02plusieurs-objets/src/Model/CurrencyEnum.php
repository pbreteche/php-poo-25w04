<?php

namespace App\Model;

class CurrencyEnum
{
    public const EUR = "EUR";
    public const USD = "USD";
    public const GBP = "GBP";

    private ?string $value;

    public function __construct(?string $value)
    {
        if (!in_array($value, [self::EUR, self::USD, self::GBP])) {
            throw new \InvalidArgumentException("value should be one of 'EUR', 'USD', 'GBP'");
        }

        $this->value = $value;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }
}