<?php

// Use constants
define('MERCURY_GRAVITY', 0.376);
define('VENUS_GRAVITY', 0.889);
define('MARS_GRAVITY', 0.378);
define('JUPITER_GRAVITY', 2.36);
define('SATURN_GRAVITY', 1.081);
define('URANUS_GRAVITY', 0.815);
define('NEPTUNE_GRAVITY', 1.14);

function main() {
    // Prompt user to enter weight and store weight as well
    $earth_weight = (float) readline("Enter a weight on Earth: ");

    // Prompt the user for a planet
    $planet = readline("Enter a planet: ");
    $planet = ucfirst(strtolower($planet));
    
    // Ensure that the user enters a planet
    while (!in_array($planet, ["Mercury", "Venus", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune"])) {
        if ($planet == "Earth") {
            echo "Please select a planet other than Earth." . PHP_EOL;
        } else {
            echo "Error: " . $planet . " is not a planet." . PHP_EOL;
        }

        $planet = ucfirst(strtolower(readline("Enter a planet: ")));
    }

    // Calculate corresponding weight on the inputted planet
    // Assume that the user entered a planet correctly
    if ($planet == "Mercury") {
        $planet_weight = $earth_weight * MERCURY_GRAVITY;
    } elseif ($planet == "Venus") {
        $planet_weight = $earth_weight * VENUS_GRAVITY;
    } elseif ($planet == "Mars") {
        $planet_weight = $earth_weight * MARS_GRAVITY;
    } elseif ($planet == "Jupiter") {
        $planet_weight = $earth_weight * JUPITER_GRAVITY;
    } elseif ($planet == "Saturn") {
        $planet_weight = $earth_weight * SATURN_GRAVITY;
    } elseif ($planet == "Uranus") {
        $planet_weight = $earth_weight * URANUS_GRAVITY;
    } else {
        $planet_weight = $earth_weight * NEPTUNE_GRAVITY;
    }

    // Round it two decimal places
    $planet_weight_rounded = round($planet_weight, 2);

    // Print the output
    echo "The equivalent weight on " . $planet . ": " . $planet_weight_rounded . PHP_EOL;
}

if (php_sapi_name() === 'cli') {
    main();
}
?>


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------

  
// Planetary Weights Solution
// There are two key parts to this solution:

// 1. Everything from the first part of the problem: getting a user's input, converting it to a float to do the calculation, and covering it to a string to print it out.
// 2. Using if statements to check which gravitational constant to use based on the user's input.  
