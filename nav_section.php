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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Merienda:wght@300..900&family=Varela&display=swap" rel="stylesheet">
</head>
<body >
    <nav class="layout_nav">
        <div style='padding-left: 20px;'>
            <div class="logo">Jeju</div>
            <div class="subtxt">home of recipe</div>
        </div>
        <div class="options_container">
            <a class="navoptions" style="color: #3d6d9b;" href="planner.php">home</a>
            <?php if(!isset($_SESSION['jjprofile']) && ($_SESSION['jjprofile']=='chef' || $_SESSION['jjprofile']=='admin')){
                // echo 'Sign Up';
            echo  '<a class="navoptions" href="dashboard.php">Dashboard<a>';
            } 
            ?> </a>
            <a href="recipepage.php" class="navoptions">recipes</a>
            <a class="navoptions">posts</a>
            <a class="navoptions">about</a>
            <a class="navoptions" href="blog.php">contact us</a>
            <a class="navoptions" href=""><?php if(isset($_SESSION['isLoggedin'])&&$_SESSION['isLoggedin']=='true'){
                echo 'welcome '.$_SESSION['currentuser'];
            } 
            ?> </a>
            <?php if(!isset($_SESSION['isLoggedin']) || $_SESSION['isLoggedin']!='true'){
                // echo 'Sign Up';
            echo  '<a class="navoptions" href="createAccount.php">Sign Up<a>';
            } 
            ?> </a>
            <?php if(!isset($_SESSION['isLoggedin']) ||$_SESSION['isLoggedin']!='true'){
                echo '<a class="navoptions" href="login.php">Sign In<a>';
            } 
            ?> </a>
            <?php if(isset($_SESSION['isLoggedin'])&&$_SESSION['isLoggedin']=='true'){
                echo '<a class="navoptions" href="logout.php">Log Out<a>';
            } 
            ?> </a>
        </div>
    </nav>
</body>
</html>