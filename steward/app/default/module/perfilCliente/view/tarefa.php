<?php
foreach ( $tarefas as $row ) {
	$prioridade = Prioridade::retrieveByPk ( $row->getIdPrioridade());
	if($row->getIdCliente ()){
		$cliente = Cliente::retrieveByPk ( $row->getIdCliente () );
	}
	$usuario = Usuario::retrieveByPk ( $row->getIdUsuario () );
?>
<div style="padding-top: 20px;">
	<div>
		<fieldset>
			<legend style="margin-bottom: -2px;">Tarefas</legend>
			<div class="panel" data-role="panel">
				<div class="panel-header <?= $prioridade->getCor()?> fg-white span2" data-valor="<?= $row->getPorcentagem() ?>" data-id="<?= $row->getCodigo()?>" style="float: right; font-size:18px; margin-top: -42px;"><?= $prioridade->getNome()?></div>
				<div class="panel-content" style="display: none;">
						<div class="slider" data-role="slider" id="<?= $row->getCodigo()?>" data-position="<?= $row->getPorcentagem() ?>"  data-show-hint="true" data-accuracy="0" data-colors="blue, red, yellow, green"></div>
						<blockquote>Tarefa
							<h2><?= $row->getApelido(); ?></h2>
						</blockquote>
						<div style="width: 150px; float: right; margin-top: -70px;">
							<?php if($row->getIdCliente ()){?>
							<img src="../web/files/cliente/<?= ($cliente->getFoto())?$cliente->getFoto():'default.png';?>" data-hint="Para <?= $cliente->getNome() ?>" class="cycle  bd-white shadow" style="float:left; width: 40px; height: 40px;"/>
							<?php }?>
							<img src="../web/files/usuario/<?= ($usuario->getFoto())?$usuario->getFoto():'default.png';?>" data-hint="De <?= $usuario->getNome() ?>" class="cycle bd-white shadow" style="float:right; width: 40px; height: 40px;"/>
						</div>
						<div style="float: right; margin-top: -20px;">
							<button type="button" class="button default detalhe"
									data-nome="<?= $row->getApelido();?>"
									data-texto="<?= $row->getTexto();?>"
									<?php if($row->getIdCliente ()){?>
									data-cliente="<?= $cliente->getNome();?>"
									<?php }?>
									<?php if($row->getDataInicial()){?>
									data-inicial="<?= $row->getDataInicial();?>"
									<?php }?>
									<?php if($row->getDataFinal()){?>
									data-final="<?= $row->getDataFinal();?>"
									<?php }?>
									data-usuario="<?= $usuario->getNome();?>">Detalhes</button>
							<button type="button" class="button primary realizado" style="margin-left: 10px;"  data-codigo="<?= $row->getCodigo();?>">Realizar</button>
						</div>
				</div>
			</div>
		</fieldset>
	</div>
</div>
<?php }?>
<script type="text/javascript">
$(document).ready(function() {
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
						'<form class="user-input" action="tarefa/realizado">'+
						'<input type="hidden" value="'+codigo+'" nome="codigo"/>'+
						'<label>Justificativa</label>'+
						'<div class="input-control textarea"><textarea placeholder="Justificar" name="justifica"></textarea></div>'+
						'<div style="margin-top: 10px;">'+
						'<a style="float: left;"><button type="submit" class="button success">Tarefa Realizada</button></a>'+
						'<a href="index/ignorar/codigo/'+codigo+'" style="margin-left: 120px;"><button type="button" class="button danger">Ignorar Tarefa</button></a>'+
						'<a style="float: right;"><button class="button" type="button" onclick="$.Dialog.close()">Cancelar</button></a>'+
						'</div>'+
						'</form>'+
						'</div>';

				$.Dialog.title("Tarefas");
				$.Dialog.content(content);
			}
		});
	});

	$(".detalhe").on('click', function(){
		texto = $(this).attr('data-texto');
		nome = $(this).attr('data-nome');
		usuario = $(this).attr('data-usuario');
		cliente = $(this).attr('data-cliente');
		dataInicial = $(this).attr('data-inicial');
		dataFinal = $(this).attr('data-final');
		$.Dialog({
			overlay: true,
			shadow: true,
			flat: true,
			draggable: true,
			icon: '<span class="icon icon-info"></span>',
			title: 'Detalhes',
			content: '',
			padding: 10,
			onShow: function(_dialog){
			var content = '<div style="padding: 20px 20px 20px;">'+
							'<blockquote>Tarefa<h2>'+nome+'</h2></blockquote>';
							if(cliente){
								content += '<blockquote>Cliente<h2>'+cliente+'</h2></blockquote>';
							}
							if(dataInicial){
								content += '<blockquote>Data Inicial<h2>'+dataInicial+'</h2></blockquote>';
							}
							if(dataFinal){
								content += '<blockquote>Data Final<h2>'+dataFinal+'</h2></blockquote>';
							}
							content += '<blockquote>Usuario<h2>'+usuario+'</h2></blockquote>'+
							'<div class="span7" data-hint="Texto"><div class="text-center padding10 border">'+texto+'</div>'+
							'<div style="padding:20px;"><button class="button inverse" type="button" onclick="$.Dialog.close()" style="float: right;">Fechar</button></div>'+
							'</div>';
				$.Dialog.title("Detalhes");
				$.Dialog.content(content);
			}
		});
	});

	$(".panel-header").click(function(){
		id = $(this).attr('data-id');
		valor = $(this).attr('data-valor');
		div = $("#"+id).find('div');
		a = $("#"+id).find('a');
		span = $("#"+id).find('span');
		div.css('width', valor+"%");
		color = "blue";
		(valor >= 38 && valor <= 62)?color = "red":"";
		(valor >= 63 && valor < 88)?color = "yellow":"";
		(valor >= 88)?color = "green":"";
		div.css('background-color', color);
		a.css('left', valor+"%");
		span.css('left', valor+"%");
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