<?php
include('controller/statistici-modelwho.php');
function dataForKids($spatialDimension, $chosenDimensions, $year, $sex, $ageCategory){
    include('model/db-connect.php');

    $labels=[];
    $values=[];

    $finalResult=[];
    for($i=0; $i<count($chosenDimensions); $i++)
    {
        $query="SELECT whoage.country, whoage.value FROM whoage WHERE 
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

function dataForNonPregnantWomen($spatialDimension, $chosenDimensions, $year, $areaType){
    include('model/db-connect.php');
    $labels=[];
    $values=[];

    $finalResult=[];
    for($i=0; $i<count($chosenDimensions); $i++)
    {
        $query="SELECT whowomen.country, whowomen.value FROM whowomen WHERE 
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

function dataForAdultsC($spatialDimension, $chosenDimensions, $year, $sex){
    include('model/db-connect.php');
    $labels=[];
    $values=[];

    $finalResult=[];
    for($i=0; $i<count($chosenDimensions); $i++)
    {
        $query="SELECT whocrude.country, whocrude.value FROM whocrude WHERE 
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

function dataForAdults($spatialDimension, $chosenDimensions, $year, $sex){
    include('model/db-connect.php');
    $labels=[];
    $values=[];

    $finalResult=[];
    for($i=0; $i<count($chosenDimensions); $i++)
    {
        $query="SELECT whoagestd.country, whoagestd.value FROM whoagestd WHERE 
        whoagestd.country='{$chosenDimensions[$i]}' AND 
        whoagestd.year={$year} AND 
        whoagestd.sex='{$sex}'";
        
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {
                if ($row = mysqli_fetch_assoc($result)) {
                    $tuple=array($row['country'], $row['value']);
                    array_push($labels, $row['country']);
                    array_push($values, $row['value']);
            }
        }
    }
    return array($labels, $values);
}

function getDataByFilter(){

    $typeOfFilter=checkMare("indicatorCode")[0];

    
    if($typeOfFilter=="indicatorCode1"){
        $chosenDimension=checkMare("checkCountry");
        $sex=checkMare("sexes")[0];

        $valoare=checkMare("years")[0];
        $years=fromStringtoInt(checkMare("years")[0]);
        $ages=checkMare("ages")[0];
        
        $result=dataForKids("", $chosenDimension, $years, $sex, $ages);
    }
    else if($typeOfFilter=="indicatorCode2"){
        $chosenDimension=checkMare("checkCountry");
        $years=fromStringtoInt(checkMare("years")[0]);
        $area=checkMare("areas")[0];

        $result=dataForNonPregnantWomen("", $chosenDimension, $years, $area);

    }
    else if($typeOfFilter=="indicatorCode3"){
        $chosenDimension=checkMare("checkCountry");
        $sex=checkMare("sexes")[0];
        $years=fromStringtoInt(checkMare("years")[0]);
        $result=dataForAdultsC("", $chosenDimension, $years, $sex);
    }
    else {
        $chosenDimension=checkMare("checkCountry");
        $sex=checkMare("sexes")[0];
        $years=fromStringtoInt(checkMare("years")[0]);
        $result=dataForAdults("", $chosenDimension, $years, $sex);
    }
    return $result;
}
                $result=getDataByFilter();
                $labelswho= $result[0];
                $datasetswho= $result[1];
function fromStringtoInt($stringV){
    $res_temp=substr($stringV, 4, 100);
    $nr=(int)$res_temp;
    return $nr;
}
?>