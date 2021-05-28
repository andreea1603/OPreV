<?php
function getCode(){
    include('db-connect.php');

    $countries=array();
    $codes=array();
    $query="Select distinct(nume),code3 from countries join whoage on code3=country order by nume asc";
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        array_push($countries,$row["nume"]);
        array_push($codes,$row["code3"]);
    }

    return array($countries,$codes);
}

function getCountries($country,$table){
    include('db-connect.php');

    $query = "Select * from ".$table." where name =?";
    $typeOfParam='s';

    if ($stmt = mysqli_prepare($conn, $query)){
        mysqli_stmt_bind_param($stmt, $typeOfParam, $country);
        mysqli_stmt_execute($stmt);
    }
    $result = mysqli_stmt_get_result($stmt);
    $num= mysqli_num_rows($result);
    
    return $num;
}
function getYearsByCode($code){
    include('db-connect.php');
    $years=array();
    
    if($code==1)
        $query="Select distinct(year) from whoage";
    else
        if($code=2)
            $query="Select distinct(year) from whowomen";
        else
            if($code==3)
                $query="Select distinct(year) from whocrude";
            else
                $query="Select distinct(year) from whoagestd";

    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        array_push($years,$row["year"]);
    }
    sort($years);
    return $years;
}
function getAgesByCode(){
    include('db-connect.php');
    $ages=array();
    
    $query="Select distinct(age) from whoage";
    

    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        array_push($ages,$row["age"]);
    }
    sort($ages);
    return $ages;
}
function getAreasByCode(){
    include('db-connect.php');
    $areas=array();
    
    $query="Select distinct(area) from whowomen";
        
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        if($row["area"]!="")
            array_push($areas,$row["area"]);
    }
    sort($areas);
    return $areas;
}

function getSexByCode($code){
    include('db-connect.php');
    $sexes=array();
    
    if($code==1)
        $query="Select distinct(sex) from whoage";
    else
        if($code==3)
            $query="Select distinct(sex) from whocrude";
        else
            $query="Select distinct(sex) from whoagestd";

    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        array_push($sexes,$row["sex"]);
    }
    sort($sexes);
    return $sexes;
}
?>