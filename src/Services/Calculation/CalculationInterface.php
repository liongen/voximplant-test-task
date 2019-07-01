<?php

namespace App\Services\Calculation;

use App\Services\Calculation\Exception\DivisionByZeroException;
use App\Services\Calculation\Types\Expression;
use App\Services\Calculation\Types\Result;

interface CalculationInterface
{
    /**
     * @param Expression $expression
     * @return Result
     * @throws DivisionByZeroException
     */
    public function calculate(Expression $expression): Result;
}