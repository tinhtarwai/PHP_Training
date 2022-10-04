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
    include "phpqrcode/qrlib.php";

    if (isset($_POST['generate']) && !empty($_POST['name'])) {
        $path = 'QR_codes/';
        $file = $path . $_POST['name'] . '.png';
        $input_text = $_POST['name'];
        echo "<center><h2>Your QR Code</h2></center>";
        if ($file !== '' && $input_text !== '') {
        ?>
            <center><img src='QR_codes/<?php echo $_POST['name'] ?>.png'></center>
        <?php
        } else {
            echo "<center>Name is required!</center>";
        }
        QRcode::png($input_text, $file);
    } else {
        echo "<p class = warning>Please enter a name!</p>";
        header('Refresh:3; URL= index.php');
    }

?>
</body>
</html>
