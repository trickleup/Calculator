<?php

namespace Johan\Calculator;

require_once( realpath( __DIR__ . '/../vendor/autoload.php' ) );

$calculator = new Calculator();

do {
    echo "Enter a calculation and press enter to continue (empty line to quit): ";
    $handle = fopen( "php://stdin", "r" );
    $expression = fgets( $handle );
    if ($expression !== "\n") {
        echo "CALCULATION: " . $expression;
        echo "RESULT: " . $calculator->calculate( $expression ) . "\n";
    }
} while ( $expression !== "\n" );
