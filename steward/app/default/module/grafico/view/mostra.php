<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Gráficos</a>
		</li>
	</ul>
</div>
<div>
	<?php if($grafico == 'GRAFICO_MENSAL'){
			include 'graficoMeses.php';
	}?>
	<?php if($grafico == 'GRAFICO_UTILIZACAO'){
			include 'graficoUtilizacao.php';
	}?>
	<?php if($grafico == 'GRAFICO_PRODUTO'){
			include 'graficoEixos.php';
	}?>
	<?php if($grafico == 'GRAFICO_TAREFAS'){
			include 'graficoSelecao.php';
	}?>
	<?php if($grafico == 'GRAFICO_CLIENTES'){
			include 'graficoSeries.php';
	}?>
	<?php if($grafico == 'GRAFICO_MENSAL_TAREFA'){
			include 'graficoMesesTarefa.php';
	}?>
	<?php if($grafico == 'GRAFICO_MENSAL_PRODUTO'){
			include 'graficoMesesProduto.php';
	}?>
	<?php if($grafico == 'GRAFICO_OLAP_DESPESA'){
			include 'graficoOlapDespesa.php';
	}?>
	<?php if($grafico == 'GRAFICO_OLAP_TEMPO'){
			include 'graficoOlapTempo.php';
	}?>
</div>


