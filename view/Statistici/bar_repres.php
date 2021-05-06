<script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
    <script>
        function barChart() {
            var item = document.getElementById('myChart');
            item.remove();
            var tag = document.createElement("canvas");
            tag.setAttribute("id","myChart");
            console.log(tag);
            var element = document.getElementById('foo');
            element.appendChild(tag);

            var labels1 = <?php echo json_encode($labels); ?>;
            var datasets = <?php echo json_encode($datasets);  ?>;
            console.log(labels1);
            console.log(datasets);
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels1,
                    datasets: [{
                        label: 'bmi',
                        data: datasets,
                        barPercentage: 1.5,
                        maxBarThickness: 30,
                        minBarLength: 20,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                    }]
                },
            });

        }
    </script>