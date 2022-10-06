<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "eiton";
    $dbname = "user";

    // Create connection
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
    mysqli_select_db($conn, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
?>

