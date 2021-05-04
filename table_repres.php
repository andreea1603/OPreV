<?php

 
$dataPoints = array( 
	
);
include('controller/db-connect.php');
    include('controller/init.php');

    $query_name="select geo.name  from  geo ";
    $query="select geo.name, valori.valoare, geo.id from  geo, valori where 
    valori.id=geo.id*3";
    $query1="select valori.valoare, geo.id from  geo, valori where 
    valori.id=geo.id*3+2";
    $query2="select valori.valoare, geo.id from  geo, valori where 
    valori.id=geo.id*3+1";
    $result_preobesity=mysqli_query($conn, $query);
    $result_obesity=mysqli_query($conn, $query1);
    $result_over=mysqli_query($conn, $query2);
    $result_name=mysqli_query($conn, $query_name);

	echo "<br>";
	
       
$labels=array();
$datasets=array();
$preobese=array();
$obesity=array();
$names=array();


    for($i=0; $i<=1000; $i++)
{

    if (mysqli_num_rows($result_name)) {

        if($row = mysqli_fetch_assoc($result_name)) {

            array_push($names, $row['name']);
		}
       
	if (mysqli_num_rows($result_preobesity)) {

        if($row = mysqli_fetch_assoc($result_preobesity)) {

            array_push($datasets, $row["valoare"]);
		}
        else
            array_push($datasets, "u");
       
	  } else {
        array_push($datasets, "u");

	  }

      if (mysqli_num_rows( $result_obesity)) {

        if($row = mysqli_fetch_assoc($result_obesity)) {
		
            array_push($obesity, $row["valoare"]);
		}
        else
            array_push($obesity, "u");
	  } else {
        array_push($obesity, "u");

	  }


      if (mysqli_num_rows( $result_over)) {

        if($row = mysqli_fetch_assoc($result_over)) {
		
            array_push($preobese, $row["valoare"]);
		}
        else
        array_push($preobese, "u");
	  } else {
        array_push($preobese, "u");

	  }
    }
}
?>
<?php

echo "<table border='1'>

<tr>

<th>Country</th>

<th>Obesity BMI 2014</th>

</tr>";

$i=0;
while($i+1<count($names))

  {

  echo "<tr>";

  echo "<td>" . $names[$i] . "</td>";


  echo "<td>" . $datasets[$i] . "</td>";

  echo "<td>" . $preobese[$i] . "</td>";

  echo "<td>" . $obesity[$i] . "</td>";


  echo "</tr>";
  $i=$i+1;


  }

echo "</table>";

 
?>

</body>

</html>