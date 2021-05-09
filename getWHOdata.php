<?php
include('model/db-connect.php');
include('model/init.php');
$ch= curl_init();


//ia date pentru femei, barbati, medie din 1975 pana in 2016, fara varsta??-> 
//in functie de venit??? world bank income group - filtrare in functie de venit
$url="https://ghoapi.azureedge.net/api/NCD_BMI_30A";

//Pentru ce e mai sus, dar crude
$url="https://ghoapi.azureedge.net/api/NCD_BMI_30C";


//pentru copii in functie de varsta, ne intereseaza si Dim2, aici este intervalul de varsta
$url='https://ghoapi.azureedge.net/api/NCD_BMI_PLUS2C';



curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);


$array = array(0=>0);

$i=0;
$resp = curl_exec($ch);
if($e=curl_error($ch)){

    echo $e;
}
else{
    $decode = json_decode($resp, true);
    //print_r($decode);

    echo "aici sunt codurile + numele pt tipurile de obezitate";
    ?>
<br>
    <?php
    echo count($decode["value"])."<br>";
    print_r($decode["value"][0]["Id"]);

    for($i=0; $i< count($decode["value"]); $i++){

        echo $decode["value"][$i]["SpatialDim"].", ".$decode["value"][$i]["Value"].", ".$decode["value"][$i]["TimeDim"].", ".$decode["value"][$i]["Dim1"]
    .", ".$decode["value"][$i]["Dim2"]."<br>";
    }
}

?>