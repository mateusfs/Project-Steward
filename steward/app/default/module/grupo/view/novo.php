<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Grupos de Usuários</a>
		</li>
	</ul>
</div>
<?php if($grupo){ ?>
<div style="float: right;">
	<nav class="horizontal-menu">
		<ul>
			<li><a class="dropdown-toggle" href="#"><img src="../web/img/icon/list.png"></a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a tabindex="-1" href="grupo/excluir/codigo/<?= $grupo->getCodigo() ?>">Excluir Grupo</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<?php }?>
<div style="width: 70%; margin: auto; margin-top:50px; padding-bottom: 40px;">
	<div>
		<form method="post" action="grupo/salvar">
				<fieldset>
					<?php if($grupo){ ?>
					<legend>
						<font><font class="">Editar Grupo</font></font>
						<input type="hidden" name='codigo' value="<?= $grupo->getCodigo() ?>">
					</legend>
					<div class="input-control text" data-role="input-control">
						<input type="text" placeholder="Nome" name='nome' value="<?= $grupo->getNome() ?>">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				<?php }else{?>
					<legend>
						<font><font class="">Novo Grupo</font></font>
					</legend>
					<div class="input-control text" data-role="input-control">
						<input type="text" placeholder="Nome" name='nome'>
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				<?php }?>
					<br>
					<button type="submit" class="button large">Salvar</button>
				</fieldset>
			</form>
	</div>
<br>
<fieldset>
<legend>Modulos do Grupo</legend>
<div style="padding:30px; width: 70%;   margin: auto;  " >
	<div class="input-control switch" style="width: 100%;">
		<?php foreach ($grupoModulos as $grupo){
		$modulo = Modulo::retrieveByPk($grupo->getIdModulo());
		?>
		<fieldset>
			<legend><?= $modulo->getApelido(); ?>
				<label style="float: right;">
					<input class='status' data-modulo='<?= $grupo->getIdModulo();?>' data-grupo='<?= $grupo->getIdGrupoUsuario();?>'
							type="checkbox"<?= ($grupo->getIdStatus() == 1)?"checked":"";?> />
					<span class="check"></span>
				</label>
			</legend>
		</fieldset>
		<?php }?>
	</div>
</div>
</fieldset>
</div>
<script type="text/javascript">

$(document).ready(function(){
	$('.status').click( function(){
		url = 'grupo/salvaStatus';
		modulo  = $(this).attr('data-modulo');
		grupo  = $(this).attr('data-grupo');
		data = {modulo: modulo, grupo: grupo};
		$.ajax({
			type: "POST",
			url: url,
			data: data
		});
	});
});

<?php if($error == 1){?>
	new AlertaSucesso("Atenção...", "Encontramos um grupo com o mesmo nome!!");
<?php }?>
<?php if($error == 1){?>
	new AlertaSucesso("Atenção...", "Existem usuários associadas a esse grupo!!");
<?php }?>
<?php if($sucesso == 1){?>
	new AlertaSucesso("Salvo...", "Atualizado!!");
<?php }?>
</script>