<?php
include 'connection.php';
session_start();
// $query = "SELECT Lastname, Age FROM Persons ORDER BY Lastname";
// $result = mysqli_query($mysqli, $query);


// // Fetch all
// mysqli_fetch_all($result, MYSQLI_ASSOC);

// // Free result set
// mysqli_free_result($result);

// mysqli_close($mysqli);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body >
    <div class="top-container">
        <div class="dim"></div>
        <div class='nav_container'>
        <?php
        include "nav_section.php";
        ?>
        </div>
        <div class="head_text">
        
            <div class='heading'>Brunch in Saint-Gilles</div>
            <button class="home_btn">read post</button>
         </div>
        <img class="bghome" src="images/pexels-lisa-fotios-1279330.jpg" alt="">
        
    </div>
</body>
</html>