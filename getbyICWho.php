<?php

function dataForChids($spatialDimension, $chosenDimensions, $year, $sex, $ageCategory){
    include('model/db-connect.php');




    $chosenDimensions=[];

    array_push($chosenDimensions, "PRT");
    array_push($chosenDimensions, "AFG");
    $year=2016;
    $sex="BTSX";
    $ageCategory="S05-19";


    echo "salut";
    $finalResult=[];
    for($i=0; $i<count($chosenDimensions); $i++)
    {
        $query="SELECT whoage.country, whoage.value FROM whoage WHERE 
        country='{$chosenDimensions[$i]}' AND 
        whoage.year={$year} AND 
        whoage.sex='{$sex}' AND 
        whoage.age='{$ageCategory}'";
        echo $query;
        
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {


                if ($row = mysqli_fetch_assoc($result)) {
                    $tuple=array($row['country'], $row['value']);
                   array_push($finalResult, $tuple);
                   echo "am intrat";
            }
        }
        echo "am iesit";

    }
    print_r($finalResult);
}

    dataForChids("","", 1, "m", "1");


?>