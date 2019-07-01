<?php

namespace App\Controller;

use App\Services\Calculation\CalculationInterface;
use App\Services\Calculation\Types\Expression;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class FrontController
{
    /**
     * @var CalculationInterface
     */
    private $calculation;

    /**
     * @param CalculationInterface $calculation
     */
    public function __construct(CalculationInterface $calculation)
    {
        $this->calculation = $calculation;
    }

    /**
     * @Route(path="/{expr}", name="front_main", methods={"GET"}, requirements={"expr": ".*"})
     *
     * @param string $expr
     * @return JsonResponse
     */
    public function mainAction($expr)
    {
        try {
            $expressionObj = new Expression($expr);
            $result = $this->calculation->calculate($expressionObj);
            $response = new JsonResponse($result->getValue());
        } catch (\Exception $exception) {
            $response = new JsonResponse($exception->getMessage(), 400);
        }

        return $response;
    }
}