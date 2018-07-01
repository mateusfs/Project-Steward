<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a><?= ($cliente->getNome())?$cliente->getNome():"Novo Cliente";?></a>
		</li>
	</ul>
</div>
<?php if($cliente->getCodigo()){?>
<div style="float: right;">
	<nav class="horizontal-menu">
		<ul>
			<li><a class="dropdown-toggle" href="#"><img src="../web/img/icon/list.png"></a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a tabindex="-1" href="perfilCliente/excluir/codigo/<?= $cliente->getCodigo()?>">Ecluir Cliente</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<?php }?>
<div class="tab-control" data-role="tab-control" style="margin-top: 20px;">
	<ul class="tabs">
		<li class="special active">
			<a  href="#perfil">Perfil</a>
		</li>
		<?php if($endereco){?>
		<li class="">
			<a href="#endereco">Endereço</a>
		</li>
		<?php
		} if(count($tarefas) >= 1){?>
		<li class="">
			<a href="#tarefa">Tarefas</a>
		</li>
		<?php }?>
		<?php if(count($compras) >= 1){?>
		<li class="">
			<a href="#compra">Compras</a>
		</li>
		<?php }?>
	</ul>
	<div class="frames">
		<div class="frame" id="perfil">
				<?php include 'perfil.php';?>
		</div>
		<div class="frame" id="endereco">
				<?php include 'endereco.php';?>
		</div>
		<div class="frame" id="tarefa">
				<?php include 'tarefa.php';?>
		</div>
		<div class="frame" id="compra">
				<?php include 'compra.php';?>
		</div>
	</div>
</div>
<script type="text/javascript">
<?php if($error == 1){?>
	new AlertaError("Atenção...", "Encontramos um arquivo com o mesmo nome,por favor, troque o nome do arquivo!!");
<?php }?>
<?php if($error == 2){?>
	new AlertaError("Atenção...", "Extensão não permetida!!");
<?php }?>
<?php if($error == 3){?>
	new AlertaError("Atenção...", "Você não tem permissão para está operação!!");
<?php }?>
<?php if($sucesso == 1){?>
	new AlertaSucesso(":)", "Perfil Atualizado!!");
<?php }?>
</script>
