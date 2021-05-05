<?php
include('../controller/functions.php');
include('../controller/init.php');
include('../controller/db-connect.php');

if(isset($_POST['submit'])){

    if(!empty($_POST['checkCountry'])) {
        foreach($_POST['checkCountry'] as $value){
            echo "value : ".$value.'<br/>';
        }
    }
}
?>