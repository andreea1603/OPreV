<!DOCTYPE html>
<?php
include('../../controller/init.php');
include('../../controller/functions.php');
include('../../controller/db-connect.php');
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../styles/statistici.css">
        <link rel="stylesheet" href="../../styles/style.css">

        <link rel="shortcut icon" href="../../pictures/vector-creator.ico">
        <script src="https://code.jscharting.com/latest/jscharting.js"></script>
        <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js'></script>
        <script type="text/javascript" src="functions.js"></script>
        <script type="text/javascript" src="mapChart.js"></script>
        <title>OPreV</title>
    </head>
    <body>
            <section class="head">
                <ul>
                    <li><a href="../Statistici/statistici.php">Statistici</a></li>
                    <li><a href="../Evenimente/events.php">Evenimente</a></li>
                    <li><a href="../AboutUs/aboutus.php">Despre noi</a></li>
                    <li><a href=<?php if(isset($_SESSION['conectat'])) echo "../login/login.php"; else echo "../Admin/admin.php";?>>Contul meu</a></li>
                </ul>
            </section>
            <section class="nested">
                <div class="leftmenu">
                    <h2>Filtre</h2>
                    <div class="filter">
                        <form action="a" method=post>
                            <h3>Country</h3>
                            <div class="scroll" id="first-scroll">
                                <div>
                                <input type="checkbox" id="at" name="checkCountry">
                                <label>Austria</label>
                                </div>
                                <div>
                                <input type="checkbox" id="be" name="checkCountry">
                                <label>Belgium</label>
                                </div>
                                <div>
                                <input type="checkbox" id="bg" name="checkCountry">
                                <label>Bulgaria</label>
                                </div>
                                <div>
                                <input type="checkbox" id="hr" name="checkCountry">
                                <label>Croatia</label>
                                </div>
                                <div>
                                <input type="checkbox" id="cy" name="checkCountry">
                                <label>Cyprus</label>
                                </div>
                                <div>
                                <input type="checkbox" id="cz" name="checkCountry">
                                <label>Czechia</label>
                                </div>
                                <div>
                                <input type="checkbox" id="dk" name="checkCountry">
                                <label>Denmark</label>
                                </div>
                                <div>
                                <input type="checkbox" id="ee" name="checkCountry">
                                <label>Estonia</label>
                                </div>
                                <div>
                                <input type="checkbox" id="fi" name="checkCountry">
                                <label>Finland</label>
                                </div>
                                <div>
                                <input type="checkbox" id="fr" name="checkCountry">
                                <label>France</label>
                                </div>
                                <div>
                                <input type="checkbox" id="de" name="checkCountry">
                                <label for="horns">Germany</label>
                                </div>
                                <div>
                                <input type="checkbox" id="el" name="checkCountry">
                                <label>Greece</label>
                                </div>
                                <div>
                                <input type="checkbox" id="hu" name="checkCountry">
                                <label>Hungary</label>
                                </div>
                                <div>
                                <input type="checkbox" id="ie" name="checkCountry">
                                <label>Ireland</label>
                                </div>
                                <div>
                                <input type="checkbox" id="is" name="checkCountry">
                                <label>Iceland</label>
                                </div>
                                <div>
                                <input type="checkbox" id="it" name="checkCountry">
                                <label>Italy</label>
                                </div>
                                <div>
                                <input type="checkbox" id="lt" name="checkCountry">
                                <label>Lithuania</label>
                                </div>
                                <div>
                                <input type="checkbox" id="lu" name="checkCountry">
                                <label>Luxembourg</label >
                                </div>
                                <div>
                                <input type="checkbox" id="lv" name="checkCountry">
                                <label>Latvia</label>
                                </div>
                                <div>
                                <input type="checkbox" id="mk" name="checkCountry">
                                <label>North Macedonia</label>
                                </div>
                                <div>
                                <input type="checkbox" id="mt" name="checkCountry">
                                <label>Malta</label>
                                </div>
                                <div>
                                <input type="checkbox" id="nl" name="checkCountry">
                                <label>Netherlands</label>
                                </div>
                                <div>
                                <input type="checkbox" id="no" name="checkCountry">
                                <label">Norway</label>
                                </div>
                                <div>
                                <input type="checkbox" id="pl" name="checkCountry">
                                <label>Poland</label>
                                </div>
                                <div>
                                <input type="checkbox" id="pt" name="checkCountry">
                                <label>Portugal</label>
                                </div>
                                <div>
                                <input type="checkbox" id="ro" name="checkCountry">
                                <label>Romania</label>
                                </div>
                                <div>
                                <input type="checkbox" id="rs" name="checkCountry">
                                <label>Serbia</label>
                                </div>
                                <div>
                                <div>
                                <input type="checkbox" id="es" name="checkCountry">
                                <label>Spain</label>
                                </div>
                                <input type="checkbox" id="se" name="checkCountry">
                                <label>Sweden</label>
                                </div>
                                <div>
                                <input type="checkbox" id="si" name="checkCountry">
                                <label>Slovania</label>
                                </div>
                                <div>
                                <input type="checkbox" id="sk" name="checkCountry">
                                <label>Slovakia</label>
                                </div>
                                <div>
                                <input type="checkbox" id="tr" name="checkCountry">
                                <label>Turkey</label>
                                </div>
                                <div>
                                <input type="checkbox" id="uk" name="checkCountry">
                                <label>United Kingdom</label>
                                </div>
                            </div>
                            <input type="button" onclick="selectAll()" value="Select All">
                            
                            <h3>BMI</h3>
                            <div class="scroll">
                                <div>
                                    <input type="checkbox" id="preobez" name="check1" onclick="onlyOneBmi(this)">
                                    <label for="bmi">Preobezitate</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="obez" name="check1" onclick="onlyOneBmi(this)">
                                    <label for="bmi">Obezitate</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="supra" name="check1" onclick="onlyOneBmi(this)">
                                    <label for="bmi">Supraponderali</label>
                                </div>
                            </div>
                            <h3>Year</h3>
                            <div class="scroll">
                                <div>
                                    <input type="checkbox" id="first" name="check2" onclick="onlyOneYear(this)">
                                    <label for="year">2008</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="second" name="check2" onclick="onlyOneYear(this)">
                                    <label for="year">2014</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="third" name="check2" onclick="onlyOneYear(this)">
                                    <label for="year">2017</label>
                                </div>
                            </div>
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
                <div class="statistica">
                    <div class="reprezentare">
                        <div class="btn-group">
                            <button onclick="barChart()">Table</button>
                            <button onclick="barChart()">Bar</button>
                            <button onclick="lineChart()">Line</button>
                            <button onclick="mapChart()">Map</button>
                        </div>
                        <div class="generare">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div class="butoane">
                        <div><a href="#">CSV</a></div>
                        <div><a href="#">JPG</a></div>
                        <div><a href="#">PDF</a></div>
                    </div>
                </div>
                <div class="right-part">
                    <a href="../StatisticiWho/statisticiWho.php"><img id="logo" src="../../pictures/whoLogo.jpg" alt=""></a>
                </div>
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
<?php
$labels=array();
$datasets=array();
$query="select geo.name, valori.valoare, geo.id from  geo, valori where valori.id=geo.id*3";
$result=mysqli_query($conn, $query);
echo "<br>";

