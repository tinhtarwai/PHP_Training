<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Generate QR Code</title>
</head>
<body>
    <?php
    require_once 'phpqrcode/qrlib.php';

    if (isset($_POST['generate']) && !empty($_POST['name'])) {
        $path = 'QR_codes/';
        $file = $path . $_POST['name'] . '.png';
        $name = $_POST['name'];
        echo "<center><h2>Your QR Code is heare!</h2></center>";
        QRcode::png($name, $file, 'L', 5, 2);
        ?>
        <center><img src='QR_codes/<?php echo $_POST['name'] ?>.png'></center>
        <center><h4><?php echo $_POST['name'] ?>.png</h4></center>
        <a href = "index.php" class = "next">Create another QR code
        <?php   
    } else {
        echo "<p class = warning>Please enter a name!</p>";
        header('Refresh:3; URL= index.php');
    }
?>
</body>
</html>
