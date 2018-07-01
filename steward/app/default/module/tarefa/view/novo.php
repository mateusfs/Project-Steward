<div class="tab-control" data-role="tab-control" style="margin-top: -50px;">
	<ul class="tabs blue">
		<li class="active"><a href="#_page_2">Tarefa</a>
		</li>
	</ul>
</div>
<?php if($tarefa){ ?>
<div style="float: right;">
	<nav class="horizontal-menu">
		<ul>
			<li><a class="dropdown-toggle" href="#"><img src="../web/img/icon/list.png"></a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a tabindex="-1" href="tarefa/excluir/codigo/<?= $tarefa->getCodigo() ?>">Excluir Tarefa</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<?php }?>
<div style="width: 70%; margin: auto; margin-top:50px; padding-bottom: 40px;">
	<?php if($tarefa){?>
		<div class="slider" data-role="slider" id="<?= $tarefa->getCodigo()?>" data-position="<?= $tarefa->getPorcentagem() ?>"  data-show-hint="true" data-accuracy="0" data-colors="blue, red, yellow, green"></div>
	<?php }?>
	<div>
		<form method="post" action="tarefa/salvar">
				<fieldset>
					<?php if($tarefa){ ?>
					<legend>
						<font><font class="">Editar Tarefa</font></font>
						<input type="hidden" name='codigo' value="<?= $tarefa->getCodigo() ?>">
					</legend>
					<div class="input-control text" data-role="input-control">
						<label>Nome</label>
						<input type="text" placeholder="Nome" name='apelido' value="<?= $tarefa->getApelido() ?>">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				<?php }else{?>
					<legend>
						<font><font class="">Novo Tarefa</font></font>
					</legend>
					<div class="input-control text" data-role="input-control">
						<label>Nome</label>
						<input type="text" placeholder="Nome" name='apelido'>
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				<?php }?>
				<div>
				<br>
				<label>Prioridade</label>
				<div class="input-control select">
					<select name="prioridade">
					<?php
						$prioridade  = Prioridade::retrieveAll();
						foreach ($prioridade as $row) {?>
						<option value="<?= $row->getCodigo()?>" <?= ($tarefa)?($row->getCodigo() == $tarefa->getIdPrioridade())?'selected':"":""; ?>>
							<?= $row->getNome() ?>
						</option>
						<?php }?>
						</select>
					</div>
				</div>
				<div>
				<label>Status</label>
				<div class="input-control select">
					<select name="status">
					<?php
						$status  = Status::retrieveAll();
						foreach ($status as $row) {?>
						<option value="<?= $row->getCodigo()?>" <?= ($tarefa)?($row->getCodigo() == $tarefa->getIdStatus())?'selected':"":""; ?>>
							<?= $row->getNome() ?>
						</option>
						<?php }?>
						</select>
					</div>
				</div>
				<div>
					<div style="float: left;">
						<label>Data Inicio</label>
						<div class="input-control text" data-role="datepicker" data-effect="slide" data-locale="en"
							data-date="<?= ($tarefa)?($tarefa->getDataInicial() == '0000-00-00')?date('Y/m/d'):$tarefa->getDataInicial():date('Y/m/d');?>">
							<input type="text" name="dataIncial" readonly="readonly" >
							<button type="button" class="btn-date"></button>
						</div>
					</div>
					<div style="float: right;">
						<label>Data Final</label>
						<div class="input-control text" data-role="datepicker" data-effect="slide" data-locale="en"
							data-date="<?= ($tarefa)?($tarefa->getDataFinal() == '0000-00-00')?date('Y/m/d'):$tarefa->getDataFinal():date('Y/m/d');?>">
							<input type="text" name="dataFinal" readonly="readonly" >
							<button type="button" class="btn-date"></button>
						</div>
					</div>
				</div>
				<div style="margin-top: 80px;">
					<label>Cliente</label>
					<div class="input-control select">
						<select name="cliente">
							<option value='0'>Sem Cliente</option>
						<?php
							$cliente  = Cliente::retrieveAtivos();
							foreach ($cliente as $row) {?>
							<option value="<?= $row->getCodigo()?>" <?= ($tarefa)?($row->getCodigo() == $tarefa->getIdCliente())?'selected':"":""; ?>>
								<?= $row->getNome() ?>
							</option>
						<?php }?>
						</select>
					</div>
				</div>
				<div>
					<label>Usuário</label>
					<div class="input-control select">
						<select name="usuario">
						<?php
							$usuario  = Usuario::retrieveAll();
							foreach ($usuario as $row) {?>
							<option value="<?= $row->getCodigo()?>" <?= ($tarefa)?($row->getCodigo() == $tarefa->getIdUsuario())?'selected':"":"";?>>
								<?= $row->getNome() ?>
							</option>
						<?php }?>
						</select>
					</div>
				</div>
				<div>
					<label>Gráfico</label>
					<div class="input-control select">
						<select name="grafico">
							<option value='0'>Sem Gráfico</option>
						<?php
							$graficos  = Grafico::retrieveAtivos();
							foreach ($graficos as $row) {?>
							<option value="<?= $row->getNome()?>" <?= ($tarefa)?($row->getCodigo() == $tarefa->getIdGrafico())?'selected':"":"";?>>
								<?= $row->getApelido() ?>
							</option>
						<?php }?>
						</select>
					</div>
				</div>
				<?php if($tarefa){?>
				<div class="input-control textarea">
					<label>Texto</label>
					<textarea name="texto"><?= $tarefa->getTexto()?></textarea>
				</div>
				<?php }else{?>
				<div class="input-control textarea">
					<label>Texto</label>
					<textarea name="texto"></textarea>
				</div>
				<?php }?>
				<?php if($tarefa){
						if($tarefa->getJustificativa()){?>
				<div class="input-control textarea">
					<label>Justificativa</label>
					<textarea name="texto"><?= $tarefa->getJustificativa() ?></textarea>
				</div>
				<?php
						}
					}
				?>
				<br>
				<br>
				<div style="width: 100%">
					<button style="float: left;" type="submit" class="button large">Salvar</button>
					<?php
						if($tarefa){
							if($tarefa->getIdStatus() < 3){?>
					<button style="margin-left: 15%;" type="button" class="button large primary realizado" data-codigo="<?= $tarefa->getCodigo();?>">Realizar</button>
					<a href="tarefa/ignorar/codigo/<?= $tarefa->getCodigo();?>"><button style="margin-left: 15%;" type="button" class="button large danger">Ignorar</button></a>
					<?php
							}
						}?>
					<a style="float: right;" href="tarefa" ><button type="button" class="button large inverse">Voltar</button></a>
				</div>
				</fieldset>
			</form>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$(".realizado").on('click', function(){
		codigo = $(this).attr('data-codigo');
		$.Dialog({
			overlay: true,
			shadow: true,
			flat: true,
			draggable: true,
			icon: '<span class="icon icon-comments-5"></span>',
			title: 'Tarefa',
			content: '',
			padding: 10,
			onShow: function(_dialog){
				var content = '<div style="width: 600px; height: 200px; padding: 10px 20px 20px;">'+
						'<form class="user-input" action="tarefa/realizado" method="post" >'+
						'<input type="hidden" value="'+codigo+'" name="codigo">'+
						'<label>Justificativa</label>'+
						'<div class="input-control textarea"><textarea placeholder="Justificar" name="justifica" class="justifica"></textarea></div>'+
						'<div style="margin-top: 10px;">'+
						'<a style="float: left;"><button type="submit" class="button success">Tarefa Realizada</button></a>'+
						'<a href="tarefa/ignorar" style="margin-left: 120px;"><button type="button" class="button danger">Ignorar Tarefa</button></a>'+
						'<a style="float: right;"><button class="button" type="button" onclick="$.Dialog.close()">Cancelar</button></a>'+
						'</div>'+
						'</form>'+
						'</div>';

				$.Dialog.title("Tarefas");
				$.Dialog.content(content);
			}
		});
	});
	$(".slider").click(function(){
		url = 'index/salvaPorcentagem';
		codigo  = $(this).attr('id');
		valor  = $(this).find('span').text();
		data = {codigo: codigo, valor: valor};
		$.ajax({
			type: "POST",
			url: url,
			data: data
		});
	});
});
</script>