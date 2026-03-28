<?php
// Step 1: Connect to database
$conn = mysqli_connect("localhost", "root", "", "user_form_lab");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Sanitize inputs
$errors = [];

$fullname = htmlspecialchars(trim($_POST['fullname']));
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$password = trim($_POST['password']);
$phone = trim($_POST['phone']);
$gender = $_POST['gender'] ?? '';
$colors = $_POST['colors'] ?? [];
$country = htmlspecialchars(trim($_POST['country']));
$about = htmlspecialchars(trim($_POST['about']));

// Step 3: Validation

// Email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

// Password validation
if (strlen($password) < 6) {
    $errors[] = "Password must be at least 6 characters.";
}

// Phone validation
if (!preg_match("/^\d{3}-\d{3}-\d{4}$/", $phone)) {
    $errors[] = "Phone must be in xxx-xxx-xxxx format.";
}

// Gender validation
if (empty($gender)) {
    $errors[] = "Please select gender.";
}

// Country validation
if (empty($country)) {
    $errors[] = "Please select country.";
}

// Step 4: Show errors
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>Error: $error</p>";
    }
    exit();
}

// Step 5: Secure password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Convert checkbox array
$colors_str = implode(", ", $colors);

// Step 6: Insert into database
$sql = "INSERT INTO users 
(fullname, email, password, phone, gender, colors, country, about)
VALUES 
('$fullname', '$email', '$hashed_password', '$phone', '$gender', '$colors_str', '$country', '$about')";

if (mysqli_query($conn, $sql)) {
    echo "<h3 style='color:green;'>Registration Successful!</h3>";
    echo "<p>Thank you, <strong>$fullname</strong>.</p>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>