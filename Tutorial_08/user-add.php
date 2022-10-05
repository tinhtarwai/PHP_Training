<?php
    require 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class = "div">
        <h3 class = "ttl">Add New User</h3>
        <button  class="cmn-btn show"><a href="index.php"> Show User List</a></button>
    </div>
 
    <form action="add.php" method="post">  
        <label for="name">User Name</label><br>
        <input type="text" class="input" name="name" ><br><br>

        <label for="age">Age</label><br>
        <input type="text" class="input" name="age" ><br><br>
        
        <label for="gender">Gender</label> &nbsp;&nbsp;&nbsp;
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="female">Female<br><br>
        
        <label for="phone">Phone No</label><br>
        <input type="text" class="input" name="phone" ><br><br>
        
        <label for="address">Address</label><br>
        <input type="text" class="input" name="address">
        <br><br>
        <input type="submit" class= "update-btn" value="Add User" name="add"> 
    </form>
  
</body>
</html>