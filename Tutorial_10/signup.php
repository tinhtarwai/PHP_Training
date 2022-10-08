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
    <title>Login</title>
</head>

<body>
    <?php
        if(isset($_POST['register'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
           
            if(!empty($email) and !empty($pass)) {
                $sql = "insert into user (name, email, password, exp_date, reset_link_token) values ('$name', '$email', '$pass', 'NULL', 'NULL');";
                $result = mysqli_query($conn, $sql);
                echo $sql;
                echo $result;
                if($result) {
                    echo "<h3><center>Cngratulations! You have signed up successfully.</center></h3>";
                    header ('Refresh:2, URL=index.php');
                } else {
                    echo "something went wrong!";
                }
                
            } else {
                echo "<center><h3> Please fill required fields</h3></center>";  
                header ("Refresh:2, URL=signup.php");
            }
        } else {
            //echo "something went wrong!";
        }
    ?>

    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "post">
        <!--<label>Email: </label>  -->
        <input type="text" name= "name" placeholder = "Enter your name" autofocus class="input"><br><br>
        <input type="email" name="email" placeholder = "Enter your email" class="input"><br><br>
        <!--<label>Password: </label>  -->
        <input type = "password" name = "pass" placeholder = "Enter your password" class="input"><br><br>
        <input type="submit" value = "Register" name = "register" class = "cmn-btn">
        <p>Already have an account?<br> <a href= "index.php">Login here!</a></p>
    </form><br>
</body>
</html>