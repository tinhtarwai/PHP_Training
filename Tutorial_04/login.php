
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login Successful</title>
</head>
<body>
<?php
    session_start();
    $_SESSION["name"] = "mg mg";
    $_SESSION["pass"] = 1234;
    if (isset($_POST['login']) && !empty($_POST['name']) && !empty($_POST['pass'])) {
        //$_SESSION["name"] = $_POST["name"];
        //$_SESSION["pass"] = $_POST["pass"];
    
        if ($_POST['name'] == $_SESSION["name"] && $_POST['pass'] ==  $_SESSION["pass"]) {
            echo "<h3 class = message>Congratulations, you have Logged in successfully!</h3>";
            ?>
            <a href = "logout.php" class = "logout">Log out
        <?php
        } else {
            echo "<h3 class = warn>Invalid username or password, Try again!</h3>";
            header('Refresh: 2; URL = index.php');
        }
    } else {
        echo "<h3 class = warn>You have to fill data!</h3>";
        header('Refresh: 2; URL = index.php');
    }
?>
</body>
</html>
