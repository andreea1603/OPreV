<?php
function getCode(){
    include('model/db-connect.php');

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
?>