<?php
    require ('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Reset Password Tutorial</title>
</head>

<body>
    <form action = "login.php" method = "post">
        <!--<label>Email: </label>  -->
        <input type="email" name="email" placeholder = "Enter your email" autofocus autocomplete = "on" class="input"><br><br>
        <!--<label>Password: </label>  -->
        <input type = "password" name = "pass" placeholder = "Enter your password" class="input"><br><br>
        <input type="submit" value = "Login" name = "login" class = "cmn-btn">
        <p><a href= "forget-password.php">Forget Password?</a></p>
        <p>Don't have an account?<br> <a href= "signup.php">Sign up here!</a></p>
    </form><br>
</body>
</html>