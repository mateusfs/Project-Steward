<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="../lib/plugins/flot/flot.css" rel="stylesheet" type="text/css">
	<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.js"></script>
	<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.categories.js"></script>
	<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.selection.js"></script>
	<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.time.js"></script>
	<script type="text/javascript">

	$(function() {

		var d = [
				<?php
				$f = fopen('log/logger.log', 'r');
				while(!feof($f)) {
					$temp = explode(" ",fgets($f));
					if(count($temp)> 10){
						//$tempo = substr($temp[1], 0, 8);
						$mes = explode("-",$temp[0]);
						$hora = explode(":",$temp[1]);
						$tempo = mktime($hora[0], $hora[1], substr($hora[2], 0, 2), $mes[0], $mes[1], substr($mes[2], 2, 4));
					?>
						[<?= $tempo?>, <?= $mes[1]?>],
					<?php
					}
				}
				?>
				];

		for (var i = 0; i < d.length; ++i) {
			d[i][0] += 60 * 60 * 1000;
		}

		function weekendAreas(axes) {

			var markings = [],
				d = new Date(axes.xaxis.min);

			d.setUTCDate(d.getUTCDate() - ((d.getUTCDay() + 1) % 7))
			d.setUTCSeconds(0);
			d.setUTCMinutes(0);
			d.setUTCHours(0);

			var i = d.getTime();

			do {
				markings.push({ xaxis: { from: i, to: i + 2 * 24 * 60 * 60 * 1000 } });
				i += 7 * 24 * 60 * 60 * 1000;
			} while (i < axes.xaxis.max);

			return markings;
		}

		var options = {
			xaxis: {
				mode: "time",
				tickLength: 5
			},
			selection: {
				mode: "x"
			},
			grid: {
				markings: weekendAreas
			}
		};

		var plot = $.plot("#placeholder", [d], options);

		var overview = $.plot("#overview", [d], {
			series: {
				lines: {
					show: true,
					lineWidth: 1
				},
				shadowSize: 0
			},
			xaxis: {
				ticks: [],
				mode: "time"
			},
			yaxis: {
				ticks: [],
				min: 0,
				autoscaleMargin: 0.1
			},
			selection: {
				mode: "x"
			}
		});

		$("#placeholder").bind("plotselected", function (event, ranges) {

			plot = $.plot("#placeholder", [d], $.extend(true, {}, options, {
				xaxis: {
					min: ranges.xaxis.from,
					max: ranges.xaxis.to
				}
			}));

			overview.setSelection(ranges, true);
		});

		$("#overview").bind("plotselected", function (event, ranges) {
			plot.setSelection(ranges);
		});

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
</head>
<body>
	<div id="content">
		<fieldset>
			<legend>Gráfico de Utilização</legend>
			<div class="container">
				<div id="placeholder" class="placeholder"></div>
			</div>
			<div class="container" style="height:150px;">
				<div id="overview" class="placeholder"></div>
			</div>
		</fieldset>
		<div style="float: right; margin-top: 50px;">
			<a href="grafico">
				<button type="button" class="button inverse large">Voltar</button>
			</a>
		</div>
	</div>
</body>
</html>
