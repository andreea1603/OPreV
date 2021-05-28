<?php

$dir=__DIR__;

$path1=substr($dir, 0, -5).'controller\statistici-modelwho.php';
include($path1);
$path=substr($dir, 0, -5).'Api\who_children\childrenObesity.php';
include_once $path;
$path=substr($dir, 0, -5).'Api\who_agestd\agestdObesity.php';
include_once $path;
$path=substr($dir, 0, -5).'Api\who_crude\crudeObesity.php';
include_once $path;
$path=substr($dir, 0, -5).'Api\who_women\womenObesity.php';
include_once $path;
include("putInCsv2.php");
//include('..\controller\statistici-modelwho.php');
//include('D:\Xamp\htdocs\proiect\OPreV\controller\statistici-modelwho.php');

/*
function dataForKids($spatialDimension, $chosenDimensions, $year, $sex, $ageCategory)
{
    include('model/db-connect.php');

    $labels = [];
    $values = [];

    $finalResult = [];
    for ($i = 0; $i < count($chosenDimensions); $i++) {
        $query = "SELECT whoage.country, whoage.value FROM whoage WHERE 
        country='{$chosenDimensions[$i]}' AND 
        whoage.year={$year} AND 
        whoage.sex='{$sex}' AND 
        whoage.age='{$ageCategory}'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
                array_push($labels, $row['country']);
                array_push($values, $row['value']);
            }
        }
    }
    return array($labels, $values);
}

function dataForNonPregnantWomen($spatialDimension, $chosenDimensions, $year, $areaType)
{
    include('model/db-connect.php');
    $labels = [];
    $values = [];

    $finalResult = [];
    for ($i = 0; $i < count($chosenDimensions); $i++) {
        $query = "SELECT whowomen.country, whowomen.value FROM whowomen WHERE 
        country='{$chosenDimensions[$i]}' AND 
        whowomen.year={$year} AND 
        whowomen.area='{$areaType}'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {

            if ($row = mysqli_fetch_assoc($result)) {
                array_push($labels, $row['country']);
                array_push($values, $row['value']);
            }
        }
    }
    return array($labels, $values);
}

function dataForAdultsC($spatialDimension, $chosenDimensions, $year, $sex)
{
    include('model/db-connect.php');
    $labels = [];
    $values = [];

    $finalResult = [];
    for ($i = 0; $i < count($chosenDimensions); $i++) {
        $query = "SELECT whocrude.country, whocrude.value FROM whocrude WHERE 
        country='{$chosenDimensions[$i]}' AND 
        whocrude.year={$year} AND 
        whocrude.sex='{$sex}'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
                array_push($labels, $row['country']);
                array_push($values, $row['value']);
            }
        }
    }
    return array($labels, $values);
}

function dataForAdults($spatialDimension, $chosenDimensions, $year, $sex)
{
    include('model/db-connect.php');
    $labels = [];
    $values = [];

    $finalResult = [];
    for ($i = 0; $i < count($chosenDimensions); $i++) {
        $query = "SELECT whoagestd.country, whoagestd.value FROM whoagestd WHERE 
        whoagestd.country='{$chosenDimensions[$i]}' AND 
        whoagestd.year={$year} AND 
        whoagestd.sex='{$sex}'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {
            if ($row = mysqli_fetch_assoc($result)) {
                $tuple = array($row['country'], $row['value']);
                array_push($labels, $row['country']);
                array_push($values, $row['value']);
            }
        }
    }
    return array($labels, $values);
}

function getDataByFilter()
{

    $typeOfFilter = checkMare("indicatorCode")[0];


    if ($typeOfFilter == "indicatorCode1") {
        $chosenDimension = checkMare("checkCountry");
        $sex = checkMare("sexes")[0];

        $valoare = checkMare("years")[0];
        $years = fromStringtoInt(checkMare("years")[0]);
        $ages = checkMare("ages")[0];

        $result = dataForKids("", $chosenDimension, $years, $sex, $ages);
    } else if ($typeOfFilter == "indicatorCode2") {
        $chosenDimension = checkMare("checkCountry");
        $years = fromStringtoInt(checkMare("years")[0]);
        $area = checkMare("areas")[0];

        $result = dataForNonPregnantWomen("", $chosenDimension, $years, $area);
    } else if ($typeOfFilter == "indicatorCode3") {
        $chosenDimension = checkMare("checkCountry");
        $sex = checkMare("sexes")[0];
        $years = fromStringtoInt(checkMare("years")[0]);
        $result = dataForAdultsC("", $chosenDimension, $years, $sex);
    } else {
        $chosenDimension = checkMare("checkCountry");
        $sex = checkMare("sexes")[0];
        $years = fromStringtoInt(checkMare("years")[0]);
        $result = dataForAdults("", $chosenDimension, $years, $sex);
    }
    return $result;
}

*/
$raspuns=makeURL();
$url=$raspuns;

