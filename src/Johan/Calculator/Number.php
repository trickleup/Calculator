<?php

namespace Johan\Calculator;

class Number implements CalculationInterface
{
    private $number;

    public function __construct($number)
    {
        $this->number = (float) $number;
    }

    public function calculate()
    {
        return $this->number;
    }

}
