
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="../lib/plugins/flot/flot.css" rel="stylesheet" type="text/css">
	<script language="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.js"></script>
	<script language="javascript" type="text/javascript" src="../lib/plugins/flot/jquery.flot.stack.js"></script>
	<script type="text/javascript">

	$(function() {

		<?php
			$produtos = Produto::retrieveOrderCompra();
			foreach ($produtos as $key => $produto) {
				if($key <= 2){
		?>
			var d<?= $key ?> = [];
			<?php for ($i = 1; $i < date('m'); $i++) {?>
					d<?= $key ?>.push([<?= $i?>, parseInt(<?= Produto::countCompra($produto->getCodigo()) ?> * <?= Produto::countMes($produto->getCodigo(), $i)?>)]);
			<?php }?>

		<?php }}?>

		var stack = 0,
			bars = true,
			lines = false,
			steps = false;

		function plotWithOptions() {
			$.plot("#placeholder", [
					<?php foreach ($produtos as $key => $produto) {
						if($key <= 2){
					?>
						{ data: d<?= $key ?>, label: "<?= $produto->getNome()?>"},
					<?php }} ?>
					], {
				series: {
					stack: stack,
					lines: {
						show: lines,
						fill: true,
						steps: steps
					},
					bars: {
						show: bars,
						barWidth: 0.6
					}
				}
			});
		}

		plotWithOptions();

		$(".stackControls button").click(function (e) {
			e.preventDefault();
			stack = $(this).text() == "Com empilhamento" ? true : null;
			plotWithOptions();
		});

		$(".graphControls button").click(function (e) {
			e.preventDefault();
			bars = $(this).text().indexOf("Barras") != -1;
			lines = $(this).text().indexOf("Linhas") != -1;
			steps = $(this).text().indexOf("passos") != -1;
			plotWithOptions();
		});


		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
</head>
<body>
	<div id="content">
		<fieldset>
			<legend>Gráfico de Produtos</legend>
				<div class="container">
					<div id="placeholder" class="placeholder"></div>
				</div>
		</fieldset>
		<div style="float: left; margin-top: 50px;">
			<p class="stackControls">
				<button class="button primary small">Com empilhamento</button>
				<button class="button primary small">Sem empilhamento</button>
			</p>

			<p class="graphControls">
				<button class="button primary small">Barras</button>
				<button class="button primary small">Linhas</button>
				<button class="button primary small">Linhas com passos</button>
			</p>
		</div>
		<div style="float: right; margin-top: 50px;">
			<a href="grafico">
				<button type="button" class="button inverse large">Voltar</button>
			</a>
		</div>
	</div>

</body>
</html>
