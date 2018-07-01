<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Compra</a>
		</li>
	</ul>
</div>
<div style="width: 70%; margin: auto; margin-top:50px; padding-bottom: 40px;">
	<div>
		<form method="post" action="compra/salvar">
				<fieldset>
					<legend>
						<font><font class="">Nova Compra</font></font>
					</legend>
					<div>
						<label>Cliente</label>
						<div class="input-control select">
							<select name="cliente">
							<?php
							$clientes  = Cliente::retrieveAtivos();
							foreach ($clientes as $row) {?>
								<option value="<?= $row->getCodigo()?>">
									<?= $row->getNome() ?>
								</option>
							<?php }?>
							</select>
						</div>
					</div>
					<fieldset>
					<legend><font>Itens</font></legend>
					<table class="table hovered" style="margin: auto;" id='adiconaItem'>
						<thead>
							<tr>
								<th class="text-left">Produto</th>
								<th class="text-left">Valor</th>
								<th class="text-left">Quantidade</th>
								<th class="text-left">Ações</th>
							</tr>
						</thead>
						<tbody>
							<tr id='removeItem'>
								<th colspan="4" class="text-left">Não tem Item por aqui!</th>
							</tr>
						</tbody>
					</table>
					<button type="button" class="button default incluir" style="margin-top: 30px; float: right;">Incluir Item</button>


					</fieldset>
					<div style="float: right; margin-top: 50px;">
					<a href="produto">
						<button type="button" class="button inverse large">Voltar</button>
					</a>
				</div>
				<div style="float: left; margin-top: 50px;">
					<button type="submit" class="button large">Salvar</button>
				</div>

				</fieldset>
			</form>
	</div>
</div>
<div>
	<div id='divJanelaFundo'></div>
	<div id="divJanela">
		<div class="window flat shadow">
			<div class="caption">
				<span class="icon icon-cart"></span>
				<div class="title">Novo Item</div>
				<button class="btn-close"></button>
			</div>
			<div style="padding: 20px 20px 20px;">
				<div style="margin-top: 50px;">
					<label>Produtos</label>
					<div class="input-control select">
						<select name="produtos" class="produto">
						<?php
						$produtos = Produto::retrieveAtivos();
						foreach ($produtos as $row) {?>
							<option value='<?= $row->getCodigo() ?>' data-nome="<?= $row->getNome()?>"><?= $row->getNome()?></option>
						<?php }?>
						</select>
						<div>
							<label>Valor</label>
							<div class="input-control text size3" data-role="input-control">
								<input type="text" placeholder="Valor" name="Valor" id="valor" class="valor">
								<button class="btn-clear" tabindex="-1" type="button"></button>
							</div>
						</div>
						<div>
							<label>Quantidade</label>
							<div class="input-control text size3" data-role="input-control">
								<input type="text" placeholder="Quantidade" name="quantidade" class="quantidade">
								<button class="btn-clear" tabindex="-1" type="button"></button>
							</div>
						</div>
					</div>
					<button type="button" class="button primary" id='salvaItem' style="margin-top: 50px;">Salvar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

$(document).ready(function() {

	$(".incluir").click(function (){

		$("#divJanela").fadeToggle("fast");
		$("#divJanelaFundo").css("width",$(document ).width() + "px");
		$("#divJanelaFundo").css("height",$(document ).height() + "px");
		$("#divJanelaFundo").fadeToggle("fast");

		$('html,body').animate({scrollTop: 0},'slow');
	});

	$("#adiconaItem").on('click', '.excluir', function (e){
		$(this).parent().parent().remove();
	});

	$(function(){
		$('#valor').maskMoney();
	});

	$(document).keydown(function (ev){
		if(ev.keyCode == 27){
			$("#divJanelaFundo").fadeOut('fast');
			$("#divJanela").fadeOut("fast");
		}
	});

	$(".btn-close").click(function () {
		$("#divJanelaFundo").fadeOut('fast');
		$("#divJanela").fadeOut("fast");
	});

	$("#divJanelaFundo").click(function () {
		$("#divJanelaFundo").fadeOut('fast');
		$("#divJanela").fadeOut("fast");
	});

	$("#salvaItem").click(function (){
		var valor = $(".valor").val();
		var quantidade = $(".quantidade").val();
		var produto = $(".produto option:selected").val();
		var nomeProduto = $(".produto option:selected").attr('data-nome');
		if(valor == null || valor == ""){
			new AlertaError("Atenção", "Valor não pode ser nulo");
			return;
		}

		if(quantidade == null || quantidade == ""){
			new AlertaError("Atenção", "Quantidade não pode ser nula");
			return;
		}
		if(isNaN(quantidade)){
			new AlertaError("Atenção", "Valor deve ser número");
			return;
		}
		if(valor != null && quantidade != null){
			if($("#removeItem")){
				$("#removeItem").remove();
			}

			$("#adiconaItem").append('<tr><td class="text-left">'+ nomeProduto +'</td><td class="text-left">'+ valor +'</th><td class="text-left">'+quantidade+'</td><td class="text-left"><a style="cursor:pointer;" class="excluir">Deletar</a></td></tr><input type="hidden"  name="produtos[]" value="'+ produto +'"/><input type="hidden"  name="valor[]" value="'+ valor +'"/><input type="hidden"  name="quantidade[]" value="'+ quantidade +'"/>');

			$("#divJanelaFundo").fadeOut('fast');
			$("#divJanela").fadeOut("fast");
		}
	});
});

<?php if($error == 1){?>
		new AlertaError(':(', 'Uma compra não pode conter duas vezes o mesmo produto!');
<?php }?>

</script>