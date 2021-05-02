<?php
 
$dataPoints = array( 
	array("y" => 7,"label" => "March" ),
	array("y" => 12,"label" => "April" ),
	array("y" => 28,"label" => "May" ),
	array("y" => 18,"label" => "June" ),
	array("y" => 41,"label" => "July" )
);
 array_push($dataPoints, array("y" =>9,"label" => "Maara" ));
 print_r ($dataPoints);

    include('controller/db-connect.php');
    include('controller/init.php');

    $query="select geo.name, valori.valoare, geo.id from  geo, valori where valori.id=geo.id*3";
    $result=mysqli_query($conn, $query);
	echo "<br>";
	
	if (mysqli_num_rows($result)) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
		  echo $row["id"]."    "."id: " . $row["name"]."   ".$row["valoare"]."<br>";
		}
	  } else {
		echo "0 results";
	  }
    echo "gata";
 
?>