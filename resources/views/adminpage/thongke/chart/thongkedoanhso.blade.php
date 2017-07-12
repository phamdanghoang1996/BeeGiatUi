  <script src="{{asset('js/chartGiatUi.js')}}"></script>
  <script src="{{asset('js/utilChartGiatUi.js')}}"></script>
	<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	.chart-container {
		width: 90%;
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
	<div class="container">
	</div>
	<script>
		function createConfig() {
			return {
				type: 'line',
				data: {
					labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11","Tháng 12"],
					datasets: [{
						label: "đồng",
						borderColor: window.chartColors.red,
						backgroundColor: window.chartColors.red,
						data: [{{$data[1]}}, {{$data[2]}}, {{$data[3]}}, {{$data[4]}}, {{$data[5]}}, {{$data[6]}}, {{$data[7]}}, {{$data[8]}}, {{$data[9]}}, {{$data[10]}},{{$data[11]}},{{$data[12]}}],
						fill: false,
					}]
				},
				options: {
					responsive: true,
					title:{
						display: true,
						text: "Thống kê doanh số trong năm {{$year_now}}"
					},
					tooltips: {
						position: 'nearest',
						mode: 'index',
						intersect: false,
						yPadding: 10,
						xPadding: 10,
						caretSize: 8,
						backgroundColor: 'rgba(72, 241, 12, 1)',
						titleFontColor: window.chartColors.black,
						bodyFontColor: window.chartColors.black,
						borderColor: 'rgba(0,0,0,1)',
						borderWidth: 1
					},
				}
			};
		}

		window.onload = function() {
			var container = document.querySelector('.container');
			var div = document.createElement('div');
			div.classList.add('chart-container');

			var canvas = document.createElement('canvas');
			div.appendChild(canvas);
			container.appendChild(div);

			var ctx = canvas.getContext('2d');
			var config = createConfig();
			new Chart(ctx, config);
			console.log(config);
		};
	</script>
</body>

</html>
