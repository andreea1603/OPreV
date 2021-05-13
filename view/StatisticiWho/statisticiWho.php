<!DOCTYPE html>
<?php
include('../../model/init.php');
include('../../model/functions.php');
include('../../model/db-connect.php');
include('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\controller\statistici-modelwho.php');
include('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\getDataByFilterType.php');
include('functions1.php');
include('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\view\Statistici\bar_Plotly.php');
include('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\view\Statistici\line_Plotly.php');
include('../Statistici/map_repres.php');
include('../../putInCsv1.php');

//include('../../controller/statistici-model.php');
//include('../../getDataByFilterType.php');

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
                    <li><a href=<?php if(!isset($_SESSION['conectat'])) echo "../login/login.php"; else echo "../Admin/admin.php";?>>Contul meu</a></li>
                </ul>
            </section>
            <section class="nested">
                <div class="leftmenu">
                    <h2>Filtre</h2>
                    <div class="filter">
                        <form action="" onsubmit="checkAllwho();" method=post>
                            <h3>Indicator code</h3>
                            <select  id="indicatorCode" name="indicatorCode[]" onclick="selectIndicator()">
                                <option value="indicatorCode"  >Indicator code</option>
                                <option value="indicatorCode1" >Prevalence of obesity among children and adolescents</option>
                                <option value="indicatorCode2" >Obesity prevalence in non-pregnant women aged 15-49 years</option>
                                <option value="indicatorCode3" >Prevalence of obesity among adults(crude estimate)</option>
                                <option value="indicatorCode4" >Prevalence of obesity among adults(age-standardized estimate)</option>
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
                <div class="generare" id="moo">
                    <div id="myChart" width=240 height=240 style="background-color:#808080;">
                        <p></p>
                    </div>
                </div>

                <?php 
                $result=getDataByFilter();
                $labels= $result[0];
                $datasets= $result[1];
                ?>
            <div class="statistica">
                <div class="btn-group">
                    <button onclick="barPlotly()">Bar</button>
                    <button onclick="linePlotly()">Line</button>
                    <button onclick="mapChart()">Map</button>

                </div>
              
                <div class="butoane">
                    <div>
                        <a href="formdat.csv" download="data.csv">
                            CSV
                        </a>
                    </div>

                    <div>
                        <a href="#" id="JPGDownload" onclick="prepHref(this)" download> JPG</a>
                    </div>
                    <img id="jpg-export" class="dispare"></img>
                    <div><a href="#">SVG</a></div>
                </div>
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


<script>
            function linePlotly(){


var item = document.getElementById('myChart');
item.remove();
var tag = document.createElement("div");
tag.setAttribute("id","myChart");
console.log(tag);
var element = document.getElementById('moo');
element.appendChild(tag);

var names=<?php echo json_encode($labels); ?>;
var values=<?php echo json_encode($datasets);  ?>;
var trace1 = {
  x: names,
  y: values,
  type: 'scatter'
};



var data = [trace1];

Plotly.newPlot('myChart', data);

}

function barPlotly(){

var colors=[];
      for (let i = 0; i < 9; i++) {
          colors.push('rgba(255, 99, 132, 0.2)');
          colors.push('rgba(255, 159, 64, 0.2)');
          colors.push('rgba(255, 205, 86, 0.2)');
          colors.push('rgba(75, 192, 192, 0.2)');
          colors.push('rgba(54, 162, 235, 0.2)');
          colors.push('rgba(201, 203, 207, 0.2)');
          colors.push('rgba(54, 162, 235, 0.2)');
}


var item = document.getElementById('myChart');
item.remove();
var tag = document.createElement("div");
tag.setAttribute("id","myChart");
console.log(tag);
var element = document.getElementById('moo');
element.appendChild(tag);



var names=<?php echo json_encode($labels); ?>;
var values=<?php echo json_encode($datasets);  ?>;

var trace1 = {
  x: names,
  y: values,
  type: 'bar',
  marker: {
    color: colors
  },
  width : 0.2
};

var data = [trace1];

var layout = {
  font:{
    family: 'Raleway, sans-serif'
  },
  showlegend: false,
  xaxis: {
    tickangle: -45
  },
  yaxis: {
    zeroline: false,
    gridwidth: 2
  },
  bargap :0.2
};

Plotly.newPlot('myChart', data, layout);

}

</script>