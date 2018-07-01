<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a><?= ($usuarioPerfil->getNome())?$usuarioPerfil->getNome():"Novo Usuario"?></a>
		</li>
	</ul>
</div>
<?php
	if($usuarioPerfil->getCodigo()){
		if($usuarioPerfil->getCodigo() != SessaoUtils::sessionGet('USUARIO')->getCodigo()){
	?>
<div style="float: right;">
	<nav class="horizontal-menu">
		<ul>
			<li><a class="dropdown-toggle" href="#"><img
					src="../web/img/icon/list.png"></a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a tabindex="-1"
						href="perfilUsuario/excluir/codigo/<?= $usuarioPerfil->getCodigo()?>">Ecluir Usuário</a></li>
				</ul></li>
		</ul>
	</nav>
</div>
<?php
		}
	}
?>
<div class="tab-control" data-role="tab-control" style="margin-top: 20px;">
	<ul class="tabs">
		<li class="special active">
			<a  href="#perfil">Perfil</a>
		</li>
		<?php if(count($tarefas) > 0 && $usuarioPerfil->getCodigo()){?>
		<li class="">
			<a href="#tarefa">Tarefas</a>
		</li>
		<?php }?>
	</ul>
	<div class="frames">
		<div class="frame" id="perfil">
				<?php include 'perfil.php';?>
		</div>
		<div class="frame" id="tarefa">
				<?php include 'tarefa.php';?>
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
<?php if($error == 4){?>
new AlertaError("Atenção...", "Senha atual incorreta!!");
<?php }?>
<?php if($error == 5){?>
new AlertaError("Atenção...", "Senha não mudou??");
<?php }?>
<?php if($error == 6){?>
new AlertaError("Atenção...", "Você não tem permissão para está operação!!");
<?php }?>
<?php if($error == 7){?>
new AlertaError("Atenção...", "As senhas não conferem!!");
<?php }?>
<?php if($error == 8){?>
new AlertaError("Atenção...", "O nome é obrigatorio!!");
<?php }?>
<?php if($error == 9){?>
new AlertaError("Atenção...", "O email é obrigatorio!!");
<?php }?>
<?php if($error == 10){?>
new AlertaError("Atenção...", "Preencha os campos senhas corretamente!!");
<?php }?>
<?php if($error == 11){?>
new AlertaError("Atenção...", "Esse usuario contem tarefas a serem realizadas!!");
<?php }?>
<?php if($sucesso == 1){?>
new AlertaSucesso("Sucesso...", "Perfil Atualizado!!");
<?php }?>
</script>
