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
        google.charts.load('current', {'packages':['bar']});
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
                chart: {
                subtitle: "Sales, Expenses, and Profit: 2010-2018",
                //subtitle: 'Sales, Expenses, and Profit: 2010-2018',
                },
                bars: 'vertical', // Required for Material Bar Charts.
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
  </head>
  <body>
    <center><h3>Description For Company's Performance Status</h3</center><br><br><br>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div><br>
    <button  class="cmn-btn back"><a href="index.php"> Go to List >>></a></button>
  </body>
</html>
