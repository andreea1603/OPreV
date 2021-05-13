<?php 
function checkMare($nume){
    $array=[];

    echo $nume."<br>";
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
    checkMare("indicatorCode");
}
?>