<!DOCTYPE html>
<?php
include('../../controller/init.php');
include('../../controller/functions.php');
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../styles/statistici.css">
        <link rel="stylesheet" href="../../styles/style.css">

        <link rel="shortcut icon" href="../../pictures/vector-creator.ico">

        <title>OPreV</title>
    </head>
    <body>
            <section class="head">
                <ul>
                    <li><a href="../Statistici/statistici.php">Statistici</a></li>
                    <li><a href="../Evenimente/events.php">Evenimente</a></li>
                    <li><a href="../AboutUs/aboutus.php">Despre noi</a></li>
                    <li><a href=<?php if(!$_SESSION['conectat']) echo "../login/login.php"; else echo "../Admin/admin.php";?>>Contul meu</a></li>
                </ul>
            </section>
            <section class="nested">
                <div class="leftmenu">
                    <h2>Filtre</h2>
                    <div class="filter">
                        <form action="a">
                            <label for="country"> Country</label>
                            <select  id="country">
                                <option value="Country">Tara</option>
                                <option value="Country">Romania</option>
                                <option value="Country">America</option>
                                <option value="Country">Germania</option>
                            </select>
                            <label for="age"> Age</label>
                            <select id="age">
                                <option value="Age">Varsta</option>
                                <option value="Age">5-10</option>
                                <option value="Age">10-15</option>
                                <option value="Age">15-25</option>
                                <option value="Age">25-40</option>
                                <option value="Age">40-60</option>
                                <option value="Age">60-</option>
                            </select>
                            <label for="sex"> Sex</label>
                            <select id="sex">
                                <option value="sex">Sex</option>
                                <option value="sex">Masculin</option>
                                <option value="sex">Feminin</option>
                            </select>
                            <label for="BodyMassIndex">Indice de masa corporala</label>
                            <select id="BodyMassIndex">
                                <option value="BodyMassIndex">Indice de masa corporala</option>
                                <option value="BodyMassIndex">Supraponderal</option>
                                <option value="BodyMassIndex">Pre-obez</option>
                                <option value="BodyMassIndex">Obez</option>
                            </select>
                            <label for="representation"> Reprezentare</label>
                            <select  id="representation">
                                <option value="Representation">Reprezentare</option>
                                <option value="Representation">Bara</option>
                                <option value="Representation">Linii</option>
                                <option value="Representation">Tabel</option>
                                <option value="Representation">Mapa</option>
                            </select>
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
                <div class="statistica">
                    <div class="generare">
                    <canvas id="myChart" class="map"></canvas>

                    </div>
                    <div class="butoane">
                        <div><a href="#">CSV</a></div>
                        <div><a href="#">JPG</a></div>
                        <div><a href="#">PDF</a></div>
                    </div>
                </div>
                <div></div>
            </section>
            <footer class="fotr">
                <div class="footerAlign">
                    <ul>
                        <li>
                            <a href="../../Documentation/scholarly.html">
                                    Documentatie
                            </a>
                        </li>
                        <li>
                            <a href="../MainPage/main.php">
                                Acasa
                            </a>
                        </li>
                    </ul>
                </div>
            </footer>


            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
<div width="10px" height="10px">
<?php

include('D:\Xamp\htdocs\PROIECT_TW\OPreV\controller\db-connect.php');

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
    console.log("salut");

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






    </body>
</html>