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
    <div class= "div">
        <h2 class = "ttl">User List</h2>
        <button  class="cmn-btn add"><a href="user-add.php"> Add new user</a></button>
    </div>
    <table>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Phone No</th>
            <th>Address</th>
            <th colspan="2">Operations</th>
        </tr>
    <?php
    $sql = "SELECT * FROM users;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['user_id'];
            $name = $row['user_name'];
            $age = $row['age'];
            $gender = $row['gender'];
            $phone = $row['phone'];
            $address = $row['address'];
        
            echo '<tr>
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$age.'</td>
                <td>'.$gender.'</td>
                <td>'.$phone.'</td>
                <td>'.$address.'</td>
                <td>
                    <button class= "cmn-btn edit"><a href= "user-edit.php?updateid='.$id.'">Edit</a></button>
                    <button class= "cmn-btn delete"><a href= "user-delete.php?deleteid='.$id.'">Delete</a></button>
                </td>
            </tr>
            ';
        };
      ?>
    </table>
    <?php
    };
    ?> 
</body>
</html>