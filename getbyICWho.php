<?php
include('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\controller\statistici-model.php');

function dataForKids($spatialDimension, $chosenDimensions, $year, $sex, $ageCategory){
    include('model/db-connect.php');
    //$chosenDimensions=[];
    //array_push($chosenDimensions, "PRT");
    //array_push($chosenDimensions, "AFG");
    //$year=2016;
    //$sex="BTSX";
    //$ageCategory="S05-19";

    $labels=[];
    $values=[];

    echo "<br>".$year."<br>";
    echo "<br>".$sex."<br>";

        array_push($chosenDimensions,"ROU");
    $finalResult=[];
    for($i=0; $i<count($chosenDimensions); $i++)
    {
        $query="SELECT whoage.country, whoage.value FROM whoage WHERE 
        country='{$chosenDimensions[$i]}' AND 
        whoage.year={$year} AND 
        whoage.sex='{$sex}' AND 
        whoage.age='{$ageCategory}'";
           //     echo $query;

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {


                if ($row = mysqli_fetch_assoc($result)) {
              //      $tuple=array($row['country'], $row['value']);
              //     array_push($finalResult, $tuple);
                   array_push($labels, $row['country']);
                   array_push($values, $row['value']);
            }
        }

    }
  
    //print_r($labels);
    //print_r($values);
    //print_r($finalResult);
    return array($labels, $values);
}

function dataForNonPregnantWomen($spatialDimension, $chosenDimensions, $year, $areaType){
    /////DE FACUT
    ////////////////
    include('model/db-connect.php');
    /*
    $chosenDimensions=[];
    array_push($chosenDimensions, "PRT");
    array_push($chosenDimensions, "AFG");
    $year=2016;
    $sex="BTSX";
    $ageCategory="S05-19";

    */
    $labels=[];
    $values=[];

    $finalResult=[];
    for($i=0; $i<count($chosenDimensions); $i++)
    {
        $query="SELECT whowomen.country, whowomen.value FROM whowomen WHERE 
        country='{$chosenDimensions[$i]}' AND 
        whowomen.year={$year} AND 
        whowomen.area='{$areaType}'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {

                if ($row = mysqli_fetch_assoc($result)) {
                  //  $tuple=array($row['country'], $row['value']);
                  // array_push($finalResult, $tuple);
                   array_push($labels, $row['country']);
                   array_push($values, $row['value']);
                   //echo "am intrat";
            }
        }
        //echo "am iesit";

    }

   // print_r($finalResult);
   //print_r($labels);
   //print_r($values);
   return array($labels, $values);

}

function dataForAdultsC($spatialDimension, $chosenDimensions, $year, $sex){
    include('model/db-connect.php');
    /*
    $chosenDimensions=[];
    array_push($chosenDimensions, "PRT");
    array_push($chosenDimensions, "AFG");
    $year=2016;
    $sex="BTSX";
*/
    $labels=[];
    $values=[];

    $finalResult=[];
    for($i=0; $i<count($chosenDimensions); $i++)
    {
        $query="SELECT whocrude.country, whocrude.value FROM whocrude WHERE 
        country='{$chosenDimensions[$i]}' AND 
        whocrude.year={$year} AND 
        whocrude.sex='{$sex}'";
         //       echo $query;

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {


                if ($row = mysqli_fetch_assoc($result)) {
                //    $tuple=array($row['country'], $row['value']);
               //    array_push($finalResult, $tuple);
                   array_push($labels, $row['country']);
                   array_push($values, $row['value']);
            }
        }

    }
   // print_r($finalResult);
 
   //print_r($labels);
   //print_r($values);
    return array($labels, $values);

}

function dataForAdults($spatialDimension, $chosenDimensions, $year, $sex){
    include('model/db-connect.php');
   /* $chosenDimensions=[];
    array_push($chosenDimensions, "PRT");
    array_push($chosenDimensions, "AFG");
    $year=2016;
    $sex="BTSX";
*/
    $labels=[];
    $values=[];

    $finalResult=[];
    for($i=0; $i<count($chosenDimensions); $i++)
    {
        $query="SELECT whoagestd.country, whoagestd.value FROM whoagestd WHERE 
        whoagestd.country='{$chosenDimensions[$i]}' AND 
        whoagestd.year={$year} AND 
        whoagestd.sex='{$sex}'";
       // echo $query;
        
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {


                if ($row = mysqli_fetch_assoc($result)) {
                    $tuple=array($row['country'], $row['value']);
                    array_push($labels, $row['country']);
                    array_push($values, $row['value']);
            }
        }
    }
    //print_r($labels);
    //print_r($values);
    //echo "pa!";
    return array($labels, $values);

}
    //dataForChids("","", 1, "m", ".");

    // checkAll();
    // $result_countries=checkCountry();
    // $countries=$result_countries;
    // print_r($countries);
        
?>