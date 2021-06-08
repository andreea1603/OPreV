<script>
    function mapChart() {


        var img_png = d3.select('#png-export');
        var img_svg = d3.select('#svg-export');

        var item = document.getElementById('myChart');
        item.remove();
        var tag = document.createElement("div");
        tag.setAttribute("id", "myChart");
        console.log(tag);
        var element = document.getElementById('foo');
        element.appendChild(tag);


        d3.csv('resources/data.csv', function(err, rows) {
            function unpack(rows, key) {
                return rows.map(function(row) {
                    return row[key];
                });
            }
            console.log(unpack(rows, 'country_code'));
            var data = [{

                type: 'choropleth',
                locations: unpack(rows, 'country_code'),
                z: unpack(rows, 'value'),
                text: unpack(rows, 'country_name'),
                colorscale: [

                    [0, 'rgb(5, 10, 172)'],
                    [0.35, 'rgb(40, 60, 190)'],
                    [0.5, 'rgb(70, 100, 245)'],
                    [0.6, 'rgb(90, 120, 245)'],
                    [0.7, 'rgb(106, 137, 247)'],
                    [1, 'rgb(220, 220, 220)']
                ],
                autocolorscale: false,
                reversescale: true,
                marker: {

                    line: {
                        color: 'rgb(180,180,180)',
                        width: 0.5,
                        height: 800,
                    }
                },
                tick0: 0,
                zmin: 0,
                dtick: 1000,
                colorbar: {
                    autotic: false
                }
            }];

            var layout = {
                geo: {
                    showframe: false,
                    showcoastlines: false,
                    projection: {
                        type: 'mercator'
                    }
                }
            };
            var config = {
                responsive: true
            };

            Plotly.newPlot("myChart", data, layout, config).then(
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


                })
        });

    }
</script>