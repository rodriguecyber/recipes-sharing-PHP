<?php

// codes to connect to database
if($_SERVER['REQUEST_METHOD']=='POST'){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "recipe_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
//   sql injection
    $email = $conn->real_escape_string($_POST['email']);
    $passwords = $conn->real_escape_string($_POST['password']);

    // select data from database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result) {
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            // veriofy hashed password and set session if authentication passes
            if(password_verify($passwords, $row['password'])){
                echo 'Logged in';
                 session_start();
                $_SESSION['name']=$row['name'];
                $_SESSION['email']=$row['email'];
                $_SESSION['profile']=$row['profile'];
                $_SESSION['followers']=$row['followers'];
                $_SESSION['userId']=$row['id'];
            } else {
                echo 'Incorrect password';
            }
        } else {
            echo 'Email not available';
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
