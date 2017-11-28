$(document).ready(function() {
	var ctx = $('#projectileChart');
	var chart = new Chart(ctx, {
		// The type of chart we want to create
		type: 'horizontalBar',

		// The data for our dataset
		data: {
			labels: ["Move 1", "Move 2", "Move 3", "Move 4", "Move 5", "Move 6", "Move 7"],
			datasets: [{
				label: "Startup Frames",
				backgroundColor: 'rgb(63, 103, 126)',
				borderColor: 'rgb(63, 103, 126)',
				data: [0, 10, 5, 2, 20, 30, 45],
			}, {
				label: "Recovery Frames",
				backgroundColor: 'rgb(163, 103, 126)',
				borderColor: 'rgb(163, 103, 126)',
				data: [0, 10, 5, 2, 20, 30, 45],
			}]
		},

		// Configuration options go here
		options: {
			scales: {
				xAxes: [{
					stacked: true,
					scaleLabel : {
						display: true,
						labelString: "Total Frames"
					}
				}],
				yAxes: [{
					stacked: true
				}]
			}
		}
	});
	
	//Fill in the chart with the right data
	$.getJSON("./controllers/Projectiles/getChartData.php", function(response) {
		chart.data.labels = response["nameData"];
		chart.data.datasets[0].data = response["startupData"];
		chart.data.datasets[1].data = response["recoveryData"];
		chart.update();	
	});
	
	$.ajax({
		url : "./controllers/Projectiles/list.php", 
		success: function(response) {
			$("#projectileTable").html(response);
		}
	});
});