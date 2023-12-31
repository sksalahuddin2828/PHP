----------------------------------------------------------------PHP Coding Challenges---------------------------------------------------------

PHP Coding Challenges on Numbers 
Write a program in PHP to -

1. Convert decimal numbers to octal numbers.
2. Reverse an integer.
3. Print the Fibonacci series using the recursive method.
4. Return the Nth value from the Fibonacci sequence.
5. Find the average of numbers (with explanations).
6. Convert Celsius to Fahrenheit.

----------------------------------------------------------------Solution of Problem:---------------------------------------------------------

1. Converting Decimal Numbers to Octal Numbers:

<?php
$decimal_number = 25;
$octal_number = [];

while ($decimal_number > 0) {
    array_push($octal_number, $decimal_number % 8);
    $decimal_number = (int)($decimal_number / 8);
}

echo "Octal number: ";
for ($i = count($octal_number) - 1; $i >= 0; $i--) {
    echo $octal_number[$i];
}
?>

--------------------------------------------------------------------------------------------------------------------------------------------

2. Reversing an Integer:

<?php
$number = 12345;
$reversed_number = 0;

while ($number != 0) {
    $reversed_number = $reversed_number * 10 + $number % 10;
    $number = (int)($number / 10);
}

echo $reversed_number;
?>

--------------------------------------------------------------------------------------------------------------------------------------------

3. Printing the Fibonacci Series using Recursion:

<?php
function fibonacci($n) {
    if ($n <= 1) {
        return $n;
    } else {
        return fibonacci($n - 1) + fibonacci($n - 2);
    }
}

$n = 10;
echo "Fibonacci series: ";
for ($i = 0; $i < $n; $i++) {
    echo fibonacci($i) . " ";
}
?>


--------------------------------------------------------------------------------------------------------------------------------------------

4. Returning the Nth Value from the Fibonacci Sequence:

<?php
function fibonacci($n) {
    if ($n <= 1) {
        return $n;
    } else {
        return fibonacci($n - 1) + fibonacci($n - 2);
    }
}

$n = 10;
$fibonacci_number = fibonacci($n);
echo $fibonacci_number;
?>

--------------------------------------------------------------------------------------------------------------------------------------------

5. Finding the Average of Numbers:

<?php
$numbers = [10, 20, 30, 40, 50];
$average = array_sum($numbers) / count($numbers);
echo "Average: " . $average;
?>
