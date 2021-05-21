<?php
set_time_limit ( 360 );
function set1(){
    include('db-connect.php');
    include('init.php');
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

        for($i=39136; $i<count($decode["value"]); $i++){

            getValues($decode["value"][$i]["Value"]);
            $value=getValues($decode["value"][$i]["Value"])[0];
            $year=intval($decode["value"][$i]["TimeDim"]);

            $country=$decode["value"][$i]["SpatialDim"];
            $sex=$decode["value"][$i]["Dim1"];


            $valTemp=$decode["value"]["$i"]["Dim2"];

            $spatial_dim=$decode["value"][$i]["SpatialDimType"];
            $age=substr($valTemp, 4, strlen($valTemp));


            $query="INSERT INTO `whoage` VALUES ( {$i}, '{$spatial_dim}', '{$country}', {$value}, {$year}, '{$sex}', '{$age}' )";
            //echo $query;
            mysqli_query($conn, $query);
                
        }
        curl_close($ch);
    }
}
// function get_Data_Filter(){
//     include('db-connect.php');
//     include('init.php');
    
//     $query_name = "select id, value, year from datewho where year=2007 and sex='MLE'  ";

//     $result= mysqli_query($conn, $query_name);

//     for( $i=0; $i< mysqli_num_rows($result); $i++)
//     {
//         if ($row = mysqli_fetch_assoc($result)) {
           
//             echo $row['value'];
//             echo ", ";
//             echo $row['id'];
//             echo "<br>";
        
//     }
//         echo "am iesit din bucla";
//         echo "<br>";
//     }
// }
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

function set2(){
    include('db-connect.php');
    include('init.php');
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
        
        for($i=0; $i<count($decode["value"]); $i++){

            $array=getValues($decode["value"][$i]["Value"]);     
            $value=floatval($array[0]);
            $year=intval($decode["value"][$i]["TimeDim"]);
            $country=$decode["value"][$i]["SpatialDim"];
            $sex=$decode["value"][$i]["Dim1"];
            $spatial_dim=$decode["value"][$i]["SpatialDimType"];

            $query="INSERT INTO `whoagestd` VALUES ( {$i},'{$spatial_dim}', '{$country}', {$value}, {$year}, '{$sex}' )";
            mysqli_query($conn, $query);
        }
   }
}
function set3(){
    include('db-connect.php');
    include('init.php');
    $ch= curl_init();
    $url="https://ghoapi.azureedge.net/api/NCD_BMI_30C";
    
    
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
    
        for($i=0; $i<count($decode["value"]); $i++){

            $array=getValues($decode["value"][$i]["Value"]);
            $value=floatval($array[0]);
            $year=intval($decode["value"][$i]["TimeDim"]);
            $country=$decode["value"][$i]["SpatialDim"];
            $sex=$decode["value"][$i]["Dim1"];
            $spatial_dim=$decode["value"][$i]["SpatialDimType"];

            $query="INSERT INTO `whocrude` VALUES ( {$i}, '{$spatial_dim}','{$country}', {$value}, {$year}, '{$sex}' )";
            mysqli_query($conn, $query);
        }
   }
}
function set4(){
    include('db-connect.php');
    include('init.php');
    $ch= curl_init();
    $url="https://ghoapi.azureedge.net/api/obesewm";
    
    
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
        for($i=0; $i<count($decode["value"]); $i++){

            $array=getValues($decode["value"][$i]["Value"]);
            $value=floatval($array[0]);
            $year=intval($decode["value"][$i]["TimeDim"]);
            $country=$decode["value"][$i]["SpatialDim"];
            $area=$decode["value"][$i]["Dim1"];
            $spatial_dim=$decode["value"][$i]["SpatialDimType"];
            $query="INSERT INTO `whowomen` VALUES ( {$i}, '{$spatial_dim}', '{$country}', {$value}, {$year}, '{$area}' )";
            mysqli_query($conn, $query);
           // echo $query;
        }
   }
}
function set5(){
    include('db-connect.php');
    include('init.php');
    $index=1;
    $str = file_get_contents('tari.json');
    $json = json_decode($str, true);
    foreach($json as $js){  
        $nume=$js["Country"];
        $code2=$js["Alpha-2 code"];
        $code3=$js["Alpha-3 code"];
        $query="INSERT INTO `countries` VALUES ( {$index}, '{$nume}' , '{$code2}' , '{$code3}' )";
        mysqli_query($conn, $query);
        $index++;
    }
}
//set1();
//set2();
//set3();
//set4();
//set5();
?>