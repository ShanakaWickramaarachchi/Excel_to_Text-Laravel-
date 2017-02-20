<!DOCTYPE html>
<html>
<body>
<br>
<br>

<!--<form action="upload.php" method="post" enctype="multipart/form-data">-->
<!--    Select image to upload:-->
<!--    <input type="file" name="fileToUpload" id="fileToUpload">-->
<!---->
<!--</form>-->

<?php
$info = pathinfo($_FILES['userFile']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = "newname.".$ext;

$target = 'save/'.$newname;
move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);


require("reader.php"); // php excel reader
$file="save/newname.xls";
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
   $dir = 'output';


// $data2 = "Street Address";
// $data3 = "Plumber";
// $data4 = "Phone nuber";

    $data = array($x,$y,$z);

    file_put_contents("$dir/$file", implode(",\n",$data)."\n",FILE_APPEND | LOCK_EX);
    //  [2][3] and [3][3]
}

header("Location: http://helloodegree.com/excel/book/public/index.php/home"); /* Redirect browser */
exit();
?>

</body>
</html>