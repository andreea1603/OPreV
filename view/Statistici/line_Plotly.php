
<script>
function linePlotly(){


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
      type: 'scatter'
    };



var data = [trace1];

Plotly.newPlot('myChart', data);
}
</script>