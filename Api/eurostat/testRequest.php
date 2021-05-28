<?php
include('../../model/db-connect.php');
include('../../model/getDataFromDB.php');
function requestAPI5($method, $category, $newValue, $modify)
{
    if ($method == "UPDATE")
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
        'value'=>$category->value,
        'eroare' => 1
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
    

    if(!(codeCountry($data["country"][0],"geo") && codeYears($data["year"],"geo") && codeBmi($data["bmi"]) 
        && codeValue($data["value"]) && codeValue($data["newValue"]))){
        http_response_code (400);
        $data["eroare"]=0;
    }
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
    $response = curl_exec($curl);
    // Close cURL session
    curl_close($curl);
    echo $response . PHP_EOL;
}

function codeCountry($country,$table){
    if($country!=null)    
        if(getCountries($country,$table)==0){
            echo "Tara nu este in baza de date";
            return 0;
        }
    return 1;
}
function codeYears($year,$table){
    if($year!=null)   
        if(getYears($year,$table)==0){
            echo "Anul nu este in baza de date";
            return 0;
        }
    return 1;
}
function codeBmi($bmi){
    if($bmi!=null)   
        if($bmi != "pre-obese" && $bmi != "supraponderal"  && $bmi != "obese" ){
            echo "BMI nu este in baza de date";
            return 0;
        }
    return 1;
}
function codeSex($sex){
    if($sex!=null)   
        if($sex != "both" && $sex != "male"  && $sex != "female" ){
            echo "Sexul nu este in baza de date";
            return 0;
        }
    return 1;
}
function codeAge($age){
    if($age!=null)   
        if($age != "05-19" && $age != "05-09"  && $age != "10-19" ){
            echo "Age nu este in baza de date";
            return 0;
        }
    return 1;
}
function codeValue($value){
    if(!$value==null)
        if(!is_numeric($value)){
            echo "Valoare invalida";
            return 0;
    }
    return 1;
}