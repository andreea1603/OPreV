<?php
    include('agestdObesity.php');

    include('../../model/db-connect.php');

    $category= new agestdObesity($conn);
    /*if($category->convertCountry('Rmania')!=null)
    
        echo "salut";
    else
        echo "pa";

        */
    echo $category->update("", "");
    echo $category->getIndex();
    echo "<br>";
    echo ($category->checkIfExists());
?>