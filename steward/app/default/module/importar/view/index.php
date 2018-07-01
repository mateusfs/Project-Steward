<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Importar</a>
		</li>
	</ul>
</div>
<div style="padding: 30px 30px; width: 600px; margin: auto;">

	<div class="input-control switch importar" style="width: 100%;">
		<form method="post" action="importar/save" enctype="multipart/form-data">
			<fieldset>
				<legend>Importar Compras e Item
					<label style="float: right;">
						<button type="button" class="button small info detalhes" data-nome='Produto' data-formato='IdCliente, data, idProduto,  valor,  quantidade'>Detalhes</button>
					</label>
				</legend>
			</fieldset>
			<div style="float: left; width: 300px;">
				<input type="hidden" name='tipo' value="compraItens">
				<div class="input-control file">
					<input type="file" name='arquivo'/>
					<button class="btn-file"></button>
				</div>
			</div>
			<div style="float: right;">
				<button type="submit" class="primary">Enviar</button>
			</div>
		</form>
	</div>
	<div class="input-control switch importar" style="width: 100%;">
		<form method="post" action="importar/save"  enctype="multipart/form-data">
			<fieldset>
				<legend>Importar Compras
					<label style="float: right;">
						<button type="button" class="button small info detalhes" data-nome='Compra' data-formato=' IdCliente , data'>Detalhes</button>
					</label>
				</legend>
			</fieldset>
			<div style="float: left; width: 300px;">
				<input type="hidden" name='tipo' value="compra">
				<div class="input-control file">
					<input type="file" name='arquivo'/>
					<button class="btn-file"></button>
				</div>
			</div>
			<div style="float: right;">
				<button type="submit" class="primary">Enviar</button>
			</div>
		</form>
	</div>
	<div class="input-control switch importar" style="width: 100%;">
		<form method="post" action="importar/save"  enctype="multipart/form-data">
			<fieldset>
				<legend>Importar Itens
					<label style="float: right;">
						<button type="button" class="button small info detalhes" data-nome='Item' data-formato='idCliente , idProduto , valor , quantidade'>Detalhes</button>
					</label>
				</legend>
			</fieldset>
			<div style="float: left; width: 300px;">
				<input type="hidden" name='tipo' value="item">
				<div class="input-control file">
					<input type="file" name='arquivo'/>
					<button class="btn-file"></button>
				</div>
			</div>
			<div style="float: right;">
				<button type="submit" class="primary">Enviar</button>
			</div>
		</form>
	</div>
	<div class="input-control switch importar" style="width: 100%;">
		<form method="post" action="importar/save"  enctype="multipart/form-data">
			<fieldset>
				<legend>Importar Produtos
					<label style="float: right;">
						<button type="button" class="button small info detalhes" data-nome='Produto' data-formato='nome , valor , marca , modelo , idCategoria , descricao'>Detalhes</button>
					</label>
				</legend>
			</fieldset>
			<div style="float: left; width: 300px;">
				<input type="hidden" name='tipo' value="produto">
				<div class="input-control file">
					<input type="file" name='arquivo'/>
					<button class="btn-file"></button>
				</div>
			</div>
			<div style="float: right;">
				<button type="submit" class="primary">Enviar</button>
			</div>
		</form>
	</div>
	<div class="input-control switch importar" style="width: 100%;">
		<form method="post" action="importar/save"  enctype="multipart/form-data">
			<fieldset>
				<legend>Importar Clientes
					<label style="float: right;">
						<button type="button" class="button small info detalhes" data-nome='Cliente' data-formato='nome , dataNascimento , foto , sexo , funcao , email, telefone, idNota, idEstadoCivil, idLingua , idSistema'>Detalhes</button>
					</label>
				</legend>
			</fieldset>
			<div style="float: left; width: 300px;">
				<input type="hidden" name='tipo' value="cliente">
				<div class="input-control file">
					<input type="file" name='arquivo'/>
					<button class="btn-file"></button>
				</div>
			</div>
			<div style="float: right;">
				<button type="submit" class="primary">Enviar</button>
			</div>
		</form>
	</div>
</div>
<fieldset>
	<legend><i class="icon-accessibility on-left"></i>Exteções Permetidas
		<label style="float: right;">
			<button type="button" class="button small info ver">Ver</button>
		</label>
	</legend>
</fieldset>

<script type="text/javascript">

$(document).ready(function() {
	$(".detalhes").on('click', function(){
		formato = $(this).attr('data-formato');
		nome = $(this).attr('data-nome');
		$.Dialog({
			overlay: true,
			shadow: true,
			flat: true,
			draggable: true,
			icon: '<span class="icon-enter"></span>',
			title: 'Importar',
			content: '',
			padding: 10,
			onShow: function(_dialog){
				var content =
					'<div style="padding: 20px 20px 20px;">'+
					'<blockquote>Importar<h2>'+nome+'</h2></blockquote>'+
					'<h5>O arquivo deve estar no seguinte formato!!</h5>'+
					'<div class="span7" data-hint="Texto"><div class="text-center padding10 border">'+formato+'</div>'+
					'</div>';
				$.Dialog.title("Importar");
				$.Dialog.content(content);
			}
		});
	});
	$(".ver").on('click', function(){
		$.Dialog({
			overlay: true,
			shadow: true,
			flat: true,
			draggable: true,
			icon: '<span class="icon-enter"></span>',
			title: 'Importar',
			content: '',
			padding: 10,
			onShow: function(_dialog){
				var content =
					'<div style="padding: 20px 20px 20px;">'+
					'<blockquote>Importar</blockquote>'+
					'<h5>Esse modulo trabalha com as seguintes extenções...</h5>'+
					'<button class="shortcut link">CSV</button>'+
					'<button class="shortcut link">SQL</button>'+
					'<button class="shortcut link">TXT</button>'+
					'<button class="shortcut link">XML</button>'+
					'</div>';
				$.Dialog.title("Importar");
				$.Dialog.content(content);
			}
		});
	});
});
<?php if($sucesso == 1){?>
	new AlertaSucesso("Sucesso...", "Importação realizada com sucesso..");
<?php }?>
<?php if($error == 1){?>
	new AlertaError("Error...", "Arquivo em formato inválido! Verefique a extensão do arquivo CSV. Envie outro arquivo :(");
<?php }?>
<?php if($error == 2){?>
	new AlertaError("Error...", "O arquivo não conresponde com o esperado ... veja os detalhes da importação !!");
<?php }?>
</script>