<?php
    include('agestdObesity.php');
    include('../who_crude/crudeObesity.php');
    include('../../model/db-connect.php');
    include('../who_women/womenObesity.php');
    include('../who_children/childrenObesity.php');
    include('testRequest.php');
    include('../who_children/testRequest.php');
    include('../who_women/testRequest.php');
    include('../who_crude/testRequest.php');    
    include('../eurostat/testRequest.php');



    include('../eurostat/eurostat.php');

    $request=file_get_contents("php://input");
    $object=json_decode($request,true);

    if(isset($object[0]["IndicatorCode"])){
        if($object[0]["IndicatorCode"]=="indicatorCode4"){
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
            requestAPI1($object[1]["Method"], $category, $object[7]["New Value"],$object[2]["ModifyValue"]);

    }
    else
    if($object[0]["IndicatorCode"]=="indicatorCode2"){
        echo "salut";
        $category= new womenObesity($conn);
        $category->country[0]=$object[3]["Country"];
        $category->year=$object[4]["Year"];
        $category->area=$object[5]["Area"];
        $category->value=$object[6]["Value"];
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
            requestAPI2($object[1]["Method"], $category, $object[7]["New Value"],$object[2]["ModifyValue"]);

    }
    else
    if($object[0]["IndicatorCode"]=="indicatorCode1"){

        echo "buna ziua";
        $category= new childrenObesity($conn);
        $category->country[0]=$object[3]["Country"];
        $category->year=$object[4]["Year"];
        $category->sex=$object[5]["Sex"];
        $category->age=$object[6]["Age"];
        $category->value=$object[7]["Value"];
/*
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
*/
    
    requestAPI4($object[1]["Method"], $category, $object[7]["New Value"],$object[2]["ModifyValue"]);

    }
}
else{//aici eurostat

    $category=new eurostat($conn);    

    //print_r($object);
    $category->country[0]=$object[2]["Country"];
    $category->bmi=$object[4]["BMI"];
    $category->value=$object[5]["Value"];
    $category->year=$object[3]["Year"];
    $category->newvalue=$object[6]["New Value"];
    //echo $category->bmi; 
    /*
    if($object[0]["Method"]=='DELETE')
        $category->Update("valoare",0);
    else
        if($object[0]["Method"]=='UPDATE')
            $category->Update($object[1]["ModifyValue"],$object[6]["New Value"]);
        else
            $category->add();//adaugat la json si newvalue chiar de nu folosim
*/

    requestAPI5($object[0]["Method"], $category, $object[6]["New Value"],$object[1]["ModifyValue"]);
        }
?>