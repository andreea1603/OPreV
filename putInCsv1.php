<?php

function getCsv($countries_csv, $year_csv, $bmi_csv, $valori_csv){
include('model/db-connect.php');
include('model/init.php');
include('model/functions_repres.php');

  $fp = fopen("formdata.csv","w"); // $fp is now the file pointer to file $filename

    
    $i=0;

    if($fp)
    {
        
    fwrite($fp,",");

    fwrite($fp,"year,");
    fwrite($fp,"bmi,");
    fwrite($fp,"\n");
    fwrite($fp,",");

    fwrite($fp,$year_csv[0].",");
    fwrite($fp,$bmi_csv[0].",");

    fwrite($fp,"\n");

        fwrite($fp,"contry_name,"); // Write information to the file
        fwrite($fp,"value");
        fwrite($fp,"\n");
    }

    while ($i!=count($countries_csv)) {
        fwrite($fp,$countries_csv[$i].","); 

        fwrite($fp,$valori_csv[$i].",");
        fwrite($fp,"\n");
        $i=$i+1;

    }

    fclose($fp);
}

?>