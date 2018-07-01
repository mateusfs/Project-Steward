<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Tarefas</a>
		</li>
	</ul>
</div>
<div style="float: right;">
	<nav class="horizontal-menu">
		<ul>
			<li><a class="dropdown-toggle" href="#"><img src="../web/img/icon/list.png"></a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a tabindex="-1" href="tarefa/novo">Incluir Tarefa</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<div>
	<div style="margin-top: 50px; width: 90%;">
		<div style="float: left;">
			<form action="tarefa" method="post">
				<div class="input-control text size2">
					<input type="text" name="busca"/>
					<button class="btn-search" type="submit"></button>
				</div>
			</form>
		</div>
		<div style="float: right;">
			<div class="button-set" data-role="button-group">
				<button class="large aberto <?= ($aberto)?"active":""; ?>"  data-link="tarefa/index/aberto/1" type="button">Abertos</button>
				<button class="large realizados <?= ($realizado)?"active":""; ?>" data-link="tarefa/index/realizado/3" type="button">Realizados</button>
			</div>
		</div>
	</div>
	<div>
		<table class="table hovered">
			<thead>
				<tr>
					<th class="text-left">Nome</th>
					<th class="text-left">Prioridade</th>
					<th class="text-left">Cliente</th>
					<th class="text-left">Usuario</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($tarefas as $row){?>
				<tr class="tdlink" style="cursor: pointer;" data-link='tarefa/novo/codigo/<?= $row->getCodigo()?>'>
					<th class="text-left"><?= $row->getApelido(); ?></th>
					<th class="text-left"><?php
					$prioridade = Prioridade::retrieveByPk($row->getIdPrioridade());
					echo $prioridade->getNome();
					?></th>
					<th class="text-left"><?php
					if($row->getIdCliente()){
						$cliente = Cliente::retrieveByPk($row->getIdCliente());
						echo $cliente->getNome();
					}else{
						echo " - ";
					}
					?></th>
					<th class="text-left"><?php
					$usuario = Usuario::retrieveByPk($row->getIdUsuario());
					echo $usuario->getNome();
					?></th>
				</tr>
			<?php }
				if(!$tarefas){?>
				<tr>
					<th colspan="3" class="text-left">Não tem tarefas por aqui!</th>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.tdlink').click( function(){
			link = $(this).attr('data-link');
			window.location = link;
		});
		$('.aberto').click( function(){
			link = $(this).attr('data-link');
			window.location = link;
		});
		$('.realizados').click( function(){
			link = $(this).attr('data-link');
			window.location = link;
		});
	});
	<?php if($error == 1){?>
		new AlertaError("Error...", "A justificativa é obrigatória..");
	<?php }?>
</script>