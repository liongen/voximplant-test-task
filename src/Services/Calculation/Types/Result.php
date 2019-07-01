<?php

namespace App\Services\Calculation\Types;

final class Result
{
    /**
     * @var int|float
     */
    private $value;

    /**
     * @param int|float $value
     */
    public function __construct($value)
    {
        if (!is_numeric($value)) {
            throw new \InvalidArgumentException('Result value must be integer or float!');
        }

        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}