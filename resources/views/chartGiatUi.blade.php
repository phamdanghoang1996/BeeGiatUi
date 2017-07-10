<!doctype html>
<html>

<head>
    <style>
    canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    .chart-container {
        width: 500px;
        margin-left: 40px;
        margin-right: 40px;
        margin-bottom: 40px;
    }
    .container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }
    </style>
</head>

<body>
    <div class="container">
    </div>
    <script>
        function createConfig(pointStyle) {
            return {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [{
                        label: "My First dataset",
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data: [10, 23, 5, 99, 67, 43, 0],
                        fill: false,
                        pointRadius: 10,
                        pointHoverRadius: 15,
                        showLine: false // no line shown
                    }]
                },
                options: {
                    responsive: true,
                    title:{
                        display:true,
                        text:'Point Style: ' + pointStyle
                    },
                    legend: {
                        display: false
                    },
                    elements: {
                        point: {
                            pointStyle: pointStyle
                        }
                    }
                }
            };
        }

        window.onload = function() {
            var container = document.querySelector('.container');
            [
                'star'
            ].forEach(function(pointStyle) {
                var div = document.createElement('div');
                div.classList.add('chart-container');

                var canvas = document.createElement('canvas');
                div.appendChild(canvas);
                container.appendChild(div);

                var ctx = canvas.getContext('2d');
                var config = createConfig(pointStyle);
                new Chart(ctx, config);
            });
        };
    </script>
</body>

</html>
