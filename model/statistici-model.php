<?php
include('D:\Xamp\htdocs\PROIECT_TW\OPreV\controller\db-connect.php');

function checkCountry()
{
    $countries=array();
    if (isset($_POST['submit'])) {

        if (!empty($_POST['checkCountry'])) {
            foreach ($_POST['checkCountry'] as $value) {
                array_push($countries, $value);
            }
        }
        else{
            array_push($countries, 'Austria');
                }
    }
    else{
        array_push($countries, 'Austria');
    }
    print_r($countries);

    return $countries;
}
function checkBmi(){
    $bmi=array();
    if (isset($_POST['submit'])) {

        if (!empty($_POST['check1'])) {
            foreach ($_POST['check1'] as $value) {
                array_push($bmi, $value);
            }
        }
        else{
            array_push($bmi, "overweight");
        }
    }
    else{
        array_push($bmi, "overweight");
    }
    print_r($bmi);
    return $bmi;
}
function checkYear(){
    $years=array();
    if (isset($_POST['submit'])) {

        if (!empty($_POST['check2'])) {
            foreach ($_POST['check2'] as $value) {
                array_push($years, $value);
            }
        }
        else{
                array_push($years, 2008);
        }
    }
    else{
        array_push($years, 2008);
    }
    print_r($years);
    return $years;
}
function checkAll(){
checkCountry();
checkBmi();
checkYear();
}