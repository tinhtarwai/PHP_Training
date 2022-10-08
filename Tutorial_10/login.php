<?php   
    include('dbconnect.php');  
    
    if(isset($_POST['login'])) {
        $email = $_POST['email'];  
        $pass = $_POST['pass'];
        if(!empty($email) and !empty($pass)) {
            $sql = "select * from user where email = '$email' and password = '$pass'";  
            $result = mysqli_query($conn, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
               
            if($count == 1){  
                echo "<h3><center> Login successful </center></h3>";  
                header ("Refresh:1, URL=welcome.php");
            }  
            else{  
                echo "<center><h3> Login failed. Invalid email or password.</h3></center>";  
                header ("Refresh:2, URL=index.php");
            }     
        } else {
            echo "<center><h3> Please fill required fields</h3></center>";  
            header ("Refresh:2, URL=index.php");
        }
       
    } else {
        echo "something wrong";
    }    
    mysqli_close($conn);
?>  