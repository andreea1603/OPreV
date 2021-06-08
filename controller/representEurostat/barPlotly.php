<script>
    function barPlotly() {

        var colors = [];
        for (let i = 0; i < 9; i++) {
            colors.push('rgba(255, 99, 132, 0.2)');
            colors.push('rgba(255, 159, 64, 0.2)');
            colors.push('rgba(255, 205, 86, 0.2)');
            colors.push('rgba(75, 192, 192, 0.2)');
            colors.push('rgba(54, 162, 235, 0.2)');
            colors.push('rgba(201, 203, 207, 0.2)');
            colors.push('rgba(54, 162, 235, 0.2)');
        }
        var img_png = d3.select('#png-export');
        var img_svg = d3.select('#svg-export');

        var item = document.getElementById('myChart');
        item.remove();
        var tag = document.createElement("div");
        tag.setAttribute("id", "myChart");
        console.log(tag);
        var element = document.getElementById('foo');
        element.appendChild(tag);



        var names = <?php echo json_encode($labels); ?>;
        var values = <?php echo json_encode($datasets);  ?>;

        var trace1 = {
            x: names,
            y: values,
            type: 'bar',
            marker: {
                color: colors
            },
            width: 0.2
        };

        var data = [trace1];

        var layout = {
            font: {
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
            bargap: 0.2
        };

        Plotly.newPlot('myChart', data, layout).then(
            function(gd) {

                Plotly.toImage(gd, {
                    format: 'png',
                    height: 900,
                    width: 900
                }).then(
                    function(url) {
                        img_png.attr("src", url);
                    }
                ).then(

                    Plotly.toImage(gd, {
                        format: 'svg',
                        height: 900,
                        width: 900
                    }).then(
                        function(url) {
                            img_svg.attr("src", url);
                        }
                    )

                )


            });




    }
</script>