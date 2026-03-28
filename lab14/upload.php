<?php
// Step 1: Connect to database
$conn = mysqli_connect("localhost", "root", "", "image_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Check form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {

    $file_name = $_FILES['image']['name'];
    $temp_path = $_FILES['image']['tmp_name'];
    $file_size = $_FILES['image']['size'];
    $file_type = $_FILES['image']['type'];

    $upload_folder = "uploads/";
    $target_path = $upload_folder . basename($file_name);

    // Allowed file types
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

    // Validate file type
    if (!in_array($file_type, $allowed_types)) {
        echo "❌ Only JPG, PNG, and GIF files are allowed.";
        exit;
    }

    // Validate file size (max 10MB)
    if ($file_size > 10 * 1024 * 1024) {
        echo "❌ File size should not exceed 10MB.";
        exit;
    }

    // Step 3: Upload file
    if (move_uploaded_file($temp_path, $target_path)) {

        // Step 4: Insert into database
        $sql = "INSERT INTO images (filename, filepath)
                VALUES ('$file_name', '$target_path')";

        if (mysqli_query($conn, $sql)) {
            echo "✅ Image uploaded successfully!<br>";
            echo "<img src='$target_path' width='200'><br>";
        } else {
            echo "❌ Database error: " . mysqli_error($conn);
        }

    } else {
        echo "❌ Failed to upload file.";
    }

    mysqli_close($conn);
}
?>