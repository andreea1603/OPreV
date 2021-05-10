<?php 
include('D:\Xamp\htdocs\PROIECT_TW\OPreV2\OPreV\model\functions_repres.php');
?>


<html>
<script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
<div id="chart" width="800px"></div>

<script>
var cal1=<?php echo json_encode($labels); ?>;
var trace1 = {
  x: cal1,
  y: [10, 15, 13, 17],
  type: 'scatter'
};



var data = [trace1];

Plotly.newPlot('chart', data);
</script>