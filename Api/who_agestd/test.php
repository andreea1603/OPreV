<?php
    include('agestdObesity.php');

    include('../../model/db-connect.php');

    $category= new agestdObesity($conn);
    $category->updateCountry();

?>