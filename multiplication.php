<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="post">
    Enter number:
    <input type="number" name="num">
    <input type="submit" value="Show Table">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = $_POST["num"];
    for ($i = 1; $i <= 10; $i++) {
        echo "$n x $i = " . ($n*$i) . "<br>";
    }
}
?>
</body>
</html>


