--TEST--
round() with different rounding modes
--FILE--
<?php
$modes = [
    "PHP_ROUND_HALF_UP" => PHP_ROUND_HALF_UP,
    "PHP_ROUND_HALF_DOWN" => PHP_ROUND_HALF_DOWN,
    "PHP_ROUND_HALF_EVEN" => PHP_ROUND_HALF_EVEN,
    "PHP_ROUND_HALF_ODD" => PHP_ROUND_HALF_ODD,
    "PositiveInfinity" => RoundingMode::PositiveInfinity,
    "NegativeInfinity" => RoundingMode::NegativeInfinity,
    "TowardsZero" => RoundingMode::TowardsZero,
    "AwayFromZero" => RoundingMode::AwayFromZero,
];

$numbers = [
    2.5,
    -2.5,
    3.5,
    -3.5,
    7,
    -7,
    15.51,
    -15.51,
    5,
    -5,
    0.61,
    0.69,
    0.65,
    -0.65,
    1.9999,
    -1.9999,
    0.0001,
    -0.0001,
];
$precisions = [-1, 0, 1, 2, 10];

foreach ($modes as $modeKey => $mode) {
    echo "mode: $modeKey\n";
    foreach ($precisions as $precision) {
        echo "\tprecision: $precision\n";
        foreach ($numbers as $number) {
            $result = round($number, $precision, $mode);
            echo "\t\t" .
                str_pad($number, 7, " ", STR_PAD_LEFT) .
                " => $result\n";
        }
        echo "\n";
    }
}

?>
--EXPECT--
mode: PHP_ROUND_HALF_UP
	precision: -1
		    2.5 => 0
		   -2.5 => -0
		    3.5 => 0
		   -3.5 => -0
		      7 => 10
		     -7 => -10
		  15.51 => 20
		 -15.51 => -20
		      5 => 10
		     -5 => -10
		   0.61 => 0
		   0.69 => 0
		   0.65 => 0
		  -0.65 => -0
		 1.9999 => 0
		-1.9999 => -0
		 0.0001 => 0
		-0.0001 => -0

	precision: 0
		    2.5 => 3
		   -2.5 => -3
		    3.5 => 4
		   -3.5 => -4
		      7 => 7
		     -7 => -7
		  15.51 => 16
		 -15.51 => -16
		      5 => 5
		     -5 => -5
		   0.61 => 1
		   0.69 => 1
		   0.65 => 1
		  -0.65 => -1
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -0

	precision: 1
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.5
		 -15.51 => -15.5
		      5 => 5
		     -5 => -5
		   0.61 => 0.6
		   0.69 => 0.7
		   0.65 => 0.7
		  -0.65 => -0.7
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -0

	precision: 2
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -0

	precision: 10
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 1.9999
		-1.9999 => -1.9999
		 0.0001 => 0.0001
		-0.0001 => -0.0001

mode: PHP_ROUND_HALF_DOWN
	precision: -1
		    2.5 => 0
		   -2.5 => -0
		    3.5 => 0
		   -3.5 => -0
		      7 => 10
		     -7 => -10
		  15.51 => 20
		 -15.51 => -20
		      5 => 0
		     -5 => -0
		   0.61 => 0
		   0.69 => 0
		   0.65 => 0
		  -0.65 => -0
		 1.9999 => 0
		-1.9999 => -0
		 0.0001 => 0
		-0.0001 => -0

	precision: 0
		    2.5 => 2
		   -2.5 => -2
		    3.5 => 3
		   -3.5 => -3
		      7 => 7
		     -7 => -7
		  15.51 => 16
		 -15.51 => -16
		      5 => 5
		     -5 => -5
		   0.61 => 1
		   0.69 => 1
		   0.65 => 1
		  -0.65 => -1
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -0

	precision: 1
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.5
		 -15.51 => -15.5
		      5 => 5
		     -5 => -5
		   0.61 => 0.6
		   0.69 => 0.7
		   0.65 => 0.6
		  -0.65 => -0.6
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -0

	precision: 2
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -0

	precision: 10
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 1.9999
		-1.9999 => -1.9999
		 0.0001 => 0.0001
		-0.0001 => -0.0001

