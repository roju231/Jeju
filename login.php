<?php
include 'connection.php';
session_start();

//Values 
if(isset($_POST['email'])){
    $email= $_POST['email'];
} else {
    $email= '';
}

if(isset($_POST['firstname'])){
    $firstname= $_POST['firstname'];
} else {
    $firstname= '';
}
if(isset($_POST['middlename'])){
    $middlename= $_POST['middlename'];
} else {
    $middlename= '';
}

if(isset($_POST['lastname'])){
    $lastname= $_POST['lastname'];
} else {
    $lastname= '';
}

if(isset($_POST['password'])){
    $password= $_POST['password'];
} else {
    $password= '';
}

if(isset($_POST['retype_password'])){
    $confirmpass= $_POST['retype_password'];
} else {
    $confirmpass= '';
}


if(isset($_POST['retype_password']) && $confirmpass!='' && $confirmpass==$password){
    $query0= "SELECT firstname, lastname, password, usertype from users where email= '$email'";
    $result0 = mysqli_query($db_conn, $query0);
    $result0Array = $result0 -> fetch_array(MYSQLI_NUM);
    if($result0Array==[]){
        print($result0Array[0]);
        $query = "INSERT INTO users (firstname, middlename, lastname, email, password, usertype) VALUES ('$firstname', '$middlename', '$lastname', '$email', '$password', 'chef')";
        $result = mysqli_query($db_conn, $query);

        header("Location: login.php");
        die();
    } 
}





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
        <div class="register_form">
        <h1>Sign In</h1>
        <form method="post" action="login.php">
            <input type="hidden" name="signup" value="signup">
            <input class='reg_input' placeholder='Email address..' type="text" type="email" name="email" required><br>
            <input class='reg_input' placeholder='Password..' type="password" name="password" required><br>
            <?php
                    if(isset($_POST['email']) && isset($_POST['password']) ){
                        $query= "SELECT firstname, lastname, password, usertype,  from users where email= '$email'";
                        $result = mysqli_query($db_conn, $query);
                        $product = $result -> fetch_array(MYSQLI_NUM);
                        if($product!=[]){
                            if ($password==$product[2]) {
                                $_SESSION['isLoggedin'] = "true";
                                $_SESSION['currentuser'] = $product[0];
                                $_SESSION['currentcategory'] = $product[3];
                                $_SESSION['jjuser'] = $email;
                                header("Location: index.php");
                            } else {
                                echo "invalid username or password";
                            }
                        } else {
                            echo "invalid username or password";
                        }
                    }
                    mysqli_close($db_conn);
                ?>
            <div>
            <input class='reg-btn' type="submit" value="Sign In">

            </div>            
        </form>
         </div>
        <img class="sec-bg" src="images/pexels-terje-sollie-299348.jpg" alt="">
        
    </div>
</body>
</html>