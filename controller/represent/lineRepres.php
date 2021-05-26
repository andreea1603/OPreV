<script>
    
    function linePlotly(){
        var img_png = d3.select('#jpg-export');
var img_svg = d3.select('#svg-export');

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


        Plotly.newPlot('myChart', data, layout).then(
    function(gd)
     {
        Plotly.toImage(gd,{format:'png',height:900,width:900}).then(
             function(url)
         {
             img_jpg.attr("src", url);
         }
         )
    });

}

</script>