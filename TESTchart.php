<!DOCTYPE html>

<?php

include('model/db-connect.php');
include_once 'Api/who_children/childrenObesity.php';

?>

<html>
<head>
<script src="https://code.jscharting.com/latest/jscharting.js"></script>
    <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js'></script>
</head>


<?php 

$db=$conn;
 // Instantiate blog post object
 $category = new childrenObesity($db);

 $category->year=2010;
 $result = $category->infoByFilter();
 
 $num= count($result);
 $labels=['sasd', 'sfd', 'fdsfds'];
$datasets=[3, 4, 5];
echo "buna ziua";

 $labels=[];
 $datasets=[];
 $labels=['sasd', 'sfd', 'fdsfds'];
 $datasets=[3, 4, 5];
for($i=0; $i< $num; $i++){
  //echo $result[$i]['country']."<br>";
  array_push($labels, $result[$i]['country']);
  array_push($datasets, $result[$i]['value']);

}


?>
<script>

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
var element = document.getElementById('foo');
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

<div class="generare" id="foo">
                <div id="myChart" width=240 height=240 style="background-color:#808080;">
                    <p></p>
                </div>
                <script>
                    barPlotly();
                </script>
</div>