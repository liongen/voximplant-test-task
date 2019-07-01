<?php


namespace App\Services\Calculation;

use App\Services\Calculation\Types\Expression;
use App\Services\Calculation\Types\Result;

final class WolframCalculationService implements CalculationInterface
{
    /**
     * @param Expression $expression
     * @return Result
     */
    public function calculate(Expression $expression): Result
    {
        // TODO: Implement calculate() method.
    }
}