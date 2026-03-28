<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = mysqli_connect("localhost", "root", "", "student_db");

    $id = $_POST['id'];

    $sql = "DELETE FROM students WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Student deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<form method="POST">
    Student ID: <input type="number" name="id"><br>
    <input type="submit" value="Delete Student">
</form>