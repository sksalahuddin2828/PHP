function kaprekar_constant($n) {
    $count = 0;
    while ($n != 6174) {
        $count++;
        $digits = str_pad($n, 4, '0', STR_PAD_LEFT);
        $ascending = (int)implode('', array_reverse(str_split($digits)));
        $descending = (int)implode('', str_split($digits));
        $n = $descending - $ascending;
    }
    return $count;
}

echo "Enter a number: ";
$user_input = readline();
$steps = kaprekar_constant($user_input);
echo "Number of steps to reach Kaprekar constant: $steps" . PHP_EOL;
