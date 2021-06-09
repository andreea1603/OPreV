<?php

$dir=__DIR__;
$path1=substr($dir, 0, -5).'controller\statistici-model.php';
include($path1);

$raspuns=makeURL();
$url=$raspuns;



$ch= curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$resp = curl_exec($ch);

if($e=curl_error($ch)){
    echo $e;
}

else{
    
    $decode = json_decode($resp, true);

    $labels=null;
    $datasets=null;
    $labels=[];
    $datasets=[];
    if(isset($decode['data']))
        for($i=0;$i<count($decode['data']);$i++){
            array_push($labels,$decode['data'][$i]['country']);
            array_push($datasets,$decode['data'][$i]['value']);
        }
    }

$result_bmi=checkBmi();
$bmi=$result_bmi[0];
$result_year=checkYear();
$year=$result_year[0];
map($labels, $datasets);

function makeURL(){
    
    $url="http://localhost/proiect/OPreV/Api/eurostat/getByFilter.php?";
    $result_year=checkYear();
    $year=$result_year[0];

    $result_bmi=checkBmi();
    $bmi=$result_bmi[0];

    $result_countries=checkCountry();
    $countries=$result_countries;

    $url=$url."year=".$year."&bmi=".$bmi."&country=[";
    foreach($countries as $country){
        $url=$url.formatCountryPath($country).",";
    }
    $url=$url."]";

    return $url;
}
function formatCountryPath($country){
    $country2="";
    for($i=0; $i<strlen($country); $i++)
        {
            if($country[$i]==' ')
                $country2=$country2."%20";
            else
                $country2=$country2.$country[$i];
        }
    return $country2;
}
?>