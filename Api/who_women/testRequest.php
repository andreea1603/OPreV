<?php
include('../../model/db-connect.php');
function requestAPI2($method, $category, $newValue, $modify)
{
    if ($method == "UPDATE")
        $url = 'http://localhost/proiect/OPreV/Api/who_women/update.php';
    else
    if ($method == "ADD")
        $url = 'http://localhost/proiect/OPreV/Api/who_women/add.php';
    else

        $url = 'http://localhost/proiect/OPreV/Api/who_women/delete.php';

    $sex = null;
    $data = [
        'country' => $category->country,
        'area' => $category->area,
        'year' => $category->year,
        'newValue' => $newValue,
        'modify' => $modify,
        'value'=>$category->value,
        'eroare'=>1
    ];


    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // Set the CURLOPT_POST option to true for POST request
    if($method!="UPDATE" && $method!="ADD")
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    else{
        curl_setopt($curl, CURLOPT_POST, true);

    }
    if(!($method=="ADD"))
        if(!(codeCountry($data["country"][0],"whocrude") && codeYears($data["year"],"whocrude")
         && codeValue($data["value"]))){
            http_response_code (400);
            $data["eroare"]=0;
        }
        else ;
    else
        if(!(codeValue($data["value"]) && codeValue($data["year"]))){
            http_response_code (400);
            $data["eroare"]=0;
        }
    // Set the request data as JSON using json_encode function
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
    // Set custom headers for RapidAPI Auth and Content-Type header

    $response = curl_exec($curl);
    // Close cURL session
    curl_close($curl);
    echo $response . PHP_EOL;
}
