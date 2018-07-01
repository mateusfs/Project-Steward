<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Compra</a>
		</li>
	</ul>
</div>
<div style="float: right;">
	<nav class="horizontal-menu">
		<ul>
			<li><a class="dropdown-toggle" href="#"><img src="../web/img/icon/list.png"></a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a tabindex="-1" href="compra/deletar">Deletar Compra</a></li>
					<li><a tabindex="-1" href="compra/novo">Incluir Compra</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<div style="margin-top: 50px;">
		<div style="width: 50% ; margin: auto;">
			<fieldset>
				<legend>Compra</legend>
				<blockquote>Cliente
					<h2><?= $cliente->getNome();?></h2>
				</blockquote>
				<br/>
				<fieldset>
					<legend><font>Itens</font></legend>
					<table class="table hovered" style="margin: auto;">
						<thead>
							<tr>
								<th class="text-left">Produto</th>
								<th class="text-left">Valor</th>
								<th class="text-left">Quantidade</th>
							</tr>
						</thead>
						<?php foreach ($itens as $row) {
							$produto = Produto::retrieveByPk($row->getIdProduto())
						?>
						<tbody>
							<tr>
								<td><?= $produto->getNome();?></td>
								<td><?= NumberUtils::format($row->getvalor());?></td>
								<td><?= $row->getQuantidade();?></td>
							</tr>
						</tbody>
						<?php } ?>
					</table>

			</fieldset>
				<a href="compra"><button type="button" class="button inverse large" style="margin-top: 50px; float: right;">Voltar</button></a>
			</fieldset>
		</div>
</div>
<script type="text/javascript">
$(function(){
	$('#valor').maskMoney();
});
</script>