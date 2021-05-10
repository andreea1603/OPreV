<?php

//ia date pentru femei, barbati, medie din 1975 pana in 2016, fara varsta??-> 
//in functie de venit??? world bank income group - filtrare in functie de venit


//Pentru ce e mai sus, dar crude
$url="https://ghoapi.azureedge.net/api/NCD_BMI_30C";

$url="https://ghoapi.azureedge.net/api/obesewm";
//pentru copii in functie de varsta, ne intereseaza si Dim2, aici este intervalul de varsta

function set1(){
include('model/db-connect.php');
include('model/init.php');
$ch= curl_init();
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


    //count($decode["value"])
    for($i=76356; $i<count($decode["value"]); $i++){

        echo $decode["value"][$i]["SpatialDim"].", ".$decode["value"][$i]["Value"].", ".$decode["value"][$i]["TimeDim"].",
         ".$decode["value"][$i]["Dim1"]
    .", ".$decode["value"][$i]["Dim2"]."<br>";
        getValues($decode["value"][$i]["Value"]);
        $value=getValues($decode["value"][$i]["Value"])[0];
        $year=intval($decode["value"][$i]["TimeDim"]);

        $country=$decode["value"]["$i"]["SpatialDim"];
        $sex=$decode["value"]["$i"]["Dim1"];
        
        echo gettype($country);


        $query="INSERT INTO `datewho` VALUES ( {$i}, '{$country}', {$value}, {$year}, '{$sex}' )";
        
        echo "<br>";
        echo $query;
        echo "<br>";

        if(mysqli_query($conn, $query))
            echo "salut";
    

        echo "am iesit";
    }
    curl_close($ch);
}
}
function get_Data_Filter(){
    include('model/db-connect.php');
    include('model/init.php');
    
    $query_name = "select id, value, year from datewho where year=2007 and sex='MLE'  ";

    $result= mysqli_query($conn, $query_name);

    for( $i=0; $i< mysqli_num_rows($result); $i++)
    {
        if ($row = mysqli_fetch_assoc($result)) {
           
            echo $row['value'];
            echo ", ";
            echo $row['id'];
            echo "<br>";
        
    }
        echo "am iesit din bucla";
        echo "<br>";
    }
}

function getValues($text){

        $firstValue='';
        $minValue='';
        $maxValue='';
        $ok=0;

        if($text=="No data")
            return array(-1);
       $i=0;
                if($ok==0){
                    while($text[$i]!='['){
                        $firstValue=$firstValue.$text[$i];
                        $i++;
                    }
                    $ok=1;
                }
                if($ok==1){
                    $i++;
                    while($text[$i]!='-'){
                        $minValue=$minValue.$text[$i];
                        $i++;
                    }
                    $ok=2;
                    $i++;
                }
                if($ok==2){

                    for($j=$i; $j<strlen($text)-1; $j++){
                        $maxValue=$maxValue.$text[$j];
                    }
                }
        return array(floatval($firstValue),floatval($minValue),floatval($maxValue));

    }


   //set1();
   get_Data_Filter();
   echo "Salut";

   function set2(){
    include('model/db-connect.php');
    include('model/init.php');
    $ch= curl_init();
    $url="https://ghoapi.azureedge.net/api/NCD_BMI_30A";
    
    
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


   }
}


?>