<?php
    include('agestdObesity.php');
    include('../who_crude/crudeObesity.php');
    include('../../model/db-connect.php');
    include('../who_women/womenObesity.php');
    include('../who_children/childrenObesity.php');
    include('testRequest.php');

    $request=file_get_contents("php://input");
    $object=json_decode($request,true);
    //var_dump($object);
    //echo $object[1]["Method"];

    if($object[0]["IndicatorCode"]=="indicatorCode4"){
        echo "saluuut";
        $category= new agestdObesity($conn);
        $category->country[0]=$object[3]["Country"];
        $category->year=$object[4]["Year"];
        $category->sex=$object[5]["Sex"];
        $category->value=$object[6]["Value"];

        requestAPI($object[1]["Method"], $category, $object[7]["New Value"],$object[2]["ModifyValue"]);
        /*
        if($object[1]["Method"]=="UPDATE"){
            $category->update($object[2]["ModifyValue"],$object[7]["New Value"]);
        }
        else
            if($object[1]["Method"]=="ADD"){
                $category->add();
            }
            else{
                $category->delete1();
            }
            */
    }
    else
    if($object[0]["IndicatorCode"]=="indicatorCode3"){
        echo "saluuut";
        $category= new crudeObesity($conn);
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
            else{
                $category->delete1();
            }
    }
    else
    if($object[0]["IndicatorCode"]=="indicatorCode2"){
        echo "salut";
        $category= new womenObesity($conn);
        $category->country[0]=$object[3]["Country"];
        $category->year=$object[4]["Year"];
        $category->area=$object[5]["Area"];
        $category->value=$object[6]["Value"];
        if($object[1]["Method"]=="UPDATE"){
            $category->update($object[2]["ModifyValue"],$object[7]["New Value"]);
        }
        else
            if($object[1]["Method"]=="ADD"){
                $category->add();
            }
            else{
                $category->delete1();
            }

    }
    else{

        echo "buna ziua";
        $category= new childrenObesity($conn);
        $category->country[0]=$object[3]["Country"];
        $category->year=$object[4]["Year"];
        $category->sex=$object[5]["Sex"];
        $category->age=$object[6]["Age"];
        $category->value=$object[7]["Value"];

        if($object[1]["Method"]=="UPDATE"){
            $category->update($object[2]["ModifyValue"],$object[8]["New Value"]);
        }
        else
            if($object[1]["Method"]=="ADD"){
                $category->add();
            }
            else{
                $category->delete1();
            }

    }
?>