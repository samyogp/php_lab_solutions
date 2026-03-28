<?php
function myErrorHandler($errno, $errstr, $errfile, $errline) {
    echo "<b>Error:</b> [$errno] $errstr<br>";
    echo "Don't worry! We're working on it.<br>";
}

set_error_handler("myErrorHandler");

// Trigger warning
echo $undefinedvar;

// Fatal error (won't be handled)
echo "10 / 0";
?>
