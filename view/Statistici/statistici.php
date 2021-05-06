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
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../styles/statistici.css">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="style.css">

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
                            <input type="checkbox" id="at" value="Austria" name="checkCountry[]">
                            <label>Austria</label>
                        </div>
                        <div>
                            <input type="checkbox" id="be" value="Belgium" name="checkCountry[]">
                            <label>Belgium</label>
                        </div>
                        <div>
                            <input type="checkbox" id="bg" value="Bulgaria" name="checkCountry[]">
                            <label>Bulgaria</label>
                        </div>
                        <div>
                            <input type="checkbox" id="hr" value="Croatia" name="checkCountry[]">
                            <label>Croatia</label>
                        </div>
                        <div>
                            <input type="checkbox" id="cy" value="Cyprus" name="checkCountry[]">
                            <label>Cyprus</label>
                        </div>
                        <div>
                            <input type="checkbox" id="cz" value="Czechia" name="checkCountry[]">
                            <label>Czechia</label>
                        </div>
                        <div>
                            <input type="checkbox" id="dk" value="Denmark" name="checkCountry[]">
                            <label>Denmark</label>
                        </div>
                        <div>
                            <input type="checkbox" id="ee" value="Estonia" name="checkCountry[]">
                            <label>Estonia</label>
                        </div>
                        <div>
                            <input type="checkbox" id="fi" value="Finland" name="checkCountry[]">
                            <label>Finland</label>
                        </div>
                        <div>
                            <input type="checkbox" id="fr" value="France" name="checkCountry[]">
                            <label>France</label>
                        </div>
                        <div>
                            <input type="checkbox" id="de" value="Germany" name="checkCountry[]">
                            <label for="horns">Germany</label>
                        </div>
                        <div>
                            <input type="checkbox" id="el" value="Greece" name="checkCountry[]">
                            <label>Greece</label>
                        </div>
                        <div>
                            <input type="checkbox" id="hu" value="Hungary" name="checkCountry[]">
                            <label>Hungary</label>
                        </div>
                        <div>
                            <input type="checkbox" id="ie" value="Ireland" name="checkCountry[]">
                            <label>Ireland</label>
                        </div>
                        <div>
                            <input type="checkbox" id="is" value="Iceland" name="checkCountry[]">
                            <label>Iceland</label>
                        </div>
                        <div>
                            <input type="checkbox" id="it" value="Italy" name="checkCountry[]">
                            <label>Italy</label>
                        </div>
                        <div>
                            <input type="checkbox" id="lt" value="Lithuania" name="checkCountry[]">
                            <label>Lithuania</label>
                        </div>
                        <div>
                            <input type="checkbox" id="lu" value="Luxembourg" name="checkCountry[]">
                            <label>Luxembourg</label>
                        </div>
                        <div>
                            <input type="checkbox" id="lv" value="Latvia" name="checkCountry[]">
                            <label>Latvia</label>
                        </div>
                        <div>
                            <input type="checkbox" id="mk" value="North Macedonia" name="checkCountry[]">
                            <label>North Macedonia</label>
                        </div>
                        <div>
                            <input type="checkbox" id="mt" value="Malta" name="checkCountry[]">
                            <label>Malta</label>
                        </div>
                        <div>
                            <input type="checkbox" id="nl" value="Netherlands" name="checkCountry[]">
                            <label>Netherlands</label>
                        </div>
                        <div>
                            <input type="checkbox" id="no" value="Norway" name="checkCountry[]">
                            <label">Norway</label>
                        </div>
                        <div>
                            <input type="checkbox" id="pl" value="Poland" name="checkCountry[]">
                            <label>Poland</label>
                        </div>
                        <div>
                            <input type="checkbox" id="pt" value="Portugal" name="checkCountry[]">
                            <label>Portugal</label>
                        </div>
                        <div>
                            <input type="checkbox" id="ro" value="Romania" name="checkCountry[]">
                            <label>Romania</label>
                        </div>
                        <div>
                            <input type="checkbox" id="rs" value="Serbia" name="checkCountry[]">
                            <label>Serbia</label>
                        </div>
                        <div>
                            <div>
                                <input type="checkbox" id="es" value="Spain" name="checkCountry[]">
                                <label>Spain</label>
                            </div>
                            <input type="checkbox" id="se" value="Sweden" name="checkCountry[]">
                            <label>Sweden</label>
                        </div>
                        <div>
                            <input type="checkbox" id="si" value="Slovania" name="checkCountry[]">
                            <label>Slovania</label>
                        </div>
                        <div>
                            <input type="checkbox" id="sk" value="Slovakia" name="checkCountry[]">
                            <label>Slovakia</label>
                        </div>
                        <div>
                            <input type="checkbox" id="tr" value="Turkey" name="checkCountry[]">
                            <label>Turkey</label>
                        </div>
                        <div>
                            <input type="checkbox" id="uk" value="United Kingdom" name="checkCountry[]">
                            <label>United Kingdom</label>
                        </div>
                    </div>
                    <input type="button" onclick="selectAll()" value="Select All">

                    <h3>BMI</h3>
                    <div class="scroll">
                        <div>
                            <input type="checkbox" id="pre-obese" name="check1[]" value="pre-obese" onclick="onlyOneBmi(this)">
                            <label for="bmi">Preobezitate</label>
                        </div>
                        <div>
                            <input type="checkbox" id="obese" name="check1[]" value="obese" onclick="onlyOneBmi(this)">
                            <label for="bmi">Obezitate</label>
                        </div>
                        <div>
                            <input type="checkbox" id="overweight" name="check1[]" value="overweight" onclick="onlyOneBmi(this)">
                            <label for="bmi">Supraponderali</label>
                        </div>
                    </div>
                    <h3>Year</h3>
                    <div class="scroll">
                        <div>
                            <input type="checkbox" id="first" name="check2[]" value="2008" onclick="onlyOneYear(this)">
                            <label for="year">2008</label>
                        </div>
                        <div>
                            <input type="checkbox" id="second" name="check2[]" value="2014" onclick="onlyOneYear(this)">
                            <label for="year">2014</label>
                        </div>
                        <div>
                            <input type="checkbox" id="third" name="check2[]" value="2017" onclick="onlyOneYear(this)">
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
                <canvas id="myChart"></canvas>
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
  
   
</body>

</html>