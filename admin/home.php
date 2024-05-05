<?php
$conn = new mysqli('localhost', 'root', '', 'recipe_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select data from the database
$sql = "SELECT * FROM recipes";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../recipes-sharing-PHP/css/index.css">
    <link rel="stylesheet" href="../../recipes-sharing-PHP/css/fontawesome-free-6.5.2-web/fontawesome-free-6.5.2-web/css/all.min.css">
    <title>Recipe-Sharing</title>
</head>
<body>
    <div class="navbar">
        <img src="../../recipes-sharing-PHP/img/reaL update.png" alt="Logo">
        <div class="links">
            <a href="../recipes-sharing-PHP/admin/progile.php">profile</a>
            <a href="../recipes-sharing-PHP/admin/login.html">Logout</a>
        </div>
        </div>
        <div class="heropage">
            <div class="searchbar">
                <input type="search" placeholder="Search Recipe">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <button><a href="../admin/manage.html" style='text-decoration:none; color:white'>Add Recipe</a></button>
            </div>
            <section>
            <h1>Current Chiefs</h1>
            <div class="craving-container">
            <?php
            $sql = "SELECT * FROM users";
            $user = $conn->query($sql);
                $data = array();
                if ($user->num_rows > 0) {
                    while ($row = $user->fetch_assoc()) {
                        $users[] = $row;
                    }
                }
                // Assuming $data contains the fetched data
         foreach ($users as $row) {
            echo " <div class='craving'>";
           echo "<img src='../".basename($row['image'])."' alt='carving image'>";
           echo  "<h3>".$row['name']."</h3>";
           echo "</div>";
            }

                
                ?>
            </div>
            </section>
            <section>
            <h1>MORE RECIPES</h1>
            <div class="more-recipes">
                <?php
                $data = array();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                    }
                }
                // Assuming $data contains the fetched data
         foreach ($data as $row) {
            echo " <div class='recipes'>";
           echo "<img src='../".basename($row['image'])."' alt='carving image'>";
           echo  "<h3>".$row['name']."</h3>";
           echo "</div>";
            }

                $conn->close();
                ?>
             
            </div>
            </section>
            <section>
            <h1>COLLECTIONS</h1>
            <div class="collections">
             <div class="recipes">
                <img src="/img/IMG_7085.jpg" alt="carving image">
                <h3>Collections</h3>
             </div>
             <div class="recipes">
                <img src="/img/IMG_7085.jpg" alt="carving image">
                <h3>Collections</h3>
             </div>
             <div class="recipes">
                <img src="/img/IMG_7085.jpg" alt="carving image">
                <h3>Collections</h3>
             </div>
             
            </div>
            </section>
            <section>
                <div class="popular-container">
                    <div class="left">
                        <h2>Popular Recipe of the Month!</h2>
                        <a href="#">View More Recipes</a>
                    </div>
                    <div class="right">
                        <div class="popular">
                            <img src="/img/tomatoes-tomatoes-lemon-leaves-garlic-bottle-oil.jpg" alt="">
                            <p>Lorem Ipsum is simply dummy text of the printing and 
                                typesetting industry. Lorem Ipsum has been the industry's standard
                                 dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                                  to make a type specimen book.</p>
                        </div>
                        <div class="popular">
                            <img src="/img/tomatoes-tomatoes-lemon-leaves-garlic-bottle-oil.jpg" alt="">
                            <p>Lorem Ipsum is simply dummy text of the printing and 
                                typesetting industry. Lorem Ipsum has been the industry's standard
                                 dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                                  to make a type specimen book.</p>
                        </div>
                        
                    </div>
                </div>
            </section>
            <div class="footer">
                <div class="aboutus">
                    <h2>About us</h2>
                    <p>t is a long established fact that a reader will be distracted by the readable
                         content of a page when looking at its layout. The point
                         of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                         </div>
                         <div class="contactus">
                            <h2>Contact Us</h2>
                             <i class="facebook fa-brands fa-facebook"></i> 
                             <i class="instagram fa-brands fa-instagram"></i>
                             <i class="twitter fa-brands fa-twitter"></i>
                         </div>
            </div>
</body>
</html>