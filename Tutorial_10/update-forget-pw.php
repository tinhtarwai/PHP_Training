<?php
    include "dbconnect.php";
    $emailId = $_POST['email'];
    $token = $_POST['reset_link_token'];

    if(isset($_POST['new-password']) && !empty($token) && !empty($emailId)) { 
        //$password = md5($_POST['password']);
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if( $password == $cpassword) {
            $query = mysqli_query($conn,"SELECT * FROM `user` WHERE `reset_link_token`='".$token."' and `email`='".$emailId."'");
            $row = mysqli_num_rows($query);
            if($row) {
                mysqli_query($conn,"UPDATE user set  password='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE email='" . $emailId . "'");
                echo '<center><h3>Congratulations! Your password has been updated successfully.</h3><br> <a href= "index.php">Go to Login Page!</a></p></center>';
            }else{
            echo "<p>Something goes wrong. Please try again</p>";
            }
        } else {
            echo "<h3><center>Sorry! Password doesn't match. pls fill correctly</center></h3>";
            header ('Refresh:2, URL=reset-pw.php?key=" . $emailId . "&token=" . $token . "');
        } 
    }else {
        echo "something wrong!";
    } 
?>