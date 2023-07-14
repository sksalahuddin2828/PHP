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

