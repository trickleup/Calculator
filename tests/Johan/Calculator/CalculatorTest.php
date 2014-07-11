<?php

namespace Johan\Calculator;

use PHPUnit_Framework_TestCase;

class CalculatorTest extends PHPUnit_Framework_TestCase
{

    public function testCalculate()
    {
        $object = new Calculator();
        $this->assertEquals( 5, $object->calculate( '2 +  3' ) );
        $this->assertEquals( 13, $object->calculate( '2 + 3 + 8' ) );
        $this->assertEquals( -3, $object->calculate( '2 + 3 + -8' ) );
        $this->assertEquals( 3.6, $object->calculate( '10 - 6.4' ) );
        $this->assertEquals( 15, $object->calculate( '5 * 3' ) );
        $this->assertEquals( 2.5, $object->calculate( '10 / 4' ) );
        $this->assertEquals( 2, $object->calculate( '17 % 5' ) );
        $this->assertEquals( 21, $object->calculate( '5 * 4 + 1' ) );
        $this->assertEquals( 23, $object->calculate( '5 * 4 + 1 + 10 / 5' ) );
    }

}
