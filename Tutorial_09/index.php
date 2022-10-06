<?php
    require 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Graphs Tuto</title>
</head>
<body>
    <div class= "div">
        <h2 class = "ttl">Company's Yearly Status</h2>
        <div>
          <button  class="cmn-btn bar"><a href="bar.php"> Create Bar Chart</a></button>
          <button class= "cmn-btn pie"><a href= "pie.php">Create Pie Chart</a></button>
          <button class= "cmn-btn line"><a href= "line.php">Create Line Chart</a></button> 
          <button class= "cmn-btn area"><a href= "area.php">Create Area Chart</a></button> 
        </div>       
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Year</th>
            <th>Sales</th>
            <th>Expenses</th>
            <th>Profit</th>
        </tr>
    <?php
    $sql = "SELECT * FROM graph;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $year = $row['year'];
            $sales = $row['sales'];
            $expenses = $row['expenses'];
            $profit = $row['profit'];
        
            echo '<tr>
                <td>'.$id.'</td>
                <td>'.$year.'</td>
                <td>'.$sales.'</td>
                <td>'.$expenses.'</td>
                <td>'.$profit.'</td>
            </tr>
            ';
        };
      ?>
    </table>
    <?php
    };
    ?> 
</body>
</html>