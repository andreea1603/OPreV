<?php
function getOverweightY($countries, $year)
{
    include('model/db-connect.php');
    echo "<br>";
    echo $year;
    echo "<br>";
    echo "<br>";
    $query = "";
    if ($year == 2008) {
        $query = "select geo.name, valori.valoare, geo.id from  geo, valori where 
        valori.id=((select count(*) from geo)+geo.id)*3";
    }
    if ($year == 2014) {

        $query = "select geo.name, valori.valoare, geo.id from  geo, valori where 
        valori.id=1+ ((select count(*) from geo)+geo.id)*3";
    }
    if ($year == 2017) {
        $query = "select geo.name, valori.valoare, geo.id from  geo, valori where 
        valori.id= 2 +((select count(*) from geo)+geo.id)*3";
    }

    $result = mysqli_query($conn, $query);
    $names = array();
    $values = array();

    if (mysqli_num_rows($result)) {

        for ($i = 0; $i <= 37; $i++) {
            if ($row = mysqli_fetch_assoc($result)) {
                if (check($countries, $row['name']) == 1) {
                    array_push($values, $row['valoare']);
                    array_push($names, $row['name']);
                }
                if (count($names) > count($values))
                    array_push($values, 0);
            }
            
        }
    }

    return array($names, $values);
}

function getObeseY($countries, $year)
{
    include('model/db-connect.php');
    echo "<br>";
    echo $year;
    echo "<br>";
    echo "<br>";
    $query = "";
    if ($year == 2008) {
        $query = "select geo.name, valori.valoare, geo.id from  geo, valori where 
        valori.id=(select count(*) from geo)*6 + geo.id*3";
    }
    if ($year == 2014) {

        $query = "select geo.name, valori.valoare, geo.id from  geo, valori where 
        valori.id= (1+ (select count(*) from geo)*6+geo.id*3)";
    }
    if ($year == 2017) {
        $query =  "select geo.name, valori.valoare, geo.id from  geo, valori where 
        valori.id=geo.id*3+2";
    }

    $result = mysqli_query($conn, $query);
    $names = array();
    $values = array();

    if (mysqli_num_rows($result)) {

        for ($i = 0; $i <= 37; $i++) {
            if ($row = mysqli_fetch_assoc($result)) {
                if (check($countries, $row['name']) == 1) {
                    array_push($values, $row['valoare']);
                    array_push($names, $row['name']);
                }
                if (count($names) > count($values))
                    array_push($values, 0);
            }
        }
    }
    return array($names, $values);
}

function getPreobeseY($countries, $year)
{
    include('model/db-connect.php');
    echo "<br>";
    echo $year;
    echo "<br>";
    echo "<br>";
    $query = "";
    if ($year == 2008) {
        $query = "select geo.name, valori.valoare, geo.id from  geo, valori where 
        valori.id=geo.id*3";
    }
    if ($year == 2014) {

        $query = "select geo.name, valori.valoare, geo.id from  geo, valori where 
        valori.id=geo.id*3+1";
    }
    if ($year == 2017) {
        $query =  "select geo.name, valori.valoare, geo.id from  geo, valori where 
        valori.id=( 2 +(select count(*) from geo)*6+ geo.id*3)";
    }

    $result = mysqli_query($conn, $query);
    $names = array();
    $values = array();

    if (mysqli_num_rows($result)) {

        for ($i = 0; $i <= 37; $i++) {
            if ($row = mysqli_fetch_assoc($result)) {
                if (check($countries, $row['name']) == 1) {
                    array_push($values, $row['valoare']);
                    array_push($names, $row['name']);
                }
                if (count($names) > count($values))
                    array_push($values, 0);
            }
        }
    }
    return array($names, $values);
}

function getOverweight($countries)
{
    include('model/db-connect.php');

    $query_name = "select geo.name, geo.id  from  geo ";

    $query_pre2008 = "select geo.name, valori.valoare, geo.id from  geo, valori where 
    valori.id=((select count(*) from geo)+geo.id)*3";
    $query_pre2014 = "select geo.name, valori.valoare, geo.id from  geo, valori where 
    valori.id=1+ ((select count(*) from geo)+geo.id)*3";
    $query_pre2017 = "select geo.name, valori.valoare, geo.id from  geo, valori where 
    valori.id= 2 +((select count(*) from geo)+geo.id)*3";

    $result_pre_2008 = mysqli_query($conn, $query_pre2008);
    $result_pre_2014 = mysqli_query($conn, $query_pre2014);
    $result_pre_2017 = mysqli_query($conn, $query_pre2017);

    $result_name = mysqli_query($conn, $query_name);
    $pre2008 = array();
    $pre2017 = array();
    $pre2014 = array();
    $names = array();
    $country_id = array();


    for ($i = 0; $i <= 40; $i++) {

        if (mysqli_num_rows($result_name)) {

            if ($row = mysqli_fetch_assoc($result_name)) {

                array_push($names, $row['name']);
                array_push($country_id, $row['id']);
            } else
                array_push($names, 0);
        }
    }

    for ($i = 0; $i <= 40; $i++) {
        $pre2008[$i] = 0;
        $pre2017[$i] = 0;
        $pre2014[$i] = 0;
    }
    for ($i = 0; $i <= 40; $i++) {

        if (mysqli_num_rows($result_pre_2008)) {

            if ($row = mysqli_fetch_assoc($result_pre_2008)) {

                $pre2008[$row['id']] = $row['valoare'];
            }
        }
        if (mysqli_num_rows($result_pre_2014)) {

            if ($row = mysqli_fetch_assoc($result_pre_2014)) {

                $pre2014[$row['id']] = $row['valoare'];
            }
        }
        if (mysqli_num_rows($result_pre_2017)) {

            if ($row = mysqli_fetch_assoc($result_pre_2017)) {

                $pre2017[$row['id']] = $row['valoare'];
            }
        }
    }
    return array($names, $pre2008, $pre2014, $pre2017);
}

