<style>
canvas {
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
}
</style>

<div id="canvas-holder" style="width:80%">
    <canvas id="chart-area" />
</div>
<script>
var config = {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [
                1000,1000
            ],
            backgroundColor: [
                window.chartColors.red,
                window.chartColors.green,
            ],
            label: 'Dataset 1'
        }],
        labels: [
            "Tiền giặt",
            "Tiền sấy"
        ]
    },
    options: {
        responsive: true,
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Thống kê giặt và ủi trong ngày'
        },
        animation: {
            animateScale: true,
            animateRotate: true
        }
    }
};

window.onload = function() {
    var ctx = document.getElementById("chart-area").getContext("2d");
    window.myDoughnut = new Chart(ctx, config);
};

document.getElementById('randomizeData').addEventListener('click', function() {
    config.data.datasets.forEach(function(dataset) {
        dataset.data = dataset.data.map(function() {
            return randomScalingFactor();
        });
    });

    window.myDoughnut.update();
});

var colorNames = Object.keys(window.chartColors);
</script>
