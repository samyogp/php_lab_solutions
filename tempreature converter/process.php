<!DOCTYPE html>
<html>
<head>
<title>Form Demo</title>
</head>
<body>

<h2>Simple Form</h2>

<form action="process.php" method="post">
    Name: <input type="text" name="username"><br><br>
    Email: <input type="email" name="email"><br><br>
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $email = $_POST['email'];

    echo "<h2>Form Data Received</h2>";
    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
} else {
    echo "Form not submitted correctly.";
}
?>


</body>
</html>
