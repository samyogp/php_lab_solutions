<!DOCTYPE html>
<html>
<head>
    <title>Day Finder</title>
</head>
<body>

<form method="post">
    Enter day number (1-7):
    <input type="number" name="day" min="1" max="7" required>
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day = $_POST["day"];

    switch ($day) {
        case 1: echo "Sunday"; break;
        case 2: echo "Monday"; break;
        case 3: echo "Tuesday"; break;
        case 4: echo "Wednesday"; break;
        case 5: echo "Thursday"; break;
        case 6: echo "Friday"; break;
        case 7: echo "Saturday"; break;
        default: echo "Invalid Day";
    }
}
?>

</body>
</html>
