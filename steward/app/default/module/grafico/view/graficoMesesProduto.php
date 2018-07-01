<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="../lib/plugins/flot/flot.css" rel="stylesheet" type="text/css">
		<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.js"></script>
		<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.categories.js"></script>
		<script type="text/javascript">
		$(function() {
			var data = [
				['Janeiro', '<?= Produto::countMeses(1)?>'],
				['Fevereiro','<?= Produto::countMeses(2)?>'],
				['Março', '<?= Produto::countMeses(3)?>'],
				['Abril', '<?= Produto::countMeses(4)?>'],
				['Maio', '<?= Produto::countMeses(5)?>'],
				['Junho', '<?= Produto::countMeses(6)?>'],
				['Julho', '<?= Produto::countMeses(7)?>'],
				['Agosto', '<?= Produto::countMeses(8)?>'],
				['Setembro', '<?= Produto::countMeses(9)?>'],
				['Outubro', '<?= Produto::countMeses(10)?>'],
				['Movembro', '<?= Produto::countMeses(11)?>'],
				['Dezembro', '<?= Produto::countMeses(12)?>']
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
				<legend>Gráfico Mensal Produtos</legend>
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