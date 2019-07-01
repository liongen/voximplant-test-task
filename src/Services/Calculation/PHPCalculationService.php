<?php


namespace App\Services\Calculation;

use App\Services\Calculation\Exception\DivisionByZeroException;
use App\Services\Calculation\Exception\ParserException;
use App\Services\Calculation\Types\Expression;
use App\Services\Calculation\Types\Result;
use MathParser\AbstractMathParser;
use MathParser\Exceptions\MathParserException;
use MathParser\Interpreting\Evaluator;
use MathParser\Parsing\Nodes\Node;

final class PHPCalculationService implements CalculationInterface
{
    /**
     * @var AbstractMathParser
     */
    private $parser;

    /**
     * @param AbstractMathParser $parser
     */
    public function __construct(AbstractMathParser $parser)
    {
        // NOTE: it's better to create a common interface and differentiate AbstractMathParser from our domain
        $this->parser = $parser;
    }

    /**
     * @param Expression $expression
     * @return Result
     * @throws DivisionByZeroException
     * @throws ParserException
     */
    public function calculate(Expression $expression): Result
    {
        try {
            /** @var Node $ast */
            $ast = $this->parser->parse($expression->getValue());

            // We could create more complex things here, e.g. provide template and variables for Evaluator

            $evaluator = new Evaluator();
            $resultStr = $ast->accept($evaluator);

            return new Result($resultStr);
        } catch (\MathParser\Exceptions\DivisionByZeroException $e) {
            throw new DivisionByZeroException($e->getMessage());
        } catch (MathParserException $e) {
            throw new ParserException($e->getMessage());
        }
    }
}