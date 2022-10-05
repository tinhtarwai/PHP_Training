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
    if (isset($_POST['add'])) {
        //$id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        if(!empty($name) && !empty($age) && !empty($gender) && !empty($phone) && !empty($address)) {
            $sql = "insert into users (user_name, age, gender, phone, address) values ('$name', $age, '$gender', $phone, '$address');";
            if (mysqli_query($conn, $sql)) {
                echo "<p class = success>Congratulation! New record added successfully<p>";
                header('Refresh:2; URL= index.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
       
        } else {
            echo "<p class = warning>Please fill all the required field!</p>";
            header('Refresh:2; URL= user-add.php');
        }
    }
    mysqli_close($conn);    
?>
</body>
</html>