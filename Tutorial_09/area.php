<?php
    require 'dbconnect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Graphs Tuto</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Sales', 'Expenses', 'Profit'],
            <?php
                $sql = "SELECT * FROM graph;";
                $result = mysqli_query($conn, $sql);
                while($data = mysqli_fetch_array($result)) {
                    $year = $data['year'];
                    $sales = $data['sales'];
                    $expenses = $data['expenses'];
                    $profit = $data['profit'];
                ?>
                ['<?php echo $year;?>', <?php echo $sales;?>,<?php echo $expenses;?>, <?php echo $profit;?>],
                <?php 
                }
                ?>
            ]);
        var options = {
            title: 'Sales, Expenses, and Profit: 2010-2018',
            hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
        <center><h3>Description For Company's Performance Status</h3</center><br><br>
        <div id="chart_div" style="width: 100%; height: 500px;"></div>
        <button  class="cmn-btn back"><a href="index.php"> Go to List >>></a></button>
  </body>
</html>
