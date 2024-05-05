<?php
// check server method
if($_SERVER['REQUEST_METHOD']=='POST'){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipe_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$password= $conn->real_escape_string($_POST['password']);
$hashed=password_hash($password,PASSWORD_DEFAULT);

// Attempt insert query execution
$sql = "INSERT INTO users (name, email,password) VALUES ('$name', '$email','$hashed')";
if ($conn->query($sql) === TRUE) {
    echo "user inserted successfu";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

// Close connection
$conn->close();
?>
