<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="../lib/plugins/flot/flot.css" rel="stylesheet" type="text/css">
		<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.js"></script>
		<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.categories.js"></script>
		<script type="text/javascript">
		$(function() {
			var data = [
				['Janeiro', '<?= Olap::countMesDespesa(1)?>'],
				['Fevereiro','<?= Olap::countMesDespesa(2)?>'],
				['Março', '<?= Olap::countMesDespesa(3)?>'],
				['Abril', '<?= Olap::countMesDespesa(4)?>'],
				['Maio', '<?= Olap::countMesDespesa(5)?>'],
				['Junho', '<?= Olap::countMesDespesa(6)?>'],
				['Julho', '<?= Olap::countMesDespesa(7)?>'],
				['Agosto', '<?= Olap::countMesDespesa(8)?>'],
				['Setembro', '<?= Olap::countMesDespesa(9)?>'],
				['Outubro', '<?= Olap::countMesDespesa(10)?>'],
				['Movembro', '<?= Olap::countMesDespesa(11)?>'],
				['Dezembro', '<?= Olap::countMesDespesa(12)?>']
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
				<legend>Gráfico Olap Despesa</legend>
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