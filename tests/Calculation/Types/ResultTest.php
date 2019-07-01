<?php

namespace App\Tests\Calculation\Types;

use App\Services\Calculation\Types\Result;
use PHPUnit\Framework\TestCase;

class ResultTest extends TestCase
{
    public function testShouldReturnFloatFromInteger()
    {
        $result = new Result('10');
        $this->assertInternalType('float', $result->getValue());
    }

    public function testShouldThrowExceptionOnInvalidData()
    {
        $this->expectException(\InvalidArgumentException::class);
        (new Result('string'));
    }
}