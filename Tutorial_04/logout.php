<?php
   session_start();
   unset($_SESSION["name"]);
   unset($_SESSION["pass"]);
   
   echo 'You have cleaned session';
   header('Refresh: 1; URL = login.php');
?>