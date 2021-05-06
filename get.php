<?php
include('model/db-connect.php');
include('model/init.php');
$ch= curl_init();

$url ="http://ec.europa.eu/eurostat/wdds/rest/data/v2.1/json/en/sdg_02_10/";

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
    print_r($decode["dimension"]["bmi"]["category"]["index"]);
    
    ?>
<br> &nbsp; &nbsp;
    <?php
    print_r($decode["dimension"]["bmi"]["category"]["label"]);
    ?>    <br>

    <br> &nbsp; &nbsp;
        <?php
    echo "aici este timpul:";
    ?>
    <br>
        <?php
    print_r($decode["dimension"]["time"]);
    ?>    <br>

    <br> &nbsp; &nbsp;
        <?php

    echo "aici sunt valorile";
    ?>
    <br>
        <?php

/////////////////////////////////////////////////////
//////////////////////////////////////////////////////
///ADAUGARE VALORI DIN JSON/
////////////////////////////

    $i=0;
    $length=array_key_last($decode["value"]);
    while($i!=$length){

        if(array_key_exists($i, $decode["value"]))
           {
            echo $decode["value"][$i]."\n";
            $query="INSERT INTO `valori` VALUES ( {$i}, {$decode["value"]["$i"]} )";
            mysqli_query($conn, $query);
        }
        $i++; 
    }
    
    /////////////////////////////////////////////////////
//////////////////////////////////////////////////////
///ADAUGARE TARI DIN JSON/
////////////////////////////

    ?>
    <br> &nbsp; &nbsp;    <br>

        <?php
    echo "aici e tara";
    ?>
    <br>
        <?php
        $i=0;
        foreach($decode["dimension"]["geo"]["category"]["label"] as $vasl)
        {
                $key= array_search( $vasl, $decode["dimension"]["geo"]["category"]["label"]);


                echo $vasl."\n".$key;

                $query="INSERT INTO `geo` VALUES ( {$i}, '{$key}', '{$vasl}' )";
                mysqli_query($conn, $query);
                $i++;
        }
    
/////////////////////////////////////////////////////
//////////////////////////////////////////////////////
///ADAUGARE Ani DIN JSON/
////////////////////////////
    ?>
    <br> &nbsp; &nbsp;    <br>

        <?php
    echo "aici e anul";
    ?>
    <br>
    <?php
    $i=0;
    foreach($decode["dimension"]["time"]["category"]["label"] as $vasl)
        {
                $key= array_search( $vasl, $decode["dimension"]["time"]["category"]["label"]);

                echo $vasl."\n".$key."\n";

                $query="INSERT INTO `years` VALUES ( {$i}, '{$key}', '{$vasl}' )";
                mysqli_query($conn, $query);
                $i++;
        }
    

  
    /////////////////////////////////////////////////////
//////////////////////////////////////////////////////
///ADAUGARE BMI DIN JSON/
////////////////////////////

?>  <br><?php
            //print_r($decode["dimension"]["bmi"]["category"]["index"]);

            $i=0;
            foreach($decode["dimension"]["bmi"]["category"]["label"] as $vasl)
                {
                        $key= array_search( $vasl, $decode["dimension"]["bmi"]["category"]["label"]);
                     
                        
                        ?>  <br><?php

                        echo $vasl."\n".$key. $i;
                        ?>  <br><?php

                        $query="INSERT INTO `bmi` VALUES ( {$i}, '{$key}', '{$vasl}' )";
                        mysqli_query($conn, $query);
                        $i++;
                }
                ?>  <br><?php
}

curl_close($ch);