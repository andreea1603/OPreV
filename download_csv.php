<?php
  
function csvDownload($labels, $year, $bmi, $datasets){


include('putInCsv1.php');

getCsv($labels, $year, $bmi, $datasets);
$url = "formdata.csv";
  
$file_name = basename($url); 
  
$info = pathinfo($file_name);

if ($info["extension"] == "csv") {

    header("Content-type: text/csv");
  header("Content-disposition: attachment; filename = report.csv");
    readfile ($url);
} 
     
exit();
}
  ?>