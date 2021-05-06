<?php
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

function map($labels,$datasets){
    //$input = fopen('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\view\Statistici\resources\data.csv', 'r');
    //$output = fopen('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\view\Statistici\resources\temporary.csv', 'w');
    $input = fopen('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\view\Statistici\resources\data.csv', 'r');
    $output = fopen('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\view\Statistici\resources\temporary.csv', 'w');
    $data = fgetcsv($input);
    fputcsv( $output, $data);
    while( false !== ( $data = fgetcsv($input) ) ){ 
        $i=0;
        $ok=0;      
        foreach($labels as $tara){
            if ($data[0] == $tara) {
                $data[1] =$datasets[$i];
                $ok=1;
            }
            $i++;
        }
        if($ok==0)
            $data[1]=0;
            
    fputcsv( $output, $data);
    }
    fclose( $input );
    fclose( $output );

    //unlink('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\view\Statistici\resources\data.csv');
    //rename('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\view\Statistici\resources\temporary.csv', 'D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\view\Statistici\resources\data.csv');
    unlink('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\view\Statistici\resources\data.csv');
    rename('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\view\Statistici\resources\temporary.csv', 'D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\view\Statistici\resources\data.csv');

}

