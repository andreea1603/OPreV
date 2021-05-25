<script>
    
    function linePlotly(){
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