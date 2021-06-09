<?php

$dir = __DIR__;

$path1 = substr($dir, 0, -5) . 'controller\statistici-modelwho.php';
include($path1);
$path = substr($dir, 0, -5) . 'Api\who_children\childrenObesity.php';
include_once $path;
$path = substr($dir, 0, -5) . 'Api\who_agestd\agestdObesity.php';
include_once $path;
$path = substr($dir, 0, -5) . 'Api\who_crude\crudeObesity.php';
include_once $path;
$path = substr($dir, 0, -5) . 'Api\who_women\womenObesity.php';
include_once $path;
include("putInCsv2.php");

$raspuns = makeURL();
$url = $raspuns;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resp = curl_exec($ch);

if ($e = curl_error($ch)) {
    echo $e;
} else {
    $decode = json_decode($resp, true);
    $labelswho = null;
    $datasetswho = null;
    $labelswho = [];
    $datasetswho = [];
    $age = null;
    $sex = null;
    $area = null;
    $year = null;
    if (isset($decode['data'][0]['year']))
        $year = $decode['data'][0]['year'];
    if (isset($decode['data'][0]['sex']))
        $sex = $decode['data'][0]['sex'];
    if (isset($decode['data'][0]['age']))
        $age = $decode['data'][0]['age'];
    if (isset($decode['data'][0]['area']))
        $area = $decode['data'][0]['area'];

    $type = checkMare("indicatorCode")[0];

    if (isset($decode['data']))
        for ($i = 0; $i < count($decode['data']); $i++) {

            array_push($labelswho, $decode['data'][$i]['country']);
            array_push($datasetswho, $decode['data'][$i]['value']);
        }
}
mapWho($labelswho, $datasetswho);

getCsv1($type, $labelswho, $year, $sex, $age, $datasetswho, $area);
function makeURL()
{

    $typeOfFilter = checkMare("indicatorCode")[0];
    $url = "http://localhost/proiect/OPreV/Api/";

    if ($typeOfFilter == "indicatorCode1") {

        $chosenDimension = checkMare("checkCountry");
        $sex = checkMare("sexes")[0];

        $years = fromStringtoInt(checkMare("years")[0]);
        $ages = checkMare("ages")[0];


        $url = $url . "who_children/getByFilter.php?";
        $url = $url . "year=" . $years . "&sex=" . $sex . "&age=" . $ages . "&country=[";
        foreach ($chosenDimension as $country)
            $url = $url . $country . ",";
        $url = $url . "]";
    } else if ($typeOfFilter == "indicatorCode2") {
        $chosenDimension = checkMare("checkCountry");
        $years = fromStringtoInt(checkMare("years")[0]);
        $area = checkMare("areas")[0];

        $url = $url . "who_women/getByFilter.php?";
        $url = $url . "year=" . $years . "&area=" . $area . "&country=[";
        foreach ($chosenDimension as $country)
            $url = $url . $country . ",";
        $url = $url . "]";
    } else if ($typeOfFilter == "indicatorCode3") {
        $chosenDimension = checkMare("checkCountry");
        $sex = checkMare("sexes")[0];
        $years = fromStringtoInt(checkMare("years")[0]);

        $url = $url . "who_crude/getByFilter.php?";
        $url = $url . "year=" . $years . "&sex=" . $sex . "&country=[";
        foreach ($chosenDimension as $country)
            $url = $url . $country . ",";
        $url = $url . "]";
    } else {
        $chosenDimension = checkMare("checkCountry");
        $sex = checkMare("sexes")[0];
        $years = fromStringtoInt(checkMare("years")[0]);

        $url = $url . "who_agestd/getByFilter.php?";
        $url = $url . "year=" . $years . "&sex=" . $sex . "&country=[";
        foreach ($chosenDimension as $country)
            $url = $url . $country . ",";
        $url = $url . "]";
    }
    return $url;
}



function fromStringtoInt($stringV)
{
    $res_temp = substr($stringV, 4, 100);
    $nr = (int)$res_temp;
    return $nr;
}
