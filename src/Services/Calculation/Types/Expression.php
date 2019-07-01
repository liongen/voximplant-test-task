<?php

namespace App\Services\Calculation\Types;

final class Expression
{
    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException('Expression cannot be empty!');
        }

        if (is_bool($value)) {
            throw new \InvalidArgumentException('Expression cannot be boolean type!');
        }

        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}