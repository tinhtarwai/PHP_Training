
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Reading Files</title>
</head>
<body>
<?php
  // reading date from text file.
    echo "<h3>Reading data from Text File</h3>";
    $txtfile = fopen("files/text.txt", "r") or die("Unable to open file!");
    while(!feof($txtfile)) {
        echo fgets($txtfile) . "<br>";
    }
    fclose($txtfile);
    echo "<hr>";
    // reading date from csv file.
    echo "<h3>Reading data from CSV File</h3>";
    $csvfile = fopen("files/csv.csv", "r") or die("Unable to open file!");
    while(!feof($csvfile)) {
        echo fgets($csvfile) . "<br>";
    }
    fclose($csvfile);
    echo "<hr>";
    // reading date from csv file.
    echo "<h3>Reading data from Document File</h3>";
    $docfile = fopen("files/doc.doc", "r") or die("Unable to open file!");
    while(!feof($docfile)) {
        echo fgets($docfile) . "<br>";
    }
    fclose($docfile);
    echo "<hr>";
    // reading date from excel file.
    echo "<h3>Reading data from Excel File</h3>";

    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load("files/excel.xlsx");
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
    $i=1;
    //unset($sheetData[0]);
    echo "<table>";
    foreach ($sheetData as $cell) {
        ?>
        <tr>
            <td><?php echo "$cell[0]" ?></td>
            <td><?php echo "$cell[1]" ?></td>
            <td><?php echo "$cell[2]" ?></td>
            <td><?php echo "$cell[3]" ?></td>
        </tr>
        <?php
        $i++;
    }
    ?>
    </table>
</body>
</html>