<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="../lib/plugins/flot/flot.css" rel="stylesheet" type="text/css">
	<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.js"></script>
	<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.categories.js"></script>
	<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.selection.js"></script>
	<script type="text/javascript">

	$(function() {

		var data = [
		<?php
		$prioridades = Prioridade::retrieveAll();
		foreach ($prioridades as $prioridade) {?>
			{
			label: "<?= $prioridade->getNome() ?>",
			data: [
				<?php
				$sistemas = Sistema::retrieveAll();
				for ($i = 1; $i < count($sistemas); $i++) {?>
					[<?= $i ?>, <?= Tarefa::countPrioridadeBySistema($prioridade->getCodigo(),  $i) ?>],
				<?php }?>
				]
		},
		<?php }?>
		];

		var options = {
			series: {
				lines: {
					show: true
				},
				points: {
					show: true
				}
			},
			legend: {
				noColumns: 2
			},
			xaxis: {
				tickDecimals: 0
			},
			yaxis: {
				min: 0
			},
			selection: {
				mode: "x"
			}
		};

		var placeholder = $("#placeholder");

		placeholder.bind("plotselected", function (event, ranges) {

			$("#selection").text(ranges.xaxis.from.toFixed(1) + " to " + ranges.xaxis.to.toFixed(1));

			var zoom = $("#zoom").attr("checked");

			if (zoom) {
				plot = $.plot(placeholder, data, $.extend(true, {}, options, {
					xaxis: {
						min: ranges.xaxis.from,
						max: ranges.xaxis.to
					}
				}));
			}
		});

		placeholder.bind("plotunselected", function (event) {
			$("#selection").text("");
		});

		var plot = $.plot(placeholder, data, options);

		$("#clearSelection").click(function () {
			plot.clearSelection();
		});

		$("#setSelection").click(function () {
			plot.setSelection({
				xaxis: {
					from: 1994,
					to: 1995
				}
			});
		});

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
</head>
<body>
	<div id="content">
		<fieldset>
			<legend>Gráfico de Tarefas</legend>
			<div class="container">
				<div id="placeholder" class="placeholder"></div>
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
