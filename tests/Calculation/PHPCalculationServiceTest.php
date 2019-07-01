<?php

namespace App\Tests\Calculation;

use App\Services\Calculation\Exception\DivisionByZeroException;
use App\Services\Calculation\Exception\ParserException;
use App\Services\Calculation\PHPCalculationService;
use App\Services\Calculation\Types\Expression;
use MathParser\StdMathParser;
use PHPUnit\Framework\TestCase;

class PHPCalculationServiceTest extends TestCase
{
    public function testShouldCalculateSimpleExpression()
    {
        $service = $this->createCalculationService();
        $expression = new Expression('1+2');
        $result = $service->calculate($expression);
        $this->assertSame($result->getValue(), 3.0);
    }

    public function testShouldCalculateComplexExpression()
    {
        $service = $this->createCalculationService();
        $expression = new Expression('(56*23)/(43*4+(10/2)-2)');
        $result = $service->calculate($expression);
        $this->assertSame($result->getValue(), 7.36);
    }

    public function testShouldThrowDivisionByZeroException()
    {
        $service = $this->createCalculationService();
        $expression = new Expression('2/0');

        $this->expectException(DivisionByZeroException::class);
        $service->calculate($expression);
    }

    public function testShouldThrowParserException()
    {
        $service = $this->createCalculationService();
        $expression = new Expression('((2+567)-1');

        $this->expectException(ParserException::class);
        $service->calculate($expression);
    }

    private function createParser()
    {
        return new StdMathParser();
    }

    private function createCalculationService()
    {
        $parser = $this->createParser();
        return new PHPCalculationService($parser);
    }
}