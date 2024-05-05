<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../recipes-sharing-PHP/css/index.css">
    <link rel="stylesheet" href="../../recipes-sharing-PHP/css//fontawesome-free-6.5.2-web/fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="../../recipes-sharing-PHP/css/profile.css">
    <title>Recipe-Sharing</title>
</head>
<body>
    <div class="navbar">
        <img src="../../recipes-sharing-PHP/img/reaL update.png" alt="Logo">
        <div class="links">
            <a href="../../recipes-sharing-PHP/admin/home.php">Home</a>
            <a href="./../admin/">Recipes</a>
        </div>
        </div>
        <div class="profile">
            <img src="../../recipes-sharing-PHP/img/IMG_7085.jpg" alt="profile img">
            <div class="names">
               <h5><?php echo $_SESSION['name']; ?></h5>
               <span class="rating">
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
               </span>
                <span class="social">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                </span>
                </div>
                <div class="edit">
                    
                    <a href="#">Edit Profile</a>
                </div>
            </div>
            <div class="paragraph">

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
                    dummy text eversince the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
                    dummy text eversince the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
            </div>
            <div class="stat">
             <div class="likes">
                <p><?php echo $_SESSION['likes']=''?  $_SESSION['likes']: '0'; ?> </p>
                <p>likes</p>
             </div>
             <div class="follower">
                <p><?php echo $_SESSION['followers']; ?></p>
                <p>Follower</p>
             </div>
             <div class="likes">
                <p>0</p>
                <p>Reviews</p>
             </div>
             </div>
             <h4>Posted Recipes</h4>
             <?php
             $conn = new mysqli('localhost', 'root', '', 'recipe_db');

             // Check connection
             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             }
             
             // Select data from the database
             $sql = "SELECT * FROM recipes WHERE userId=" . $_SESSION['userId'];

             $result = $conn->query($sql);
             ?>
             
             <div class="posted">
                <?php
                 $data = array();
                 if ($result->num_rows > 0) {
                     while ($row = $result->fetch_assoc()) {
                         $data[] = $row;
                     }
                 }
                 // Assuming $data contains the fetched data
          foreach ($data as $row) {
           echo "<div class='posted1'>";
            echo "<img src='../".basename($row['image'])."' alt='posted'>";
              echo "<p>".$row['name']."</p>";
             echo " </div>"; 
             }
 
                 $conn->close();
                 ?>
               
                
             </div>
             <h4>Favourites</h4>
             <div class="posted">
                <div class="posted1">
                 <img src="../../recipes-sharing-PHP/img/tomatoes-tomatoes-lemon-leaves-garlic-bottle-oil.jpg" alt="posted">
                 <p>Favourites</p>
                 <p>chiefnames</p>
                </div>
                <div class="posted1">
                 <img src="../../recipes-sharing-PHP/img/tomatoes-tomatoes-lemon-leaves-garlic-bottle-oil.jpg" alt="posted">
                 <p>Favourites</p>
                 <p>chiefnames</p>
                </div>
                <div class="posted1">
                 <img src="../../recipes-sharing-PHP/img/tomatoes-tomatoes-lemon-leaves-garlic-bottle-oil.jpg" alt="posted">
                 <p>Favourites</p>
                 <p>chiefnames</p>
                </div>
             </div>

            </body>
            </html>