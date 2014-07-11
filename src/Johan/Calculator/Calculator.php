<?php

namespace Johan\Calculator;

use Exception;

class Calculator
{
    private $algorithms = [
        '+' => 'Addition',
        '-' => 'Subtraction',
        '*' => 'Multiplication',
        '/' => 'Division',
        '%' => 'Modulus',
    ];

    public function calculate($expression)
    {
        $literals = array_values( array_filter( explode( ' ', $expression ) ) );

        return $this->getCalculation( $literals )->calculate();

    }

    private function getCalculation(array $literals)
    {

        if ( ($idx = $this->getSplitIndex( $literals ) ) !== false ) {
            return $this->getAlgorithm(
                $literals[$idx],
                $this->getCalculation( array_slice( $literals, 0, $idx ) ),
                $this->getCalculation( array_slice( $literals, $idx+1 ) )
            );

        } else {

            if ( count($literals) === 1 ) {
                return new Number( $literals[0] );
            }

            if ( count($literals) >= 3 ) {
                return $this->getAlgorithm( $literals[1], new Number( $literals[0] ), $this->getCalculation( array_slice( $literals, 2 ) ) );
            }

            throw new Exception( 'Invalid Expression!' );
        }
    }

    private function getAlgorithm($operator, CalculationInterface $calc1, CalculationInterface $calc2)
    {
        // I would use a Dependency Injection container (like Pimple) here so I could do something like
        // $this->di['%']( $calc1, $calc2 )
        // ... and avoid the string fiddling below
        
        if ( !isset( $this->algorithms[$operator] ) ) {
            throw new Exception( 'Unknown Operator: ' . $operator );
        }
        $class = 'Johan\Calculator\Algorithm\\'.$this->algorithms[$operator];
        return new $class( $calc1, $calc2 );

    }

    private function getSplitIndex(array $literals)
    {
        foreach ($literals as $idx => $literal) {
            if ($literal === '+' || $literal === '-') {
                return $idx;
            }
        }

        return false;
    }

}
