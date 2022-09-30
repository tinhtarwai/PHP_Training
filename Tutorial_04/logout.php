<?php
   session_start();
   unset($_SESSION["name"]);
   unset($_SESSION["pass"]);
   
   echo '<h3>Logout Successful!</h3>';
   header('Refresh: 1; URL = index.php');
?>