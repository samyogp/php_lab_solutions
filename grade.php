<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
    Enter score (0-100):
    <input type="number" name="score">
    <input type="submit" value="Get Grade">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = $_POST["score"];

    if ($score >= 90) echo "Grade: A";
    elseif ($score >= 75) echo "Grade: B";
    elseif ($score >= 60) echo "Grade: C";
    elseif ($score >= 50) echo "Grade: D";
    else echo "Grade: F";
}
?>
</body>
</html>
