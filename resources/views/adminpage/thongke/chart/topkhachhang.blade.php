<!doctype html>
<html>

<head>
    <title>Stacked Bar Chart with Groups</title>
    <script src="{{asset('js/chartGiatUi.js')}}"></script>
    <script src="{{asset('js/utilChartGiatUi.js')}}"></script>
    <style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
</head>

<body>
    <div style="width: 100%">
        <canvas id="canvas"></canvas>
    </div>
    <script>
        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: 'Sấy',
                backgroundColor: window.chartColors.red,
                stack: 'Stack 0',
                data: [
                    1,
                    1,
                    1,
                    1,
                    1,
                    1,
                    1
                ]
            },{
                label: 'Giặt',
                backgroundColor: window.chartColors.green,
                stack: 'Stack 1',
                data: [
                    3,
                    3,
                    3,
                    3,
                    3,
                    3,
                    3
                ]
            }]

        };
        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    title:{
                        display:true,
                        text:"TOP 10 KHÁCH HÀNG GIẶT, SẤY NHIỀU NHẤT"
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    }
                }
            });
        };

        document.getElementById('randomizeData').addEventListener('click', function() {
            barChartData.datasets.forEach(function(dataset, i) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });
            });
            window.myBar.update();
        });
    </script>
</body>

</html>
