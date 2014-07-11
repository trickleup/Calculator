<?php

namespace Johan\Calculator;

class Container
{
    private $algorithms = [];

    public function addAlgorithm($operator, AlgorithmInterface $algorithm)
    {
        $this->algorithms[$operator] = $algorithm;
    }

    public function getAlgorithmInstance($operator)
    {
        if ( isset ( $this->algorithms[$operator] ) ) {
            return
        }
    }

}
