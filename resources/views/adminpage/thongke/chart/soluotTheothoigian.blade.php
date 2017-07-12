<script src="{{asset('js/chartGiatUi.js')}}"></script>
<script src="{{asset('js/utilChartGiatUi.js')}}"></script>
<canvas id="myChart" width="300px" height="200px"></canvas>
<script type="text/javascript">
      var ctx = document.getElementById("myChart");
      var ctx = document.getElementById("myChart").getContext("2d");
      var ctx = $("#myChart");
      var ctx = "myChart";
</script>
<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["7h-7h59", "8h-8h59", "9h-9h59", "10h-10h59", "11h-11h59", "12h-12h-59","13h-13h59", "14h-14h59", "15h-15h59", "16h-16h69", "17h-17h59", "18h-18h59'","19h-19h59","20h-20h59","21h-21h59"],
        datasets: [{
            label: 'Số lượt/h',
            data: [{{$thoigian[7]}}, {{$thoigian[8]}}, {{$thoigian[9]}}, {{$thoigian[10]}}, {{$thoigian[11]}}, {{$thoigian[12]}},{{$thoigian[13]}},{{$thoigian[14]}},{{$thoigian[15]}},{{$thoigian[16]}},{{$thoigian[17]}},{{$thoigian[18]}},{{$thoigian[19]}},{{$thoigian[20]}},{{$thoigian[21]}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)'

            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
