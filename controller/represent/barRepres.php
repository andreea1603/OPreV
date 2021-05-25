<?php 

?>

<script>


function barPlotly(){

var colors=[];
for (let i = 0; i < 100; i++) {
    colors.push('rgba(255, 99, 132, 0.5)');
    colors.push('rgba(255, 159, 64, 0.5)');
    colors.push('rgba(255, 205, 86, 0.5)');
    colors.push('rgba(75, 192, 192, 0.5)');
    colors.push('rgba(54, 162, 235, 0.5)');
    colors.push('rgba(201, 203, 207, 0.5)');
    colors.push('rgba(54, 162, 235,0.5)');
}

var img_jpg = d3.select('#jpg-export');
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

Plotly.newPlot('myChart', data, layout).then(
    function(gd)
     {
      Plotly.toImage(gd,{height:300,width:300})
         .then(
             function(url)
         {
             img_jpg.attr("src", url);
         }
         )
    });
}
</script>