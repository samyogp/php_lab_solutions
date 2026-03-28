<?php
function logErrorToFile($errno, $errstr, $errfile, $errline) {
    $logMessage = "[" . date("Y-m-d H:i:s") . "] Error [$errno]: $errstr in $errfile on line $errline\n";
    error_log($logMessage, 3, "errors.log");
}

set_error_handler("logErrorToFile");

// Trigger error
echo $undefined;

echo "Check error in errors.log file.";
?>
// hehe 