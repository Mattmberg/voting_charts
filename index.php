<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <title>Favorite Color Survey!</title>
</head>
<body>
<div class="container">
			<h2 class="text-center mt-4 mb-3">Favorite Color Survey!</a></h2>

			<div class="card">
				<div class="card-header">Color Choices</div>
				<div class="card-body">
					<div class="form-group">
						<h2 class="mb-4">What is your favorite color?</h2>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="fave_color" class="fave_color" id="fave_color_1" value="Blue" checked>
							<label class="form-check-label mb-3" for="fave_color_1">Blue</label>
						</div>
						<div class="form-check">
							<input type="radio" name="fave_color" id="fave_color_2" class="form-check-input" value="Red">
							<label class="form-check-label mb-3" for="fave_color_2">Red</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="fave_color" class="fave_color" id="fave_color_3" value="Yellow">
							<label class="form-check-label mb-3" for="fave_color_3">Yellow</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="fave_color" class="fave_color" id="fave_color_4" value="Orange">
							<label class="form-check-label mb-3" for="fave_color_4">Orange</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="fave_color" class="fave_color" id="fave_color_5" value="Purple">
							<label class="form-check-label mb-3" for="fave_color_5">Purple</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="fave_color" class="fave_color" id="fave_color_6" value="Green">
							<label class="form-check-label mb-3" for="fave_color_6">Green</label>
						</div>
					</div>
					<div class="form-group">
						<button type="button" name="submit_data" class="btn btn-primary" id="submit_data">Submit</button>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="card mt-4">
						<div class="card-header">Pie Chart</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="pie_chart"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mt-4">
						<div class="card-header">Doughnut Chart</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="doughnut_chart"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mt-4 mb-4">
						<div class="card-header">Bar Chart</div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="bar_chart"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>

<script>
	
$(document).ready(function(){

	$('#submit_data').click(function(){

		var Color_Choice = $('input[name=fave_color]:checked').val();

		$.ajax({
			url:"data.php",
			method:"POST",
			data:{action:'insert', Color_Choice:Color_Choice},
			beforeSend:function()
			{
				$('#submit_data').attr('disabled', 'disabled');
			},
			success:function(data)
			{
				$('#submit_data').attr('disabled', false);

				$('#fave_color_1').prop('checked', 'checked');

				$('#fave_color_2').prop('checked', false);

				$('#fave_color_3').prop('checked', false);

				$('#fave_color_4').prop('checked', false);

				$('#fave_color_5').prop('checked', false);

				$('#fave_color_6').prop('checked', false);

				alert("Your vote has been submitted, thank you!");

				createcharts();
			}
		})

	});

	createcharts();

	function createcharts()
	{
		$.ajax({
			url:"data.php",
			method:"POST",
			data:{action:'fetch'},
			dataType:"JSON",
			success:function(data)
			{
				var Color_Choice = [];
				var total = [];

				for(var count = 0; count < data.length; count++)
				{
					Color_Choice.push(data[count].Color_Choice);
					total.push(data[count].total);
				}

				var chart_data = {
					labels:Color_Choice,
					datasets:[
						{
							label:'Vote',
							backgroundColor:Color_Choice,
							color:'#fff',
							data:total
						}
					]
				};

				var options = {
					responsive:true,
					scales:{
						yAxes:[{
							ticks:{
								min:0
							}
						}]
					}
				};

				var group_chart1 = $('#pie_chart');

				var graph1 = new Chart(group_chart1, {
					type:"pie",
					data:chart_data
				});

				var group_chart2 = $('#doughnut_chart');

				var graph2 = new Chart(group_chart2, {
					type:"doughnut",
					data:chart_data
				});

				var group_chart_three = $('#bar_chart');

				var graph_three = new Chart(group_chart_three, {
					type:'bar',
					data:chart_data,
					options:options
				});
			}
		})
	}

});

</script>
