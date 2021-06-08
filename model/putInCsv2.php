<?php

function getCsv1($indicatorCode, $countries_csv, $year_csv, $sex_csv, $age_csv, $valori_csv, $residence){

  $fp = fopen("resources/formdat.csv","w"); // $fp is now the file pointer to file $filename

    
    $i=0;

    if($fp)
    {
        
    fwrite($fp,",");

    if($indicatorCode=="indicatorCode1")
    {
    fwrite($fp,"year,");
    fwrite($fp,"sex,");
    fwrite($fp,"age,");
    fwrite($fp,"\n");
    }
    if($indicatorCode=="indicatorCode2")
    {
    fwrite($fp,"year,");
    fwrite($fp,"residence,");
    fwrite($fp,"\n");
    }
    if($indicatorCode=="indicatorCode3" || $indicatorCode=="indicatorCode4"){
        fwrite($fp,"year,");
        fwrite($fp,"sex,");
        fwrite($fp,"\n");
    }
    fwrite($fp,"For filters: ".$indicatorCode.",");


    if($indicatorCode=="indicatorCode1"){

    fwrite($fp,$year_csv.",");
    fwrite($fp,$sex_csv.",");
    fwrite($fp,$age_csv.",");
    }
    else
    if($indicatorCode=="indicatorCode1"){

        fwrite($fp,$year_csv.",");
        fwrite($fp,$residence.",");
        }
        else{
            fwrite($fp,$year_csv.",");
            fwrite($fp,$sex_csv.",");
        }

    fwrite($fp,"\n");

        fwrite($fp,"contry_name,"); // Write information to the file
        fwrite($fp,"value");
        fwrite($fp,"\n");
    }

    while ($i<count($countries_csv)) {

        fwrite($fp,$countries_csv[$i].","); 

        fwrite($fp,$valori_csv[$i].",");

        fwrite($fp,"\n");


        $i=$i+1;

    }

    fclose($fp);
}

?>