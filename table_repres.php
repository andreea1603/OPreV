<?php

echo "<table border='1'>

<th></th>
<th>preobesity</th>
<tr>

<th>Country</th>

<th>2008</th>
<th>2014</th>
<th>2017</th>
    </tr>

";

include('functions_repres.php');

$filter1 = "overweight";
$filter2 = "pre-obese";
$filter3 = "obese";
$rez=array();
$pre2008=array();
$pre2014=array();
$pre2017=array();


if ($filter1 == "overweight"); {
    $rez = getOverweight();
    $names = $rez[0];
    $pre2008 = $rez[1];
    $pre2014 = $rez[2];
    $pre2017 = $rez[3];
}
if($filter2=="pre-obese"){
    echo "hei, aici";
    $rez1 = getPreobesity();
    for($i=0; $i<count($rez1[0]); $i++)
        array_push($names, $rez1[0][$i]);

    for($i=0; $i<count($rez1[1]); $i++)
    array_push($pre2008, $rez1[1][$i]);

    for($i=0; $i<count($rez1[2]); $i++)
        array_push($pre2014, $rez1[2][$i]);

    for($i=0; $i<count($rez1[0]); $i++)
        array_push($pre2017, $rez1[3][$i]);
  
}
if($filter2=="obese"){
    $rez1= getObese();
    for($i=0; $i<count($rez1[0]); $i++)
    array_push($names, $rez1[0][$i]);

for($i=0; $i<count($rez1[1]); $i++)
array_push($pre2008, $rez1[1][$i]);

for($i=0; $i<count($rez1[2]); $i++)
    array_push($pre2014, $rez1[2][$i]);

for($i=0; $i<count($rez1[0]); $i++)
    array_push($pre2017, $rez1[3][$i]);
}

$i = 0;
while ($i + 1 < count($names)) {

    echo "<tr>";

    echo "<td>" . $names[$i] . "</td>";

    echo "<td>" . $pre2008[$i] . "</td>";

    echo "<td>" . $pre2014[$i] . "</td>";


    echo "<td>" . $pre2017[$i] . "</td>";


    echo "</tr>";
    $i = $i + 1;
}

echo "</table>";


?>

</body>

</html>