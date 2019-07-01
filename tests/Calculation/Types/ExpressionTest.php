<?php

namespace App\Tests\Calculation\Types;

use App\Services\Calculation\Types\Expression;
use PHPUnit\Framework\TestCase;

class ExpressionTest extends TestCase
{
    /**
     * @return array
     */
    public function wrongArguments(): array
    {
        return [
            [''], [false], [true], [null]
        ];
    }

    /**
     * @dataProvider wrongArguments
     * @expectedException \InvalidArgumentException
     */
    public function testValueCannotBeEmpty($value)
    {
        (new Expression($value));
    }

    public function testValueShouldBeTheSame()
    {
        $value = '(1 + 2) + 3 / 5 * 4';
        $expression = new Expression($value);
        $this->assertEquals($expression->getValue(), $value);
    }
}