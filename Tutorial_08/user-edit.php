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
    <title>CRUD Tuto</title>
</head>
<body>

<?php
    $id = $_GET['updateid'];
    $sql = "SELECT * FROM users where user_id = $id;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['user_name'];
    $age = $row['age'];
    $gender = $row['gender'];
    $phone = $row['phone'];
    $address = $row['address'];
?>
    <div class = "div">
        <h3 class= "ttl">Edit User's Information</h3>
        <button  class="cmn-btn show"><a href="index.php"> Show User List</a></button>
    </div>
 
    <form action="update.php" method="post"> 
        <label for="name">User ID</label><br>
        <input type="text" name="id" class="input" value = <?php echo $id; ?>><br><br>

        <label for="name">User Name</label><br>
        <input type="text" name="name" class="input" value = <?php echo "$name"; ?>><br><br>

        <label for="age">Age</label><br>
        <input type="text" name="age" class="input" value = <?php echo $age; ?>><br><br>
        
        <label for="gender">Gender</label> &nbsp;&nbsp;&nbsp;
        <input type="radio" name="gender" value = <?php echo "$gender"; ?>>Male
        <input type="radio" name="gender" value = <?php echo "$gender"; ?>>Female<br><br>
        
        <label for="phone">Phone No</label><br>
        <input type="text" name="phone" class="input" value = <?php echo $phone; ?>><br><br>
        
        <label for="address">Address</label><br>
        <input type="text" name="address" class="input" value = <?php echo "$address"; ?>>
        <br><br>
        <button type="submit" class= "update-btn" name = "update">Update</button>
    </form>
</body>
</html>