<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<?php
   $_SESSION["name"] = "mg mg";
   $_SESSION["pass"] = 1234;
  if (isset($_POST['login']) && !empty($_POST['name']) && !empty($_POST['pass'])) {
    //$_SESSION["name"] = $_POST["name"];
    //$_SESSION["pass"] = $_POST["pass"];
  
		if ($_POST['name'] == $_SESSION["name"] && $_POST['pass'] ==  $_SESSION["pass"]) {
       echo "<h3>Congratulations, you have Logged in successfully!</h3>";
    } else {
       echo "<h3>Invalid username or password, Try again!</h3>";
    }
  }
?>
<body>
  <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
    Username:   <input type = "text" name = "name" placeholder = "Enter your name or email"><br><br>
    Password:   <input type = "password" name = "pass" placeholder = "Enter your password"><br><br>
    <input type="submit" value = "Login" name = "login">
  </form><br>
  <a href = "logout.php">Log out
</body>
</html>