
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
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        if(!empty($id) && !empty($name) && !empty($age) && !empty($gender) && !empty($phone) && !empty($address)) {
            $sql = "UPDATE users SET user_id = $id, user_name = '$name', age = $age, gender = '$gender', 
                    phone = $phone, address = '$address' WHERE user_id = $id;";
            
            $result =  mysqli_query($conn, $sql);
            if ($result) {
                echo "<p class = success>Congratulation! Updated successfully<p>";
                header('Refresh:2; URL= index.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "<p class = warning>Please fill all the required field!</p>";
            header('Refresh:2; URL= user-edit.php?updateid='.$id.'');
        }
    } else {
        echo "something wrong";
    }
    mysqli_close($conn);  
?>
</body>
</html>