<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $cat = $_POST['category'];
    $desc = $_POST['desc'];
    $userId = $_SESSION['userId'];
    $posted_at = date("l, F jS Y, g:i A");

    // File upload handling
    $target_dir = dirname(__DIR__).'/img/recipes/';
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";

            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'recipe_db');

            if ($conn->connect_error) {
                die("Connection Failed: " . $conn->connect_error);
            }

            // Use prepared statement to prevent SQL injection
           
            $stmt = $conn->prepare("INSERT INTO recipes (name, category, description, image, userId, posted_at) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssis", $title, $cat, $desc, $target_file, $userId, $posted_at);
            
            if ($stmt->execute()) {
                echo 'Recipe sent';
            } else {
                echo "Error inserting into database: " . $conn->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
            echo "Debugging info: " . $_FILES["image"]["error"];
        }
    }
}
?>
