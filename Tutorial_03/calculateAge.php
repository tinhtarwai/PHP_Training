<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Age Calculation</title>
</head>
<body>
  <?php
    $dob = $_POST['dob'];
    $cur_date = date('Y/m/d', time());
  ?>
  <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
    Choose Your Birthday:
    <input type = "date" name="dob" value="<?php echo $dob?>">
    <input type = "submit" value = "Calculate">
  </form><br>
  <?php
    echo "Your Birth Date :: " ."$dob<br><br>";
    if($dob >= $cur_date) {
      echo "Sorry! your DOB is invalid.";
    } else {
      $age = $cur_date - $dob;
      echo "You are "."$age". " years old.";
    }
  ?>
</body>
</html>