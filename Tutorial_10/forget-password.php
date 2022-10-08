<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <link rel="stylesheet" href="css/style.css">
    <title>Reset Password Tutorial</title> 
</head>
<body> 
    <div>
        <h4><center> Send Reset Password Link with Expiry Time in PHP MySQL</center></h4>
        <form action="pw-reset-token.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Enter Your Email address</label><br><br>
                <input type="email" name="email" class="input" id="email" aria-describedby="emailHelp"><br><br>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div><br>
            <input type="submit" name="submit" class="cmn-btn">
            <button class= "cmn-btn"><a href= "index.php">Cancel</a></button>
        </form>
    </div>
</body>
</html>

