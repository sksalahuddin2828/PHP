function stack_sack($items, $weight, $value, $number) {
    $knapsack = array();
  
    // Build table for knapsack[][] in bottom up manner
    for ($i = 0; $i <= $number; $i++) {
        $knapsack[$i] = array();
        for ($j = 0; $j <= $items; $j++) {
            if ($i == 0 || $j == 0) {
                $knapsack[$i][$j] = 0;
            } elseif ($weight[$i - 1] <= $j) {
                $knapsack[$i][$j] = max($value[$i - 1] + $knapsack[$i - 1][$j - $weight[$i - 1]], $knapsack[$i - 1][$j]);
            } else {
                $knapsack[$i][$j] = $knapsack[$i - 1][$j];
            }
        }
    }
  
    return $knapsack[$number][$items];
}

$value = [60, 100, 120];
$weight = [10, 20, 30];
$items = 50;
$number = count($value);
echo stack_sack($items, $weight, $value, $number);
