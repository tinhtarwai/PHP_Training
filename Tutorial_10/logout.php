<?php
   session_start();
   unset($_SESSION["email"]);
   unset($_SESSION["pass"]);
   
   echo '<h3><center>Logout Successful!</center></h3>';
   header('Refresh: 1; URL = index.php');
?>