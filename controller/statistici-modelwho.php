<?php 

function checkCountry1(){

    $countriesWho=array();
    if (isset($_POST['submit'])) {

        if (!empty($_POST['checkCountry'])) {
            foreach ($_POST['checkCountry'] as $value) {
                array_push($countriesWho, $value);
            }
        }
        else{
            array_push($countriesWho, 'Austria');
                }
    }
    else{
        array_push($countriesWho, 'Austria');
    }

    return $countriesWho;
}
function checkAges1(){
    $agesWho=array();
    if (isset($_POST['submit'])) {

        if (!empty($_POST['ages'])) {
            foreach ($_POST['ages'] as $value) {
                array_push($agesWho, $value);
            }
        }
        else{
            array_push($agesWho, 2008);
                }
    }
    else{
        array_push($agesWho, 2008);
    }

    return $agesWho;
}

function checkMare($nume){
    $array=[];

    if (isset($_POST['submit'])) {

        if (!empty($_POST[$nume])) {
            foreach ($_POST[$nume] as $value) {
                array_push($array, $value);
            }
        }
    }
    return $array;

}
function checkAllwho(){

    checkMare("checkCountry");
    checkMare("sexes");
    checkMare("ages");
    checkMare("areas");
    checkMare("years");
    checkMare("indiatorCode");
}



?>