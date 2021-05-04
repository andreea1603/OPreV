<?php

 
$dataPoints = array( 
	
);
include('controller/db-connect.php');
    include('controller/init.php');

    $query="select geo.name, valori.valoare, geo.id from  geo, valori where valori.id=geo.id*3";
    $result=mysqli_query($conn, $query);
	echo "<br>";
	
	if (mysqli_num_rows($result)) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
		
          array_push($dataPoints, array(
            "y"=>$row["valoare"], "label"=>$row["name"]
        ));
		}
	  } else {
		echo "0 results";
	  }

?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="chart.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
</head>

<body>
<canvas id="lineChart" class="lineChart" ></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
<canvas id="myChart" width="100" height="100"></canvas>
<div width="10px" height="10px">
<?php
include('controller/db-connect.php');

$labels=array();
$datasets=array();
$query="select geo.name, valori.valoare, geo.id from  geo, valori where valori.id=geo.id*3";
$result=mysqli_query($conn, $query);
echo "<br>";

if (mysqli_num_rows($result)) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      array_push($labels, $row["name"]);
      array_push($datasets, $row["valoare"]);
    }
  } else {
    echo "0 results";
  }

?>
salut
<script>

 var labels1=
        <?php echo json_encode($labels);    ?>;

var datasets= <?php echo json_encode($datasets);  ?>;

  
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels1,
        datasets: [{
            label: 'bmi',
            data: datasets,
            barPercentage: 1.5,
            maxBarThickness: 30,
            minBarLength: 20,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
        }
        ]
    },
   
    
});
</script>
</div>
<script src="main.js"></script>
</body>
</html>   