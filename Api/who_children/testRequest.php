<?php
include('../../model/db-connect.php');
function requestAPI($method, $category, $newValue, $modify)
{
    echo "bun";
    if ($method == "UPDATE")
        $url = 'http://localhost/proiect/OPreV/Api/who_children/update.php';
    else
    if ($method == "ADD")
        $url = 'http://localhost/proiect/OPreV/Api/who_children/add.php';
    else

        $url = 'http://localhost/proiect/OPreV/Api/who_children/delete.php';

    $sex = null;
    $data = [
        'country' => $category->country,
        'sex' => $category->sex,
        'year' => $category->year,
        'newValue' => $newValue,
        'modify' => $modify,
        'value'=>$category->value,
        'age' => $category->age
    ];

    echo json_encode($data);

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
    // Set custom headers for RapidAPI Auth and Content-Type header

    $response = curl_exec($curl);
    // Close cURL session
    curl_close($curl);
    echo $response . PHP_EOL;
}
