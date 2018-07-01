<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Importar CSV</a>
		</li>
	</ul>
</div>
<div style="padding: 10px 10px 10px 10px; width: 600px; margin: auto; margin-top: 50px;">
	<form method="post" action="importar/saveCsv">
	<fieldset>
		<legend>Importar Compras e Item</legend>
		<div style="float: left; width: 350px;" >
			<input type="hidden" name='tipo' value="compraItens">
			<div class="input-control file">
				<input type="file" name='arquivo'/>
				<button class="btn-file"></button>
			</div>
		</div>
		<div style="float: right;">
			<button type="button" class="default detalhes" data-nome='Compra e Item' data-formato='IdCliente,data,produto,valor,quantidade'>Detalhes</button>
			<button type="submit" class="primary">Enviar</button>
		</div>
	</fieldset>
	</form>
</div>
<div style="padding: 10px 10px 10px 10px; width: 600px; margin: auto;">
	<form method="post" action="importar/saveCsv">
	<fieldset>
		<legend>Importar Compras</legend>
		<div style="float: left; width: 350px;" >
			<input type="hidden" name='tipo' value="compra">
			<div class="input-control file">
				<input type="file" name='arquivo'/>
				<button class="btn-file"></button>
			</div>
		</div>
		<div style="float: right;">
			<button type="button" class="default detalhes" data-nome='Compra' data-formato='IdCliente,data'>Detalhes</button>
			<button type="submit" class="primary">Enviar</button>
		</div>
	</fieldset>
	</form>
</div>
<div style="padding: 10px 10px 10px 10px; width: 600px; margin: auto;">
	<form method="post" action="importar/saveCsv">
	<fieldset>
		<legend>Importar Itens</legend>
		<div style="float: left; width: 350px;">
			<input type="hidden" name='tipo' value="item">
			<div class="input-control file">
				<input type="file" name='arquivo'/>
				<button class="btn-file"></button>
			</div>
		</div>
		<div style="float: right;">
			<button type="button" class="default detalhes" data-nome='Item' data-formato='idCliente,produto,valor,quantidade'>Detalhes</button>
			<button type="submit" class="primary">Enviar</button>
		</div>
	</fieldset>
	</form>
</div>
<div style="padding: 10px 10px 10px 10px; width: 600px; margin: auto;">
	<form method="post" action="importar/saveCsv">
	<fieldset>
		<legend>Importar Produto</legend>
		<div style="float: left; width: 350px;">
			<input type="hidden" name='tipo' value="produto">
			<div class="input-control file">
				<input type="file" name='arquivo'/>
				<button class="btn-file"></button>
			</div>
		</div>
		<div style="float: right;">
			<button type="button" class="default detalhes" data-nome='Produto' data-formato='nome,valor,marca,modelo,idCategoria,descricao'>Detalhes</button>
			<button type="submit" class="primary">Enviar</button>
		</div>
	</fieldset>
	</form>
</div>