if (mysqli_num_rows($result)) {
    while($row = mysqli_fetch_assoc($result)) {
      array_push($labels, $row["name"]);
      array_push($datasets, $row["valoare"]);
    }
  } else {
    echo "0 results";
  }
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
<script>
function barChart(){
    var labels1= <?php echo json_encode($labels);?>;
    var datasets= <?php echo json_encode($datasets);  ?>;
    console.log(labels1);
    console.log(datasets);
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
}
</script>
<script>
    function lineChart(){
        var labels1= <?php echo json_encode($labels);?>;
        var datasets= <?php echo json_encode($datasets);  ?>;
        var ctx = document.getElementById('myChart');
        var myChart=new Chart(ctx,
        {"type":"line",
        "data":{"labels":labels1,
        "datasets":[{"label":"Dataset","data":datasets,
                    "fill":true,
                    "borderWidth":10,
                    "borderColor":"rgb(75, 192, 192)",
                    "lineTension":0}]}});
        myChart.update();
    }
</script>
<script>
    function mapChart(){
        d3.csv('resources/da.csv', function(err, rows){
        function unpack(rows, key) {
            return rows.map(function(row) { return row[key]; });
        }
        console.log(unpack(rows, 'country_code'));
        var data = [{
                type: 'choropleth',
                locations: unpack(rows, 'country_code'),
                z: unpack(rows, 'value'),
                text: unpack(rows, 'country_name'),
                colorscale: [
                    [0,'rgb(5, 10, 172)'],[0.35,'rgb(40, 60, 190)'],
                    [0.5,'rgb(70, 100, 245)'], [0.6,'rgb(90, 120, 245)'],
                    [0.7,'rgb(106, 137, 247)'],[1,'rgb(220, 220, 220)']],
                autocolorscale: false,
                reversescale: true,
                marker: {
                    line: {
                        color: 'rgb(180,180,180)',
                        width: 0.5
                    }
                },
                tick0: 0,
                zmin: 0,
                dtick: 1000,
                colorbar: {
                    autotic: false
                }
        }];

        var layout = {
            geo:{
                showframe: false,
                showcoastlines: false,
                projection:{
                    type: 'mercator'
                }
            }
        };
        Plotly.newPlot("myChart", data, layout, {showLink: false});
    });
}
</script>
    </body>
</html>