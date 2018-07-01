<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="../lib/plugins/flot/flot.css" rel="stylesheet" type="text/css">
		<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.js"></script>
		<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.categories.js"></script>
		<script type="text/javascript">
		$(function() {
			var data = [
				['Janeiro', '<?= Olap::countMesTempo(1)?>'],
				['Fevereiro','<?= Olap::countMesTempo(2)?>'],
				['Março', '<?= Olap::countMesTempo(3)?>'],
				['Abril', '<?= Olap::countMesTempo(4)?>'],
				['Maio', '<?= Olap::countMesTempo(5)?>'],
				['Junho', '<?= Olap::countMesTempo(6)?>'],
				['Julho', '<?= Olap::countMesTempo(7)?>'],
				['Agosto', '<?= Olap::countMesTempo(8)?>'],
				['Setembro', '<?= Olap::countMesTempo(9)?>'],
				['Outubro', '<?= Olap::countMesTempo(10)?>'],
				['Movembro', '<?= Olap::countMesTempo(11)?>'],
				['Dezembro', '<?= Olap::countMesTempo(12)?>']
			];

			$.plot("#meses", [ data ], {
				series: {
					bars: {
						show: true,
						barWidth: 0.6,
						align: "center"
					}
				},
				xaxis: {
					mode: "categories",
					tickLength: 0
				}
			});
			$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
		});
		</script>
	</head>
	<body>
		<div id="content">
			<fieldset>
				<legend>Gráfico Olpa por Tempo</legend>
			<div class="container">
				<div id="meses" class="placeholder"></div>
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