mode: PHP_ROUND_HALF_EVEN
	precision: -1
		    2.5 => 0
		   -2.5 => -0
		    3.5 => 0
		   -3.5 => -0
		      7 => 10
		     -7 => -10
		  15.51 => 20
		 -15.51 => -20
		      5 => 0
		     -5 => -0
		   0.61 => 0
		   0.69 => 0
		   0.65 => 0
		  -0.65 => -0
		 1.9999 => 0
		-1.9999 => -0
		 0.0001 => 0
		-0.0001 => -0

	precision: 0
		    2.5 => 2
		   -2.5 => -2
		    3.5 => 4
		   -3.5 => -4
		      7 => 7
		     -7 => -7
		  15.51 => 16
		 -15.51 => -16
		      5 => 5
		     -5 => -5
		   0.61 => 1
		   0.69 => 1
		   0.65 => 1
		  -0.65 => -1
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -0

	precision: 1
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.5
		 -15.51 => -15.5
		      5 => 5
		     -5 => -5
		   0.61 => 0.6
		   0.69 => 0.7
		   0.65 => 0.6
		  -0.65 => -0.6
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -0

	precision: 2
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -0

	precision: 10
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 1.9999
		-1.9999 => -1.9999
		 0.0001 => 0.0001
		-0.0001 => -0.0001

mode: PHP_ROUND_HALF_ODD
	precision: -1
		    2.5 => 0
		   -2.5 => -0
		    3.5 => 0
		   -3.5 => -0
		      7 => 10
		     -7 => -10
		  15.51 => 20
		 -15.51 => -20
		      5 => 10
		     -5 => -10
		   0.61 => 0
		   0.69 => 0
		   0.65 => 0
		  -0.65 => -0
		 1.9999 => 0
		-1.9999 => -0
		 0.0001 => 0
		-0.0001 => -0

	precision: 0
		    2.5 => 3
		   -2.5 => -3
		    3.5 => 3
		   -3.5 => -3
		      7 => 7
		     -7 => -7
		  15.51 => 16
		 -15.51 => -16
		      5 => 5
		     -5 => -5
		   0.61 => 1
		   0.69 => 1
		   0.65 => 1
		  -0.65 => -1
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -0

	precision: 1
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.5
		 -15.51 => -15.5
		      5 => 5
		     -5 => -5
		   0.61 => 0.6
		   0.69 => 0.7
		   0.65 => 0.7
		  -0.65 => -0.7
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -0

	precision: 2
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -0

	precision: 10
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 1.9999
		-1.9999 => -1.9999
		 0.0001 => 0.0001
		-0.0001 => -0.0001

mode: PositiveInfinity
	precision: -1
		    2.5 => 10
		   -2.5 => -0
		    3.5 => 10
		   -3.5 => -0
		      7 => 10
		     -7 => -0
		  15.51 => 20
		 -15.51 => -10
		      5 => 10
		     -5 => -0
		   0.61 => 10
		   0.69 => 10
		   0.65 => 10
		  -0.65 => -0
		 1.9999 => 10
		-1.9999 => -0
		 0.0001 => 10
		-0.0001 => -0

	precision: 0
		    2.5 => 3
		   -2.5 => -2
		    3.5 => 4
		   -3.5 => -3
		      7 => 7
		     -7 => -7
		  15.51 => 16
		 -15.51 => -15
		      5 => 5
		     -5 => -5
		   0.61 => 1
		   0.69 => 1
		   0.65 => 1
		  -0.65 => -0
		 1.9999 => 2
		-1.9999 => -1
		 0.0001 => 1
		-0.0001 => -0

	precision: 1
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.6
		 -15.51 => -15.5
		      5 => 5
		     -5 => -5
		   0.61 => 0.7
		   0.69 => 0.7
		   0.65 => 0.7
		  -0.65 => -0.6
		 1.9999 => 2
		-1.9999 => -1.9
		 0.0001 => 0.1
		-0.0001 => -0

	precision: 2
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 2
		-1.9999 => -1.99
		 0.0001 => 0.01
		-0.0001 => -0

	precision: 10
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 1.9999
		-1.9999 => -1.9999
		 0.0001 => 0.0001
		-0.0001 => -0.0001

