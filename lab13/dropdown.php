<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $theme = $_POST['theme'];

    setcookie("user_theme", $theme, time() + (7 * 24 * 60 * 60));

    header("Location: welcome.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Theme</title>
</head>
<body>

<h2>Select Theme (Dropdown)</h2>

<form method="POST">
    <label>Select Theme:</label>
    <select name="theme" required>
        <option value="">--Choose Theme--</option>
        <option value="light">Light Theme</option>
        <option value="dark">Dark Theme</option>
    </select><br><br>

    <input type="submit" value="Save Preference">
</form>

</body>
</html>