function getPreobesity($countries)
{
    include('model/db-connect.php');

    $query_name = "select geo.name, geo.id  from  geo ";

    $query_pre2008 = "select geo.name, valori.valoare, geo.id from  geo, valori where 
    valori.id=geo.id*3";
    $query_pre2014 = "select geo.name, valori.valoare, geo.id from  geo, valori where 
    valori.id=geo.id*3+1";
    $query_pre2017 = "select geo.name, valori.valoare, geo.id from  geo, valori where 
    valori.id=geo.id*3+2";

    $result_pre_2008 = mysqli_query($conn, $query_pre2008);
    $result_pre_2014 = mysqli_query($conn, $query_pre2014);
    $result_pre_2017 = mysqli_query($conn, $query_pre2017);

    $result_name = mysqli_query($conn, $query_name);
    $pre2008 = array();
    $pre2017 = array();
    $pre2014 = array();
    $names = array();
    $country_id = array();


    for ($i = 0; $i <= 40; $i++) {

        if (mysqli_num_rows($result_name)) {

            if ($row = mysqli_fetch_assoc($result_name)) {

                array_push($names, $row['name']);
                array_push($country_id, $row['id']);
            } else
                array_push($names, 0);
        }
    }

    for ($i = 0; $i <= 40; $i++) {
        $pre2008[$i] = 0;
        $pre2017[$i] = 0;
        $pre2014[$i] = 0;
    }
    for ($i = 0; $i <= 40; $i++) {

        if (mysqli_num_rows($result_pre_2008)) {

            if ($row = mysqli_fetch_assoc($result_pre_2008)) {

                $pre2008[$row['id']] = $row['valoare'];
            }
        }
        if (mysqli_num_rows($result_pre_2014)) {

            if ($row = mysqli_fetch_assoc($result_pre_2014)) {

                $pre2014[$row['id']] = $row['valoare'];
            }
        }
        if (mysqli_num_rows($result_pre_2017)) {

            if ($row = mysqli_fetch_assoc($result_pre_2017)) {

                $pre2017[$row['id']] = $row['valoare'];
            }
        }
    }

    return array($names, $pre2008, $pre2014, $pre2017);
}

function check($countries, $country)
{
    for ($i = 0; $i < count($countries); $i++) {
        if ($countries[$i] == $country)
            return 1;
    }
    return 0;
}





function getObese($countries)
{
    include('model/db-connect.php');

    $query_name = "select geo.name, geo.id  from  geo ";

    $query_pre2008 = "select geo.name, valori.valoare, geo.id from  geo, valori where 
    valori.id=(select count(*) from geo)*6 + geo.id*3";
    $query_pre2014 = "select geo.name, valori.valoare, geo.id from  geo, valori where 
    valori.id= (1+ (select count(*) from geo)*6+geo.id*3)";
    $query_pre2017 = "select geo.name, valori.valoare, geo.id from  geo, valori where 
    valori.id=( 2 +(select count(*) from geo)*6+ geo.id*3)";

    $result_pre_2008 = mysqli_query($conn, $query_pre2008);
    $result_pre_2014 = mysqli_query($conn, $query_pre2014);
    $result_pre_2017 = mysqli_query($conn, $query_pre2017);

    $result_name = mysqli_query($conn, $query_name);
    $pre2008 = array();
    $pre2017 = array();
    $pre2014 = array();
    $names = array();
    $country_id = array();


    for ($i = 0; $i <= 40; $i++) {

        if (mysqli_num_rows($result_name)) {

            if ($row = mysqli_fetch_assoc($result_name)) {
                    array_push($names, $row['name']);
                    array_push($country_id, $row['id']);
                
            } else
                array_push($names, 0);
        }
    }

     for ($i = 0; $i <= 40; $i++) {
        $pre2008[$i] = 0;
        $pre2017[$i] = 0;
        $pre2014[$i] = 0;
    }
    
    for ($i = 0; $i <= 40; $i++) {

        if (mysqli_num_rows($result_pre_2008)) {

            if ($row = mysqli_fetch_assoc($result_pre_2008)) {
                    $pre2008[$row['id']] = $row['valoare'];            }
        }

        if (mysqli_num_rows($result_pre_2014)) {

            if ($row = mysqli_fetch_assoc($result_pre_2014)) {
                    $pre2014[$row['id']] = $row['valoare'];            }
        }
        if (mysqli_num_rows($result_pre_2017)) {

            if ($row = mysqli_fetch_assoc($result_pre_2017)) {
                        $pre2017[$row['id']] = $row['valoare'];            }
        }
    }


    return array($names, $pre2008, $pre2014, $pre2017);
}
