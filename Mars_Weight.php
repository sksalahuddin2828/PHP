<?php

// Use constants
define('MARS_MULTIPLE', 0.378);

function main() {
    $earth_weight_str = readline('Enter a weight on Earth: ');

    // Get the numeric value since readline() returns a string
    $earth_weight = (float) $earth_weight_str;

    // Having a variable for each piece of information is a good habit
    $mars_weight = $earth_weight * MARS_MULTIPLE;
    $rounded_mars_weight = round($mars_weight, 2);

    // Note the string concatenation!
    echo 'The equivalent weight on Mars: ' . $rounded_mars_weight . PHP_EOL;
}

if (php_sapi_name() === 'cli') {
    main();
}
?>
