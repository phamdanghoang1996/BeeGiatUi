<!doctype html>
<html>

<head>
    <title>Pie Chart</title>
    <script src="{{asset('js/chartGiatUi.js')}}"></script>
    <script src="{{asset('js/utilChartGiatUi.js')}}"></script>
</head>

<body>
    <div id="canvas-holder" style="width:40%">
        <canvas id="chart-area" />
    </div>
    <script>

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    {{$tiengiat}},
                    {{$tiensay}}
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange
                ],
                label: 'Đây là gì?'
            }],
            labels: [
                "Tiên giặt",
                "Tiên ủi",
            ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);
    };

    document.getElementById('randomizeData').addEventListener('click', function() {
        config.data.datasets.forEach(function(dataset) {
            dataset.data = dataset.data.map(function() {
                return randomScalingFactor();
            });
        });

        window.myPie.update();
    });

    var colorNames = Object.keys(window.chartColors);
    </script>
</body>

</html>
