<?php

require("reader.php"); // php excel reader
$file="x/newname.xls";
$connection=new Spreadsheet_Excel_Reader(); // main object
$connection->read($file);
$startrow=2;
$endrow=4;
$col1=1;
$col2=2;
$col3=3;


//
//$rows = $connection->sheets[0]['numRows'];
//$cols = $connection->sheets[0]['numCols'];

for($i=$startrow;$i<$endrow;$i++){ // we read row to row

    $x=$connection->sheets[0]["cells"][$i][$col1];
    echo "\n";
    $y =$connection->sheets[0]["cells"][$i][$col2];echo "</br>";
    $z =  $connection->sheets[0]["cells"][$i][$col3]; echo "</br>";


$current_date = date("Ymd");
$file = $current_date.'.txt';



// $data2 = "Street Address";
// $data3 = "Plumber";
// $data4 = "Phone nuber";

$data = array($x,$y,$z);

file_put_contents($file, implode(",\n",$data)."\n",FILE_APPEND | LOCK_EX);





    //  [2][3] and [3][3]
}



?>