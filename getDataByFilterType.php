<?php
include('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\getbyICWho.php');
function getDataByFilter(){

    //$typeOfFilter=checkMare("indicatorCode");
    $typeOfFilter="indicatorCode1";

    if($typeOfFilter=="indicatorCode1"){
        $chosenDimension=checkMare("checkCountry");
        $sex=checkMare("sexes")[0];
        $years=fromStringtoInt(checkMare("years")[0]);
        $ages=checkMare("ages")[0];
        echo "<br>".$years."<br>";

        $result=dataForKids("", $chosenDimension, 2007, $sex, $ages);
        echo "<br>".$years."<br>";

    }
    else if($typeOfFilter=="indicatorCode2"){
        $chosenDimension=checkMare("checkCountry");
        $years=fromStringtoInt(checkMare("years")[0]);
        $area=checkMare("areas")[0];
        echo "<br>".$years."<br>";

        $result=dataForNonPregnantWomen("", $chosenDimension, $years, $area);

    }
    else if($typeOfFilter=="indicatorCode3"){
        $chosenDimension=checkMare("checkCountry");
        $sex=checkMare("sexes")[0];
        $years=fromStringtoInt(checkMare("years")[0]);
        echo "<br>".$years."<br>";
        $result=dataForAdultsC("", $chosenDimension, $years, $sex);
    }
    else{
        $chosenDimension=checkMare("checkCountry");
        $sex=checkMare("sexes")[0];

        $years=fromStringtoInt(checkMare("years")[0]);
        echo "<br>".$years."<br>";

        $result=dataForAdults("", $chosenDimension, $years, $sex);
    }


    echo "<br>";
    echo "<br>";                echo "<br>";
    echo "<br>";
    print_r($result);
}
function fromStringtoInt($stringV){

    $res_temp=substr($stringV, 4, 100);
    $nr=(int)$res_temp;
    echo $nr;
}
?>