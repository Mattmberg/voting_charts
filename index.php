<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Vote!</title>
</head>
<body>
    
</body>
</html>

<script>
				var group_chart_one = $('#pie_chart');

				var graph_one = new Chart(group_chart_one, {
					type:"pie",
					data:chart_data
				});

				var group_chart_two = $('#doughnut_chart');

				var graph2 = new Chart(group_chart_two, {
					type:"bar",
					data:chart_data
                    options:options
				});

				var group_chart_three = $('#bar_chart');

				var graph_three = new Chart(group_chart_three, {
					type:'doughnut',
					data:chart_data,
				});
			}
		})
	}

});
</script>
