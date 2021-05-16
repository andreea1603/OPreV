<!DOCTYPE html>
<?php
include('../../model/init.php');
include('../../model/db-connect.php');
include('../../getbyICWho.php');
include('functions1.php');
include('../../putInCsv1.php');
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
                    <form onsubmit="checkAllwho();" method=post>
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
                        <a href="formdat.csv" download="data.csv">
                            CSV
                        </a>
                    </div>
                    <div>
                        <a href="#" id="JPGDownload" onclick="prepHref(this)" download> JPG</a>
                        <img id="jpg-export" class="dispare"></img>
                    </div>
                    <div><a href="#">SVG</a></div>
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


<script>
    
    function linePlotly(){
        var item = document.getElementById('myChart');
        item.remove();
        var tag = document.createElement("div");
        tag.setAttribute("id","myChart");
        console.log(tag);
        var element = document.getElementById('moo');
        element.appendChild(tag);

        var names=<?php echo json_encode($labelswho); ?>;
        var values=<?php echo json_encode($datasetswho);  ?>;
        var trace1 = {
        x: names,
        y: values,
        type: 'scatter'
        };

        var layout = {
        autosize: false,
        width : 900, 
        height :600
        };

        var data = [trace1];


        Plotly.newPlot('myChart', data, layout);

}

function barPlotly(){

    var colors=[];
    for (let i = 0; i < 100; i++) {
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



    var names=<?php echo json_encode($labelswho); ?>;
    var values=<?php echo json_encode($datasetswho);  ?>;
    console.log(names);
    console.log(values);

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
        autosize: false,
        width : 900, 
        height :600, 
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

function mapChart() {
            var item = document.getElementById('myChart');
            item.remove();
            var tag = document.createElement("div");
            tag.setAttribute("id","myChart");
            console.log(tag);
            var element = document.getElementById('moo');
            element.appendChild(tag);
            var img_svg=d3.select('#jpg-export');

            d3.csv('resources/data.csv', function(err, rows) {
                function unpack(rows, key) {
                    return rows.map(function(row) {
                        return row[key];
                    });
                }
                console.log(unpack(rows, 'country_code'));
                var data = [{
            
                    type: 'choropleth',
                    locations: unpack(rows, 'country_code'),
                    z: unpack(rows, 'value'),
                    text: unpack(rows, 'country_name'),
                    colorscale: [
                        
                        [0, 'rgb(5, 10, 172)'],
                        [0.35, 'rgb(40, 60, 190)'],
                        [0.5, 'rgb(70, 100, 245)'],
                        [0.6, 'rgb(90, 120, 245)'],
                        [0.7, 'rgb(106, 137, 247)'],
                        [1, 'rgb(220, 220, 220)']
                    ],
                    autocolorscale: false,
                    reversescale: true,
                    marker: {

                        line: {
                            color: 'rgb(180,180,180)',
                            width: 0.5,
                            height : 800,
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
                    geo: {
                        showframe: false,
                        showcoastlines: false,
                        projection: {
                            type: 'mercator'
                        }
                    }
                };
                Plotly.newPlot("myChart", data, layout, {
                    showLink: false
                })
                                });
    }
</script>