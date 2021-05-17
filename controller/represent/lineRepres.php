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

</script>