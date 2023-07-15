function is_palindrome($s) {
    $s = preg_replace("/[^0-9a-zA-Z]/", "", strtolower($s));
    return $s === strrev($s);
}

echo "Enter a string: ";
$user_input = readline();
if (is_palindrome($user_input)) {
    echo "'$user_input' is a palindrome." . PHP_EOL;
} else {
    echo "'$user_input' is not a palindrome." . PHP_EOL;
}

//------------------------------------------------------------------

function is_palindrome($s) {
    $s = preg_replace("/[^0-9a-zA-Z]/", "", strtolower($s));
    return $s === strrev($s);
}

echo is_palindrome("A man, a plan, a canal: Panama") ? 'true' : 'false'; 

// Output: true
