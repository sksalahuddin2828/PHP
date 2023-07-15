function is_armstrong_number($n) {
    $numDigits = strlen((string)$n);
    $sumOfPowers = 0;
    $temp = $n;
    while ($temp > 0) {
        $digit = $temp % 10;
        $sumOfPowers += pow($digit, $numDigits);
        $temp = (int)($temp / 10);
    }
    return $n === $sumOfPowers;
}

echo "Enter a number: ";
$user_input = readline();
if (is_armstrong_number($user_input)) {
    echo "$user_input is an Armstrong number." . PHP_EOL;
} else {
    echo "$user_input is not an Armstrong number." . PHP_EOL;
}

//-------------------------------------------------------------------------------------

function is_armstrong_number($n) {
    $numDigits = strlen((string)$n);
    $sumOfPowers = 0;
    $temp = $n;
    while ($temp > 0) {
        $digit = $temp % 10;
        $sumOfPowers += pow($digit, $numDigits);
        $temp = (int)($temp / 10);
    }
    return $n === $sumOfPowers;
}

echo is_armstrong_number(153) ? 'true' : 'false';  

// Output: true
