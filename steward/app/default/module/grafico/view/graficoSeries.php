<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="../lib/plugins/flot/flot.css" rel="stylesheet" type="text/css">
	<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.js"></script>
	<script lang="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.categories.js"></script>
	<script type="text/javascript">

	$(function() {

		var datasets = {
			<?php
				$notas = Nota::retrieveAll();
				foreach ($notas as $nota) {
			?>
			<?= $nota->getCodigo() ?>: {
				label: "<?= $nota->getNome() ?>",
				data: [
						<?php for ($i = 2014; $i < 2017; $i++) { ?>
						[<?= $i ?> , <?= Cliente::countClienteCompraNota($nota->getCodigo()) ?>],
						<?php }?>
						]
			},
			<?php }?>
		};

		var i = 0;
		$.each(datasets, function(key, val) {
			val.color = i;
			++i;
		});

		var choiceContainer = $("#choices");
		$.each(datasets, function(key, val) {
			choiceContainer.append("<div class='clear'></div><div class='input-control checkbox'><label><input type='checkbox' name='" + key +
				"' checked='checked' id='id" + key + "' />" +
				"<span class='check' for='id" + key + "'></span>"
				+ val.label + "</label></div>");
		});

		choiceContainer.find("input").click(plotAccordingToChoices);

		function plotAccordingToChoices() {

			var data = [];

			choiceContainer.find("input:checked").each(function () {
				var key = $(this).attr("name");
				if (key && datasets[key]) {
					data.push(datasets[key]);
				}
			});

			if (data.length > 0) {
				$.plot("#placeholder", data, {
					yaxis: {
						min: 0
					},
					xaxis: {
						tickDecimals: 0
					}
				});
			}
		}

		plotAccordingToChoices();

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
</head>
<body>
	<div id="content">
		<fieldset>
			<legend>Gráfico de Clientes / Notas</legend>
			<div class="container">
				<div id="placeholder" class="placeholder" style="float:left; width:85%;"></div>
				<p id="choices" style="float:right;"></p>
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
