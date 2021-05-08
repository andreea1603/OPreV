
<?php 
include('model/functions_repres.php');

?>
 <div class="generare" id="foo">
                <canvas id="myChart"></canvas>
                <script> tableChart(); </script>
            </div>
<script>
       var item = document.getElementById('myChart');
            item.remove();
            var tag = document.createElement("canvas");
            tag.setAttribute("id","myChart");
            console.log(tag);
            var element = document.getElementById('foo');
            element.appendChild(tag);

            var labels1 = <?php echo json_encode($labels); ?>;
            var datasets = <?php echo json_encode($datasets);  ?>;
            var ctx = document.getElementById('myChart');


            var myChart = new Chart(ctx, {
                "type": "line",
                "data": {
                    "labels": labels1,
                    "datasets": [{
                        "label": "Dataset",
                        "data": datasets,
                        "fill": true,
                        "borderWidth": 10,
                        "borderColor": "rgb(75, 192, 192)",
                        "lineTension": 0
                    }]
                }
            });
            myChart.update();

            createPngLink('chart.png', 'Export PNG, ', chart);

</script>