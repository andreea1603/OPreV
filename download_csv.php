<?php
  
$url = "formdata.csv";
  
$file_name = basename($url); 
  
$info = pathinfo($file_name);

if ($info["extension"] == "csv") {

    header("Content-Description: File Transfer"); 
    header("Content-Type: application/octet-stream"); 
    header(
    "Content-Disposition: attachment; filename=\""
    . $file_name . "\""); 
    readfile ($url);
} 
     
exit();  ?>