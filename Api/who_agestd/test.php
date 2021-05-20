<?php
    include('agestdObesity.php');

    include('../../model/db-connect.php');

    
    /*if($category->convertCountry('Rmania')!=null)
    
        echo "salut";
    else
        echo "pa";

    
    echo $category->update("", "");
    echo $category->getIndex();
    echo "<br>";
    echo ($category->checkIfExists());
        */
    $request=file_get_contents("php://input");
    $object=json_decode($request,true);
    //var_dump($object);
    //echo $object[1]["Method"];

    if($object[0]["IndicatorCode"]=="indicatorCode4"){
        $category= new agestdObesity($conn);
        $category->country[0]=$object[3]["Country"];
        $category->year=$object[4]["Year"];
        $category->sex=$object[5]["Sex"];
        $category->value=$object[6]["Value"];
        if($object[1]["Method"]=="UPDATE"){
            $category->update($object[2]["ModifyValue"],$object[7]["New Value"]);
        }
        else
            if($object[1]["Method"]=="ADD"){
                $category->add();
            }
    }
?>