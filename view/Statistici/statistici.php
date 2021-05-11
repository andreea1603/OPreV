<!DOCTYPE html>
<?php
include('../../model/init.php');
include('../../model/functions.php');
include('../../model/db-connect.php');
include('../../model/functions_repres.php');

include('bar_repres.php');
include('line_repres.php');
include('table_repres.php');
include('map_repres.php');
include('../../putInCsv1.php');

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../styles/statistici.css">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="statistici.css">


    <link rel="shortcut icon" href="../../pictures/vector-creator.ico">
    <script src="https://code.jscharting.com/latest/jscharting.js"></script>
    <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js'></script>
    <script type="text/javascript" src="functions.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <title>OPreV</title>

</head>

<body>
    <section class="head">
        <ul>
            <li><a href="../Statistici/statistici.php">Statistici</a></li>
            <li><a href="../Evenimente/events.php">Evenimente</a></li>
            <li><a href="../AboutUs/aboutus.php">Despre noi</a></li>
            <li><a href=<?php if (isset($_SESSION['conectat'])) echo "../login/login.php";
                        else echo "../Admin/admin.php"; ?>>Contul meu</a></li>
        </ul>
    </section>
    <section class="nested">
        <div class="leftmenu">
            <h2>Filtre</h2>
            <div class="filter">
                <form action="" onsubmit="checkAll();" method=post>
                    <h3>Country</h3>
                    <div class="scroll" id="first-scroll">
                        <div>
                            <input type="checkbox" id="at" value="Austria" name="checkCountry[]"  checked  <?php if (isset($_POST['checkCountry']))if (in_array("Austria", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Austria</label>
                        </div>
                        <div>
                            <input type="checkbox" id="be" value="Belgium" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Belgium", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Belgium</label>
                        </div>
                        <div>
                            <input type="checkbox" id="bg" value="Bulgaria" name="checkCountry[]" <?php if (isset($_POST['checkCountry']))if (in_array("Bulgaria", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Bulgaria</label>
                        </div>
                        <div>
                            <input type="checkbox" id="hr" value="Croatia" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Croatia", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Croatia</label>
                        </div>
                        <div>
                            <input type="checkbox" id="cy" value="Cyprus" name="checkCountry[]" <?php if (isset($_POST['checkCountry']))if (in_array("Cyprus", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Cyprus</label>
                        </div>
                        <div>
                            <input type="checkbox" id="cz" value="Czechia" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Czechia", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Czechia</label>
                        </div>
                        <div>
                            <input type="checkbox" id="dk" value="Denmark" name="checkCountry[]"  <?php if (isset($_POST['checkCountry'])) if (in_array("Denmark", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Denmark</label>
                        </div>
                        <div>
                            <input type="checkbox" id="ee" value="Estonia" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Estonia", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Estonia</label>
                        </div>
                        <div>
                            <input type="checkbox" id="fi" value="Finland" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Finland", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Finland</label>
                        </div>
                        <div>
                            <input type="checkbox" id="fr" value="France" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("France", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>France</label>
                        </div>
                        <div>
                            <input type="checkbox" id="de" value="Germany" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Germany", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label for="horns">Germany</label>
                        </div>
                        <div>
                            <input type="checkbox" id="el" value="Greece" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Greece", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Greece</label>
                        </div>
                        <div>
                            <input type="checkbox" id="hu" value="Hungary" name="checkCountry[] " <?php if (isset($_POST['checkCountry']))if (in_array("Hungary", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Hungary</label>
                        </div>
                        <div>
                            <input type="checkbox" id="ie" value="Ireland" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Ireland", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Ireland</label>
                        </div>
                        <div>
                            <input type="checkbox" id="is" value="Iceland" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Iceland", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Iceland</label>
                        </div>
                        <div>
                            <input type="checkbox" id="it" value="Italy" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Italy", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Italy</label>
                        </div>
                        <div>
                            <input type="checkbox" id="lt" value="Lithuania" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Lithuania", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Lithuania</label>
                        </div>
                        <div>
                            <input type="checkbox" id="lu" value="Luxembourg" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Luxembourg", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Luxembourg</label>
                        </div>
                        <div>
                            <input type="checkbox" id="lv" value="Latvia" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Latvia", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Latvia</label>
                        </div>
                        <div>
                            <input type="checkbox" id="mk" value="North Macedonia" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("North Macedonia", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>North Macedonia</label>
                        </div>
                        <div>
                            <input type="checkbox" id="mt" value="Malta" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Malta", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Malta</label>
                        </div>
                        <div>
                            <input type="checkbox" id="nl" value="Netherlands" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Netherlands", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Netherlands</label>
                        </div>
                        <div>
                            <input type="checkbox" id="no" value="Norway" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Norway", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label">Norway</label>
                        </div>
                        <div>
                            <input type="checkbox" id="pl" value="Poland" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Poland", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Poland</label>
                        </div>
                        <div>
                            <input type="checkbox" id="pt" value="Portugal" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Portugal", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Portugal</label>
                        </div>
                        <div>
                            <input type="checkbox" id="ro" value="Romania" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Romania", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Romania</label>
                        </div>
                        <div>
                            <input type="checkbox" id="rs" value="Serbia" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Serbia", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Serbia</label>
                        </div>
                        <div>
                            <div>
                                <input type="checkbox" id="es" value="Spain" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Spania", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                                <label>Spain</label>
                            </div>
                            <input type="checkbox" id="se" value="Sweden" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Sweden", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Sweden</label>
                        </div>
                        <div>
                            <input type="checkbox" id="si" value="Slovania" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Slovania", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Slovania</label>
                        </div>
                        <div>
                            <input type="checkbox" id="sk" value="Slovakia" name="checkCountry[]"  <?php if (isset($_POST['checkCountry']))if (in_array("Slovakia", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Slovakia</label>
                        </div>
                        <div>
                            <input type="checkbox" id="tr" value="Turkey" name="checkCountry[]" <?php if (isset($_POST['checkCountry']))if (in_array("Turkey", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>Turkey</label>
                        </div>
                        <div>
                            <input type="checkbox" id="uk" value="United Kingdom" name="checkCountry[]"  <?php if (isset($_POST['checkCountry'])) if (in_array("United Kingdom", $_POST['checkCountry'])) echo "checked='checked'"; ?>>
                            <label>United Kingdom</label>
                        </div>
                    </div>
                    <input type="button" onclick="selectAll()" value="Select All">

                    <h3>BMI</h3>
                    <div class="scroll">
                        <div>
                            <input type="checkbox" checked id="pre-obese" name="check1[]" value="pre-obese" onclick="onlyOneBmi(this)"  <?php if (isset($_POST['check1']))if (in_array("pre-obese", $_POST['check1'])) echo "checked='checked'"; ?>>
                            <label for="bmi">Preobezitate</label>
                        </div>
                        <div>
                            <input type="checkbox" id="obese" name="check1[]" value="obese" onclick="onlyOneBmi(this)" <?php if (isset($_POST['check1']))if (in_array("obese", $_POST['check1'])) echo "checked='checked'"; ?>>
                            <label for="bmi">Obezitate</label>
                        </div>
                        <div>
                            <input type="checkbox" id="overweight" name="check1[]" value="overweight" onclick="onlyOneBmi(this)"  <?php if (isset($_POST['check1']))if (in_array("overweight", $_POST['check1'])) echo "checked='checked'"; ?>>
                            <label for="bmi">Supraponderali</label>
                        </div>
                    </div>
                    <h3>Year</h3>
                    <div class="scroll">
                        <div>
                            <input type="checkbox" checked id="first" name="check2[]" value="2008" onclick="onlyOneYear(this)" <?php if (isset($_POST['check2']))if (in_array("2008", $_POST['check2'])) echo "checked='checked'"; ?>>
                            <label for="year">2008</label>
                        </div>
                        <div>
                            <input type="checkbox" id="second" name="check2[]" value="2014" onclick="onlyOneYear(this)"  <?php if (isset($_POST['check2']))if (in_array("2014", $_POST['check2'])) echo "checked='checked'"; ?>>
                            <label for="year">2014</label>
                        </div>
                        <div>
                            <input type="checkbox" id="third" name="check2[]" value="2017" onclick="onlyOneYear(this)"  <?php if (isset($_POST['check2']))if (in_array("2017", $_POST['check2'])) echo "checked='checked'"; ?>>
                            <label for="year">2017</label>
                        </div>
                    </div>
                    <input type="submit" value="Submit" name="submit">
                </form>
            </div>
        </div>
        <div class="statistica">
            <div class="btn-group">
                <button onclick="tableChart()">Table </button>
                <button onclick="barChart()">Bar</button>
                <button onclick="lineChart()">Line</button>
                <button onclick="mapChart()">Map</button>
            </div>
            <div class="generare" id="foo">
                <canvas id="myChart"  width=240 height=240 style="background-color:#808080;"> <p></p></canvas>
                <script> tableChart(); </script>
            </div>
            <?php //csvDownload($labels, $year, $bmi, $datasets); 
        
            getCsv($labels, $year, $bmi, $datasets); ?>
            <div class="butoane">
                <div>
                    <a href="formdat.csv" download="data.csv">
                        CSV
                    </a></div>

                <div>
       <a href="#" id="JPGDownload" onclick="prepHref(this)" download>     JPG</a></div>


<img id="jpg-export" class="dispare" ></img>


                <div><a href="#">SVG</a></div>
            </div>
        </div>
        <div class="right-part">
            <a href="../StatisticiWho/statisticiWho.php"><img id="logo" src="../../pictures/whoLogo.jpg" alt=""></a>
        </div>
    </section>



    <div id="chart" width="800px"></div>

<script>
var cal1=<?php echo json_encode($labels); ?>;
var ls=<?php echo json_encode($datasets);  ?>;
var trace1 = {
  x: cal1,
  y: ls,
  type: 'scatter'
};



var data = [trace1];

Plotly.newPlot('chart', data);
</script>










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
</body>
</html>