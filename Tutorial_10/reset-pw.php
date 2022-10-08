<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <title>Reset Password Tutorail</title>
</head>
<body> 
    <div>
        <h4><center>Reset Password In PHP MySQL</center></h4>
        <?php
            if($_GET['key'] && $_GET['token']) {
                include "dbconnect.php";
                $email = $_GET['key'];
                $token = $_GET['token'];
                $query = mysqli_query($conn,
                "SELECT * FROM `user` WHERE `reset_link_token`='".$token."' and `email`='".$email."';"
                );
                $curDate = date("Y-m-d H:i:s");
                if (mysqli_num_rows($query) > 0) {
                    $row= mysqli_fetch_array($query);
                    if($row['exp_date'] >= $curDate){ ?>
                        <form action="update-forget-pw.php" method="post">
                            <input type="hidden" name="email" value="<?php echo $email;?>">
                            <input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
                            <div class="form-group">
                            <label for="exampleInputEmail1">New Password</label>
                            <input type="password" name='password' class="input" autofocus>
                            </div>  <br>              
                            <div class="form-group">
                            <label for="exampleInputEmail1">Confirm Password</label>
                            <input type="password" name='cpassword' class="input">
                            </div><br> 
                            <input type="submit" name="new-password" class="cmn-btn">
                        </form>
                    <?php 
                    } 
                } else {
                    echo" <p>This forget password link has been expired. Try Again</p>";
                    header('Refresh: 2; URL = index.php');
                }
            }
    ?>
    </div>
   
</body>
</html>