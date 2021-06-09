<!DOCTYPE html>
<?php
include('../../model/db-connect.php');
include('../../model/getbyICWho.php');
include('../../model/setSession.php');
include('../../controller/changeFiltersDynamic.php');
include('../../controller/represent/barRepres.php');
include('../../controller/represent/lineRepres.php');
include('../../controller/represent/mapRepres.php');
include('../../controller/downloadCsv-Svg.php');

$dir = __DIR__;
$path = substr($dir, 0, -19) . '\model\putInCsv1.php';

include($path);
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../styles/statistici.css">
    <link rel="stylesheet" href="../../styles/style.css">
    <script src="../Statistici/functions.js"></script>
    <script src="https://code.jscharting.com/latest/jscharting.js"></script>
    <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js'></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="shortcut icon" href="../../pictures/vector-creator.ico">

    <title>OPreV</title>
</head>

<body>
    <section class="head">
        <ul>
            <li><a href="../Statistici/statistici.php">Statistici</a></li>
            <li><a href="../Evenimente/events.php">Evenimente</a></li>
            <li><a href="../AboutUs/aboutus.php">Despre noi</a></li>
            <li><a href=<?php if (!isset($_SESSION['conectat'])) echo "../login/login.php";
                        else echo "../Admin/admin.php"; ?>>Contul meu</a></li>
        </ul>
    </section>
    <section class="nested">
        <div class="leftmenu">
            <h2>Filtre</h2>
            <div class="filter">
                <form onsubmit="checkAllwho();" method=post>
                    <h3>Indicator code</h3>
                    <select id="indicatorCode" name="indicatorCode[]" onclick="selectIndicator()">
                        <option value="indicatorCode">Indicator code</option>
                        <option value="indicatorCode1">Prevalence of obesity among children and adolescents</option>
                        <option value="indicatorCode2">Obesity prevalence in non-pregnant women aged 15-49 years</option>
                        <option value="indicatorCode3">Prevalence of obesity among adults(crude estimate)</option>
                        <option value="indicatorCode4">Prevalence of obesity among adults(age-standardized estimate)</option>
                    </select>
                    <h3>Spatial Dimension</h3>
                    <select id="dimension" onclick="select()">
                        <option value="dimension">Spatial Dimension</option>
                        <option value="dimension1">Country</option>
                        <option value="dimension2">Region</option>
                        <option value="dimension3">World Bank Income</option>
                    </select>
                    <div id="foo">
                        <div id=filtreTari>

                        </div>
                    </div>
                    <div id="goo">
                        <div id="filtreNormale">

                        </div>
                    </div>
                    <input type="submit" value="Submit" name="submit">
                </form>
            </div>
        </div>

        <div class="statistica">
            <div class="btn-group">
                <button onclick="barPlotly()">Bar</button>
                <button onclick="linePlotly()">Line</button>
                <button onclick="mapChart()">Map</button>
            </div>

            <div class="generare" id="moo">
                <div id="myChart">
                    <p></p>
                </div>
            </div>

            <div class="butoane">
                <div>
                    <a href="resources/formdat.csv" download="resources/formdat.csv">
                        CSV
                    </a>
                </div>
                <div id="imagine">
                    <img id="png-export" class="dispare">
                    <a href="#" onclick="prepHref(this, 1)" download> PNG
                    </a></img>
                </div>

                <div id="imagine1">
                    <img id="svg-export" class="dispare">
                    <a href="#" onclick="prepHref(this, 2)" download>SVG
                    </a>
                    </img>
                </div>
            </div>
        </div>
        </div>


        </div>

        </div>
        </div>
        <div class="right-part">
            <a href="../Statistici/statistici.php"><img id="logo" src="../../pictures/eurostatLogo.png" alt=""></a>
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