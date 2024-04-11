<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['recipe_name']) && isset($_POST['recipe_description']) && isset($_FILES['recipe_image'])) {
        $recipe_name = $_POST['recipe_name'];
        $recipe_description = $_POST['recipe_description'];

        
        $file_name = $_FILES['recipe_image']['name'];
        $file_tmp = $_FILES['recipe_image']['tmp_name'];

        
        $upload_dir = "uploads/";

        
        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
            
            echo "Recipe uploaded successfully!";
        } else {
            
            echo "Error uploading file!";
        }
    } else {
        
        echo "Please fill all fields!";
    }
}
?>
