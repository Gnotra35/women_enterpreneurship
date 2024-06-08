<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "idea_and_funding"; // Replace "your_database_name" with your actual database name

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Check if the signup form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        // Redirect back to signup page with an error message
        header("Location: signup.php?error=password_mismatch");
        exit();
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert data into the signup_data table
    $sql = "INSERT INTO signup_data (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or wherever you want
        header("Location: /web/html/home.html");
        exit();
    } else {
        // If an error occurs, redirect back to the signup page with an error message
        header("Location: signup.php?error=database_error");
        exit();
    }
}

// Close the database connection
$conn->close();
?>
