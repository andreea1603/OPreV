<?php
include('../../model/db-connect.php');
function requestAPI($method, $category, $newValue, $modify)
{
    if ($method == "UPDATE")
        $url = 'http://localhost/proiect/OPreV/Api/who_agestd/update.php';
    else
    if ($method == "ADD")
        $url = 'http://localhost/proiect/OPreV/Api/who_agestd/add.php';
    else

        $url = 'http://localhost/proiect/OPreV/Api/who_agestd/delete.php';

    $sex = null;
    $data = [
        'country' => $category->country,
        'sex' => $category->sex,
        'year' => $category->year,
        'newValue' => $newValue,
        'modify' => $modify,
        'value'=>$category->value,
        'eroare'=> 1
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
        if(!codeCountry($data["country"][0],"whoagestd") && codeYears($data["year"],"whoagestd") && codeSex($data["sex"]) 
        && codeValue($data["value"]) ){
            http_response_code (400);
            $data["eroare"]=0;
        }
        else ;
    else
        if(!(codeValue($data["value"]) && codeValue($data["newValue"]) && codeValue($data["year"]))){
            http_response_code (400);
            $data["eroare"]=0;
        }
    // Set the request data as JSON using json_encode function
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));

    $response = curl_exec($curl);
    // Close cURL session
    curl_close($curl);
    echo $response . PHP_EOL;
}
