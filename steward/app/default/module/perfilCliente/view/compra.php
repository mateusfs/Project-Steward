<?php
foreach ($compras as $compra) {
	$cliente = Cliente::retrieveByPk ($compra->getIdCliente ());
	$itens  = Item::retrieveByCompra($compra->getCodigo());
?>
<div>
	<div>
		<fieldset>
				<legend>Compra - <?= $compra->getCodigo()?></legend>
				<h4><?= $cliente->getNome();?></h4>
				<h5>Data - <?= ($compra->getData())?$compra->getData():date('d/m/Y')?></h5>
				<fieldset style="width: 70%; margin-top:-30px; float: right;">
					<legend><font>Itens</font></legend>
					<table class="table hovered" style="margin: auto;  margin-top:-30px;">
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
			</fieldset>
	</div>
</div>
<?php }?>