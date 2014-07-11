<?php

namespace Johan\Calculator;

interface CalculationInterface
{
    /**
     * @return float The result of the calculation.
     */
    public function calculate();
}
