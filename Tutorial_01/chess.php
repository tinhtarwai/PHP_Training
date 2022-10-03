<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Chess</title>
</head>
<body>
  <table cellspacing="0px">
    <?php
      for($row = 1; $row < 9; $row++) {
    ?>
      <tr>
        <?php
          for($col = 1; $col < 9; $col++) {
            $sum = $row + $col;
            if($sum%2==0) {
              echo "<td class=white-cell></td>";
            } else {
              echo "<td class=black-cell></td>";
            }
          }
        ?>
      </tr>
    <?php
      }
    ?>
   
  </table>
</body>
</html>