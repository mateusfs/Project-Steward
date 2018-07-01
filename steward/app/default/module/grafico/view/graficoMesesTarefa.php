<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="../lib/plugins/flot/flot.css" rel="stylesheet" type="text/css">
		<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.js"></script>
		<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.categories.js"></script>
		<script type="text/javascript">
		$(function() {
			var data = [
				['Janeiro', '<?= Tarefa::countMes(1)?>'],
				['Fevereiro','<?= Tarefa::countMes(2)?>'],
				['Março', '<?= Tarefa::countMes(3)?>'],
				['Abril', '<?= Tarefa::countMes(4)?>'],
				['Maio', '<?= Tarefa::countMes(5)?>'],
				['Junho', '<?= Tarefa::countMes(6)?>'],
				['Julho', '<?= Tarefa::countMes(7)?>'],
				['Agosto', '<?= Tarefa::countMes(8)?>'],
				['Setembro', '<?= Tarefa::countMes(9)?>'],
				['Outubro', '<?= Tarefa::countMes(10)?>'],
				['Movembro', '<?= Tarefa::countMes(11)?>'],
				['Dezembro', '<?= Tarefa::countMes(12)?>']
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
				<legend>Gráfico Mensal Tarefas</legend>
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