<?php
include('getbyICWho.php');
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
    else if($typeOfFilter=="indicatorCode4"){
        $chosenDimension=checkMare("checkCountry");
        $sex=checkMare("sexes")[0];
        $years=fromStringtoInt(checkMare("years")[0]);
        $result=dataForAdults("", $chosenDimension, $years, $sex);
    }
    return $result;

}
function fromStringtoInt($stringV){
    $res_temp=substr($stringV, 4, 100);
    $nr=(int)$res_temp;
    return $nr;
}
?>