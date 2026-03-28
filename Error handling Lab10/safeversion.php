<?php
echo "Start of Script<br>";

// Warning example (file include removed)
@include 'nonexistent_file.php';

echo "<br><b>This will be executed, warning doesn't halt the program</b><br>";

// Notice example fixed
$myvar = "Defined now";
echo "Variable value: $myvar<br>";

$number = 10;

// Prevent fatal error
if ($number != 0) {
    $result = $number / 2;
    echo "Result is: $result";
} else {
    echo "Cannot divide by zero";
}
?>
