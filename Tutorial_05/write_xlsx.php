<?php
    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet; 
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

    $spreadsheet = new Spreadsheet(); 
    
    $sheet = $spreadsheet->getActiveSheet(); 

    $data = array();
    $data[0] = array("name"=>"Khin Khin","age"=>23,"gender"=>"female","address"=>"Yangon");
    $data[1] = array("name"=>"Toe Toe","age"=>25,"gender"=>"male","address"=>"Mandalay");
    $data[2] = array("name"=>"Su Su","age"=>24,"gender"=>"female","address"=>"Pyin Oo Lwin");
    $data[3] = array("name"=>"Mg Mg","age"=>23,"gender"=>"male","address"=>"Dawei");
    $data[4] = array("name"=>"Wai Wai","age"=>26,"gender"=>"female","address"=>"Yangon");

    $header=["Name","Age","Gender","Address"];
    $j=1;
    foreach($header as $x_value) {
        $sheet->setCellValueByColumnAndRow($j,1,$x_value);
        $j=$j+1;	
    }

    for($i=0;$i<count($data);$i++)
    {
        $row=$data[$i];
        $j=1;
        foreach($row as $x => $x_value) {
            $sheet->setCellValueByColumnAndRow($j,$i+2,$x_value);
            $j=$j+1;
        }
    }
    $writer = new Xlsx($spreadsheet); 
    $writer->save('files/excel.xlsx'); 
?>