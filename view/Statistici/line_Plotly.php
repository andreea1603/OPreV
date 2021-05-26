
<script>
function linePlotly(){

  var img_png = d3.select('#png-export');
        var img_svg = d3.select('#svg-export');

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

Plotly.newPlot('myChart', data).then(
    function(gd)
     {       
        Plotly.toImage(gd,{format:'png',height:900,width:900}).then(
             function(url)
         {
             img_png.attr("src", url);
         }
         ).then(
             
         Plotly.toImage(gd,{format:'svg',height:900,width:900}).then(
             function(url)
         {
             img_svg.attr("src", url);
         }
         )
        
         )
    });
}
</script>