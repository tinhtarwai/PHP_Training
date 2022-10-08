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
        if(isset($_POST['reset'])) {
            $opass = $_POST['opass'];
            $npass = $_POST['npass'];
            if(!empty($opass) and !empty($npass)) {
                $sql = "select * from user where password = '$opass'";  
                $result = mysqli_query($conn, $sql);  
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                $count = mysqli_num_rows($result);  
                 
                if($count == 1){  
                    $upd = "update user set password = '$npass' where password = '$opass';";
                    $res = mysqli_query($conn, $upd);
                    if($res) {
                        $to = $row['email'];
                        $subject = "Password Reset Inform";
                        $txt = 'Hello! Your Passwaord has changed successfully <br><a href="localhost/PHP_Training/Tutorail_10/index.php"> visit here </a>';
                        $headers = 'From: <webmaster@example.com>' . "\r\n" .
                        'CC: tinhtarwai106330@gmail.com';
                        mail($to,$subject,$txt,$headers);
                        echo "<h3><center>Your password has changed successfully!</center></h3>";
                        header('Refresh: 1; URL = index.php');
                    }
                    else {
                      
                        echo "<h3><center>Something Wrong! you can't change your password.</center></h3>";
                        header('Refresh: 1; URL = reset.php');
                    }
                } else {
                    echo "No record found!";
                }
            } else {
                echo "<center><h3> Please fill required fields</h3></center>";  
                header ("Refresh:2, URL=reset.php");
            }
           
        }
    ?>

    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "post">
        <label>Your Password: </label> 
        <input type = "password" name = "opass" placeholder = "Enter your password" class="input"><br><br>
        <label>New Password: </label> 
        <input type = "password" name = "npass" placeholder = "Enter your password" class="input"><br><br>
        <input type="submit" value = "Reset" name = "reset" class = "cmn-btn">
        <button class= "cmn-btn"><a href= "welcome.php">Cancel</a></button>
    </form><br>
</body>
</html>