<?php
include('../model/db-connect.php');
include('../model/init.php');

  $fp = fopen("resources/formdata6.csv","w"); // $fp is now the file pointer to file $filename

    if($fp)
    {
        fwrite($fp,"contry_name,"); // Write information to the file
        fwrite($fp,"country_code,");
        fwrite($fp,"value");
        fwrite($fp,"\n");
    }
    $query="Select g.name,g.short,v.valoare from geo g join valori v on g.id=v.id";
    $result = mysqli_query($conn,$query);

    while ($row = mysqli_fetch_array($result)) {
        fwrite($fp,$row[0].","); // Write information to the file
        fwrite($fp,$row[1].",");
        fwrite($fp,$row[2]);
        fwrite($fp,"\n");
    }

    mysqli_free_result($result);
    fclose($fp);
?>