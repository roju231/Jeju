<?php
include 'connection.php';
session_start();



$image_file = $_FILES["image"];

// Image not defined, let's exit
// if (!isset($image_file)) {
//     die('No file uploaded.');
// }
if (isset($_POST["btn"])) {
    if(isset($_POST['name'])){
        $name= $_POST['name'];
    } else {
        $name= '';
    }

    if(isset($_POST['recipe'])){
        $recipe= $_POST['recipe'];
    } else {
        $recipe= '';
    }
    if(isset($_POST['food_type'])){
        $food_type= $_POST['food_type'];
    } else {
        $food_type= '';
    }
    if (isset($_FILES["image"])) {
        echo 'yh';
        $image_dir= "/images/" . $image_file["name"];
        move_uploaded_file(
            // Temp image location
            $image_file["tmp_name"],
        
            // New image location, __DIR__ is the location of the current PHP file
            __DIR__ . "/images/" . $image_file["name"]
        );
    }
    
    // if(isset($_POST['title'])&&isset($_POST['content'])&&isset($image_file)){
    //     echo $image_dir;
    //      $userid= $_SESSION['foodbizuser'];
    //         $query = "INSERT INTO recipes (author, title, content, image) VALUES ('$userid','$title', '$content', '$image_dir')";
    //         $result = mysqli_query($mysqli, $query);
    //         header("Location: upload_recipe.php");
    //         die();
    //         // // Fetch all
    //         // mysqli_fetch_all($result, MYSQLI_ASSOC);
    // } else {
    //     $title= '';
    // }
    if(isset($_POST['name'])&&isset($_POST['recipe'])&&isset($image_file)&&isset($_POST['food_type'])){
        echo 'tvup';
        $userId= '';
        if(isset($_SESSION['jjuser'])){
            echo 'trup';
            $uuid= $_SESSION['jjuser'];
        }
        echo 'vup';
            $query = "INSERT INTO recipe (owner, name, recipe, image, food_type) VALUES ('$userId','$name', '$recipe', '$image_dir', '$food_type')";
            echo 'gshsg';
            $result = mysqli_query($db_conn, $query);
            echo 'ngddjdjah';
            header("Location: add_recipe.php");
            die();
            // // Fetch all
            // mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $name= '';
    }
    
}


// Move the temp image file to the images/ directory


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
    <div style='background-color: #f8fae4;' class="top-container">
          <div style='display: flex;'>
            <div style='padding-left: 30px;padding-top: 40px;'>
                <form method='post' action="add_recipe.php" enctype='multipart/form-data'>
                    <input type="hidden" name="upload_recipe" value="upload_recipe">
                    <label for="name">Name</label>
                    <div>
                    <input class='recipe_input' placeholder='' type="text" name="name" required><br>
                    </div>
                    <label for="body">Recipe</label>
                    <div>
                    <textArea rows=20 class='recipe_input' placeholder='' type="text" name="recipe" required></textArea><br>
                    </div>
                    <label for="image">Image</label>
                    <div>
                    <input  type="file"  name="image" accept="image/*" required><br>
                    </div>
                    <div>
                <select name="food_type" class='auth_select' id="">
                    <option disabled selected><span style='font-size: 12px'>select recipe category</span></option>
                    <option value="salad">dinner</option>
                    <option value="salad">food</option>
                    <option value="soup">gluten-free</option>
                    <option value="sweet">healthy</option>
                    <option value="pasta">holiday</option>
                </select> 
                </div>
                    <div>
                    <input class='reg-btn' type="submit" name='btn' value="Submit">
                    </div>  
                </form>
            </div>
          </div>
    </div>
</body>
<!-- <script src='js/recipe.js'></script> -->
  
</html>