$ch= curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//echo $url;

$resp = curl_exec($ch);
//print_r($resp);
//echo "<br>";
//cho "pa";
if($e=curl_error($ch)){
    echo $e;
}
else{
    $decode = json_decode($resp, true);
    $labelswho=null;
    $datasetswho=null;
    $labelswho=[];
    $datasetswho=[];
    $age=null;
    $sex=null;
    $area = null;
    $year=$decode['data'][0]['year'];

    print_r($decode);
    //echo $decode['data'][0]['sex'];
    if(isset($decode['data'][0]['sex']))
        $sex=$decode['data'][0]['sex'];
    if(isset($decode['data'][0]['age']))
        $age=$decode['data'][0]['age'];
    if(isset($decode['data'][0]['area']))
        $area=$decode['data'][0]['area'];

    $type= checkMare("indicatorCode")[0];
    //print_r($decode['data']);

    if(isset($decode['data']))
        for($i=0;$i<count($decode['data']);$i++){
            
            array_push($labelswho,$decode['data'][$i]['country']);
            array_push($datasetswho,$decode['data'][$i]['value']);
        }
    //else TODO

    }
mapWho($labelswho,$datasetswho);
getCsv1($type, $labelswho, $year, $sex, $age, $datasetswho, $area);
function makeURL(){

    $typeOfFilter = checkMare("indicatorCode")[0];
    $url="http://localhost/proiect/OPreV/Api/";
    //$typeOfFilter = "indicatorCode1";
    if ($typeOfFilter == "indicatorCode1") {
        
        $chosenDimension = checkMare("checkCountry");
        $sex = checkMare("sexes")[0];

        $years = fromStringtoInt(checkMare("years")[0]);
        $ages = checkMare("ages")[0];
        

        $url=$url."who_children/getByFilter.php?";
        $url=$url."year=".$years."&sex=".$sex."&age=".$ages."&country=[";
        foreach($chosenDimension as $country)
            $url=$url.$country.",";
        $url=$url."]";

    }else if ($typeOfFilter == "indicatorCode2") {
        $chosenDimension = checkMare("checkCountry");
        $years = fromStringtoInt(checkMare("years")[0]);
        $area = checkMare("areas")[0];

        $url=$url."who_women/getByFilter.php?";
        $url=$url."year=".$years."&area=".$area."&country=[";
        foreach($chosenDimension as $country)
            $url=$url.$country.",";
        $url=$url."]";
    }else if ($typeOfFilter == "indicatorCode3") {
        $chosenDimension = checkMare("checkCountry");
        $sex = checkMare("sexes")[0];
        $years = fromStringtoInt(checkMare("years")[0]);

        $url=$url."who_crude/getByFilter.php?";
        $url=$url."year=".$years."&sex=".$sex."&country=[";
        foreach($chosenDimension as $country)
            $url=$url.$country.",";
        $url=$url."]";

    } else {
        $chosenDimension = checkMare("checkCountry");
        $sex = checkMare("sexes")[0];
        $years = fromStringtoInt(checkMare("years")[0]);

        $url=$url."who_agestd/getByFilter.php?";
        $url=$url."year=".$years."&sex=".$sex."&country=[";
        foreach($chosenDimension as $country)
            $url=$url.$country.",";
        $url=$url."]";
    }
    return $url;
}



function fromStringtoInt($stringV)
{
    $res_temp = substr($stringV, 4, 100);
    $nr = (int)$res_temp;
    return $nr;
}
