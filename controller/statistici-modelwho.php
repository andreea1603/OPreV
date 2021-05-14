<?php 
function checkMare($nume){
    $array=[];

    if (isset($_POST['submit'])) {

        if (!empty($_POST[$nume])) {

            foreach ($_POST[$nume] as $value) {
                array_push($array, $value);
            }
        }else
            array_push($array,"indicatorCode1");
        
        }
    else
        array_push($array,"indicatorCode1");
    return $array;
}

function checkAllwho(){
    checkMare("checkCountry");
    checkMare("sexes");
    checkMare("ages");
    checkMare("areas");
    checkMare("years");
    checkMare("indicatorCode");
}
?>