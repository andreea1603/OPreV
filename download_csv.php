<?php
  
function csvDownload($labels, $year, $bmi, $datasets){


include('putInCsv1.php');

getCsv($labels, $year, $bmi, $datasets);
$url = "formdata.csv";
  
$file_name = basename($url); 
  
$info = pathinfo($file_name);
$filename="report.csv";

if ($info["extension"] == "csv") {

  header("Content-type: text/csv");
  header("Content-disposition: attachment; filename = $filename");
    readfile ($url);
} 
     
exit();
}
  ?>