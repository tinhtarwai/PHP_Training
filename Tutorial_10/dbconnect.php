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

    $sql = "CREATE TABLE `user`.`user` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(45) NOT NULL,
        `email` VARCHAR(80) NOT NULL,
        `passwird` VARCHAR(100) NOT NULL,
        `exp_date` VARCHAR(45) NOT NULL,
        `reset_link_token` VARCHAR(45) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE);
      ";
    if(mysqli_query($conn, $sql)) {
        echo "table created successfully";
    } else {
        //echo "somthing went wrong!";
    }
?>
