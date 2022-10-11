<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <form action = "login.php" method = "post">
        <label>Username: </label>  
        <input type = "text" name = "name" placeholder = "Enter your name or email"><br><br>
        <label>Password: </label>  
        <input type = "password" name = "pass" placeholder = "Enter your password"><br><br>
        <input type="submit" value = "Login" name = "login" class = "login">
    </form><br>
</body>
</html>