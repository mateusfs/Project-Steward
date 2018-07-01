<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Categorias</a>
		</li>
	</ul>
</div>
<div style="float: right;">
	<nav class="horizontal-menu">
		<ul>
			<li><a class="dropdown-toggle" href="#"><img src="../web/img/icon/list.png"></a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a tabindex="-1" href="categoria/editar">Incluir Categoria</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<div style="width: 50%; margin: auto; padding-bottom: 40px;">
	<div style="margin-top: 25px; float: right; padding-bottom: 20px;">
		<form action="categoria/index" method="post" >
			<div>
				<div class="input-control text size2">
					<input type="text" name="busca"/>
					<button class="btn-search" type="submit"></button>
				</div>
			</div>
		</form>
	</div>
	<div>
		<table class="table hovered" style="margin: auto;">
			<thead>
				<tr>
					<th class="text-left" style="width: 70%;">Nome</th>
					<th class="text-left">Produtos</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($categorias as $row) {
					$produtos = Produto::retrieveByCategoria($row->getCodigo());
			?>
				<tr style="text-align: center;" class="tdlink" data-link="categoria/editar/codigo/<?= $row->getCodigo(); ?>" title="Ver">
					<td class="text-left" style="width: 250px;"><?= $row->getNome() ?></td>
					<td class="text-left" style="width: 250px;"><?= count($produtos) ?></td>
				</tr>
			<?php }
				if(!$categorias){?>
				<tr>
					<th colspan="3" class="text-left">Não tem categorias por aqui!</th>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.tdlink').click( function(){
			link = $(this).attr('data-link');
			window.location = link;
		});
	});
</script>