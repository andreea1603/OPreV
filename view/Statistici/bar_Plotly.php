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
var tag = document.createElement("id");
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