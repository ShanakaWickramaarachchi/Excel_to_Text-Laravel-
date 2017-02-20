<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Excel File Uploader</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container-fluid">
    <h2>Excel File Uploader</h2>


    <div class="jumbotron">
        <h4>1)Upload your Excel.xsl file here</h4>

        <form action='' method='POST' enctype='multipart/form-data'>
            <input type='file' name='userFile'><br>

            <input type='submit'   button class="btn btn-primary" name='upload_btn' value='Upload'  id="myButton">
            </button>
        </form>
        <br>
        <h4>2)Download the text file to your computer</h4>
        <a href="xx.php">
            <button type="button" class="btn btn-primary">Download
            </button>

        </a>

    </div>
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
    ?>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>