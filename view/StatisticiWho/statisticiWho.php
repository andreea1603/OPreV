<!DOCTYPE html>
<?php
include('../../model/init.php');
include('../../model/functions.php');
include('../../model/db-connect.php');
include('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\controller\statistici-modelwho.php');
include('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\getDataByFilterType.php');

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../styles/statistici.css">
        <link rel="stylesheet" href="../../styles/style.css">
        <script type="text/javascript" src="functions.js"></script>
        <script src="../Statistici/functions.js"></script>

        <link rel="shortcut icon" href="../../pictures/vector-creator.ico">
        
        <title>OPreV</title>
    </head>
    <body>
            <section class="head">
                <ul>
                    <li><a href="../Statistici/statistici.php">Statistici</a></li>
                    <li><a href="../Evenimente/events.php">Evenimente</a></li>
                    <li><a href="../AboutUs/aboutus.php">Despre noi</a></li>
                    <li><a href=<?php if(!isset($_SESSION['conectat'])) echo "../login/login.php"; else echo "../Admin/admin.php";?>>Contul meu</a></li>
                </ul>
            </section>
            <section class="nested">
                <div class="leftmenu">
                    <h2>Filtre</h2>
                    <div class="filter">
                        <form action="" onsubmit="checkAllwho();" method=post>
                            <h3>Indicator code</h3>
                            <select  id="indicatorCode" onclick="selectIndicator()">
                                <option value="indicatorCode">Indicator code</option>
                                <option value="indicatorCode1" name="indicatorCode[]">Prevalence of obesity among children and adolescents</option>
                                <option value="indicatorCode2" name="indicatorCode[]">Obesity prevalence in non-pregnant women aged 15-49 years</option>
                                <option value="indicatorCode3" name="indicatorCode[]">Prevalence of obesity among adults(crude estimate)</option>
                                <option value="indicatorCode4" name="indicatorCode[]">Prevalence of obesity among adults(age-standardized estimate)</option>
                            </select>
                            <h3>Spatial Dimension</h3>
                            <select  id="dimension" onclick="select()">
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
                    <div class="generare">
                    <canvas id="myChart" class="map"></canvas>

                    </div>
                    <div class="butoane">
                        <div><a href="#">CSV</a></div>
                        <div><a href="#">JPG</a></div>
                        <div><a href="#">PDF</a></div>
                    </div>
                </div>
                <div class="right-part">
                    <a href="../Statistici/statistici.php"><img id="logo" src="../../pictures/eurostatLogo.png" alt=""></a>
                </div>
                <?php 
                echo printSession();

                print_r(checkMare("checkCountry"));
                print_r(checkMare("sexes"));
                print_r(checkMare("ages"));
                print_r(checkMare("areas"));
                print_r(checkMare("years"));
                print_r(checkMare("indicatorCode"));
                echo "<br>";
                echo "<br>";

                echo "<br>";
                echo "sunt aici";
                echo "<br>";
                echo "<br>";

                getDataByFilter();
                ?>
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

    </body>
</html>