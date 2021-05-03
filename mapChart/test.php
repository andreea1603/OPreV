<html lang="en">
  <head>
    <title>OPreV</title>
    <meta http-equiv="content-type" content="text-html; charset=utf-8" />
    <script src="https://code.jscharting.com/latest/jscharting.js"></script>
    <style type="text/css">
      /*CSS*/
    </style>
  </head>
  <body>
    <div id="chartDiv" style="max-width: 800px; height: 600px; margin: 0px auto;"></div>

    <script type="text/javascript">
      /*
Interactive choropleth map of the world showing access to clean water by country.
Learn how to:

  - Make a data driven choropleth map.
*/
      // JS
      var chart;
      var palette = [
        '#ff3d00',
        '#ff7213',
        '#ffa726',
        '#ffc041',
        '#ffd85b',
        '#fff176',
        '#eaee87',
        '#d6eb99',
        '#c1e8aa',
        '#6ec1bb',
        '#1b9acb'
      ].reverse();
      JSC.fetch('./resources/formdata5.csv')
        .then(function(response) {
          return response.text();
        })
        .then(function(text) {
          var mapData = JSC.csv2Json(text);
          chart = renderMap(mapData);
          console.log(mapData);
        });
      function renderMap(data) {
        var points = JSC.nest()
          .key('country_code')
          .pointRollup(function(key, val) {
            let values = val[0];
            return {
              map: values.country_code,
              z: values.value
            };
          })
          .points(data);

        return JSC.chart('chartDiv', {
          type: 'map solid',
          title: {
            label: {
              text: 'Obese Population',
              style_fontSize: 14
            },
            position: 'center'
          },
          mapping_projection: {
            type: 'lambertConformalConic',
            parallels: [10, 9]
          },
          defaultPoint: {
            tooltip: '%name <b>{%zValue:n1}%</b>',
            outline: { color: 'white', width: 0.5 },
            states_hover: { outline: { color: '#7a7a7a' } },
            focusGlow_width: 2
          },
          legend_position: 'bottom',

          palette: {
            pointValue: p => p.options('z'),

            colors: palette,
            colorBar: {
              width: 8,
              axis: {
                crosshair: {
                  label_text: '{%value:n1}%',
                  outline_width: 0
                },
                defaultTick_label: { text: '%value%' }
              }
            }
          },
          series: [{ points: points }],
          toolbar_items: {
            zoom_visible: false
          }
        });
      }
    </script>
  </body>
</html>
