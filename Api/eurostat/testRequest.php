<?php
include('../../model/db-connect.php');
function requestAPI5($method, $category, $newValue, $modify)
{
=    if ($method == "UPDATE")
        $url = 'http://localhost/proiect/OPreV/Api/eurostat/update.php';
    else
    if ($method == "ADD")
        $url = 'http://localhost/proiect/OPreV/Api/eurostat/add.php';
    else

        $url = 'http://localhost/proiect/OPreV/Api/eurostat/delete.php';

    $sex = null;
    $data = [
        'country' => $category->country,
        'bmi' => $category->bmi,
        'year' => $category->year,
        'newValue' => $newValue,
        'modify' => $modify,
        'value'=>$category->value
    ];


    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // Set the CURLOPT_POST option to true for POST request
    if($method!="UPDATE" && $method!="ADD")
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    else{
        curl_setopt($curl, CURLOPT_POST, true);

    }
    // Set the request data as JSON using json_encode function
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));

    $response = curl_exec($curl);
    // Close cURL session
    curl_close($curl);
    echo $response . PHP_EOL;
}
