<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "idea_and_funding"; 

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["Email"]; 
    $password = $_POST["password"];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert data into the login_data table
    $sql = "INSERT INTO login_data (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or wherever you want
        header("Location: registration_success.html");
        exit();
    } else {
        // If an error occurs, redirect back to the registration page with an error message
        header("Location: registration.php?error=1");
        exit();
    }
}

// Close the database connection
$conn->close();
?>
