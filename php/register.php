<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "recipe_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['pass<word']);

// Attempt insert query execution
$sql = "INSERT INTO users (name, email,password) VALUES ('$name', '$email','$password')";
if ($conn->query($sql) === TRUE) {
    echo "user inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
