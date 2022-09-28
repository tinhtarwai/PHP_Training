<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial02|diamond</title>
</head>
<body>
  <?php
    $count = 6;
    $space_count = $count;
    for ($row = 1; $row <= $count; $row++) {
      for ($space = 1; $space <= $space_count-1; $space++) {
        echo "&nbsp; ";
      }
      $space_count--;
      for ($star = 1; $star <= 2 * $row - 1; $star++) {  
        echo "*";
      }
      echo "<br>";
    }
 
    $space_count = 1;
    for ($row = $count-1; $row > 0; $row--) {
      for ($space = 1; $space <= $space_count; $space++) {
          echo "&nbsp; ";
      }
      $space_count++;

      for ($star = 1; $star <= 2 * $row - 1; $star++) {
          echo "*";
      }
      echo "<br>";
    }
?>
</body>
</html>