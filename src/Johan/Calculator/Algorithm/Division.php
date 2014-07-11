<?php

namespace Johan\Calculator\Algorithm;

use Johan\Calculator\CalculationInterface;

class Division extends Algorithm implements CalculationInterface
{
    public function calculate()
    {
        return $this->left->calculate() / $this->right->calculate();
    }
}
