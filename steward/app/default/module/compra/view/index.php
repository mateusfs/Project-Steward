<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Compras</a>
		</li>
	</ul>
</div>
<div style="float: right;">
	<nav class="horizontal-menu">
		<ul>
			<li><a class="dropdown-toggle" href="#"><img src="../web/img/icon/list.png"></a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a tabindex="-1" href="compra/novo">Incluir Compra</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<div style="width: 80%; margin: auto; padding-bottom: 40px;">
	<div style="margin-top: 25px; float: right; padding-bottom: 20px;">
		<form action="compra/index" method="post" >
			<div class="input-control text size3">
				<input type="text" name="busca"/>
				<button class="btn-search" type="submit"></button>
			</div>
		</form>
	</div>
	<div>
		<table class="table hovered" style="margin: auto;">
			<thead>
				<tr>
					<th class="text-left">Compra</th>
					<th class="text-left">Cliente</th>
					<th class="text-left">Itens</th>
					<th class="text-left">Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($compras as $row) {
					$cliente = Cliente::retrieveByPk($row->getIdCliente());
					$itens = Item::retrieveByCompra($row->getCodigo());
				?>
				<tr style="text-align: center;">
					<td class="text-left"><?= $row->getCodigo(); ?></td>
					<td class="text-left"><?= $cliente->getNome()?></td>
					<td class="text-left"><?= count($itens)?></td>
					<td style="width: 25%;">
						<a href="compra/editar/codigo/<?= $row->getCodigo(); ?>" style="float: left;">Ver</a>
					</td>
				</tr>
			<?php }
				if(!$compras){?>
				<tr>
					<th colspan="4" class="text-left">Não tem compas por aqui!</th>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>