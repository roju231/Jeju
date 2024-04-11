<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        
    } elseif (isset($_POST['signup'])) { // Check if signup form is submitted
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $retype_password = $_POST['retype_password'];

        // Check if passwords match
        if ($password !== $retype_password) {
            echo "Passwords do not match";
            exit();
        }

        
    }
}
?>
