<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>QR Code Generator</title>
</head>
<body>
  <form action="generateQR.php" method= "post">
    <h3>Make Your Own QR Code</h3>
    <!--<label for="name">Enter Name: </label> -->
    <input type="text" name= "name" placeholder = "Enter Your Desire Name"><br>
    <input type="submit" value="Generate QR Code" name= "generate" class= "btn">
  </form>
</body>
</html>