mode: NegativeInfinity
	precision: -1
		    2.5 => 0
		   -2.5 => -10
		    3.5 => 0
		   -3.5 => -10
		      7 => 0
		     -7 => -10
		  15.51 => 10
		 -15.51 => -20
		      5 => 0
		     -5 => -10
		   0.61 => 0
		   0.69 => 0
		   0.65 => 0
		  -0.65 => -10
		 1.9999 => 0
		-1.9999 => -10
		 0.0001 => 0
		-0.0001 => -10

	precision: 0
		    2.5 => 2
		   -2.5 => -3
		    3.5 => 3
		   -3.5 => -4
		      7 => 7
		     -7 => -7
		  15.51 => 15
		 -15.51 => -16
		      5 => 5
		     -5 => -5
		   0.61 => 0
		   0.69 => 0
		   0.65 => 0
		  -0.65 => -1
		 1.9999 => 1
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -1

	precision: 1
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.5
		 -15.51 => -15.6
		      5 => 5
		     -5 => -5
		   0.61 => 0.6
		   0.69 => 0.6
		   0.65 => 0.6
		  -0.65 => -0.7
		 1.9999 => 1.9
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -0.1

	precision: 2
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 1.99
		-1.9999 => -2
		 0.0001 => 0
		-0.0001 => -0.01

	precision: 10
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 1.9999
		-1.9999 => -1.9999
		 0.0001 => 0.0001
		-0.0001 => -0.0001

mode: TowardsZero
	precision: -1
		    2.5 => 0
		   -2.5 => -0
		    3.5 => 0
		   -3.5 => -0
		      7 => 0
		     -7 => -0
		  15.51 => 10
		 -15.51 => -10
		      5 => 0
		     -5 => -0
		   0.61 => 0
		   0.69 => 0
		   0.65 => 0
		  -0.65 => -0
		 1.9999 => 0
		-1.9999 => -0
		 0.0001 => 0
		-0.0001 => -0

	precision: 0
		    2.5 => 2
		   -2.5 => -2
		    3.5 => 3
		   -3.5 => -3
		      7 => 7
		     -7 => -7
		  15.51 => 15
		 -15.51 => -15
		      5 => 5
		     -5 => -5
		   0.61 => 0
		   0.69 => 0
		   0.65 => 0
		  -0.65 => -0
		 1.9999 => 1
		-1.9999 => -1
		 0.0001 => 0
		-0.0001 => -0

	precision: 1
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.5
		 -15.51 => -15.5
		      5 => 5
		     -5 => -5
		   0.61 => 0.6
		   0.69 => 0.6
		   0.65 => 0.6
		  -0.65 => -0.6
		 1.9999 => 1.9
		-1.9999 => -1.9
		 0.0001 => 0
		-0.0001 => -0

	precision: 2
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 1.99
		-1.9999 => -1.99
		 0.0001 => 0
		-0.0001 => -0

	precision: 10
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 1.9999
		-1.9999 => -1.9999
		 0.0001 => 0.0001
		-0.0001 => -0.0001

mode: AwayFromZero
	precision: -1
		    2.5 => 10
		   -2.5 => -10
		    3.5 => 10
		   -3.5 => -10
		      7 => 10
		     -7 => -10
		  15.51 => 20
		 -15.51 => -20
		      5 => 10
		     -5 => -10
		   0.61 => 10
		   0.69 => 10
		   0.65 => 10
		  -0.65 => -10
		 1.9999 => 10
		-1.9999 => -10
		 0.0001 => 10
		-0.0001 => -10

	precision: 0
		    2.5 => 3
		   -2.5 => -3
		    3.5 => 4
		   -3.5 => -4
		      7 => 7
		     -7 => -7
		  15.51 => 16
		 -15.51 => -16
		      5 => 5
		     -5 => -5
		   0.61 => 1
		   0.69 => 1
		   0.65 => 1
		  -0.65 => -1
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 1
		-0.0001 => -1

	precision: 1
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.6
		 -15.51 => -15.6
		      5 => 5
		     -5 => -5
		   0.61 => 0.7
		   0.69 => 0.7
		   0.65 => 0.7
		  -0.65 => -0.7
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 0.1
		-0.0001 => -0.1

	precision: 2
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 2
		-1.9999 => -2
		 0.0001 => 0.01
		-0.0001 => -0.01

	precision: 10
		    2.5 => 2.5
		   -2.5 => -2.5
		    3.5 => 3.5
		   -3.5 => -3.5
		      7 => 7
		     -7 => -7
		  15.51 => 15.51
		 -15.51 => -15.51
		      5 => 5
		     -5 => -5
		   0.61 => 0.61
		   0.69 => 0.69
		   0.65 => 0.65
		  -0.65 => -0.65
		 1.9999 => 1.9999
		-1.9999 => -1.9999
		 0.0001 => 0.0001
		-0.0001 => -0.0001
