
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    




<form method="post">
Number 1: <input type="number" name="num1" required><br>
Number 2: <input type="number" name="num2" required><br>
<input type="submit" value="Divide">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $a = $_POST['num1'];
        $b = $_POST['num2'];

        if ($b == 0) {
            throw new Exception("Division by zero is not allowed.");
        }

        echo "Result: " . ($a / $b);
    } catch (Exception $e) {
        echo "Caught Exception: " . $e->getMessage();
    } finally {
        echo "<br>Operation completed.";
    }
}
?>

</body>
</html>
