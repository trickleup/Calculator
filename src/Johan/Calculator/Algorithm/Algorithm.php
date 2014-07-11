<?php

namespace Johan\Calculator\Algorithm;

use Johan\Calculator\CalculationInterface;

abstract class Algorithm
{
    protected $left;
    protected $right;

    public function __construct(CalculationInterface $left, CalculationInterface $right)
    {
        $this->left = $left;
        $this->right = $right;
    }
}
