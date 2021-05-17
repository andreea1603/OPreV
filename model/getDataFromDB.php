<?php
function getCode(){
    include('db-connect.php');

    $countries=array();
    $codes=array();
    $query="Select nume,code3 from countries";
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        array_push($countries,$row["nume"]);
        array_push($codes,$row["code3"]);
    }
    return array($countries,$codes);
}

function getYearsByCode($code){
    include('db-connect.php');
    echo $code;
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
?>