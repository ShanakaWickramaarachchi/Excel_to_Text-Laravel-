<?php

 $dir = 'output/';
      $current_date = date("Ymd");
    $file =$dir.$current_date.'.txt';
    



if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}

header("Location: http://helloodegree.com/excel/book/public/index.php/home"); /* Redirect browser */
exit();
?>