<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Produto</a>
		</li>
	</ul>
</div>
<div style="float: right;">
	<nav class="horizontal-menu">
		<ul>
			<li><a class="dropdown-toggle" href="#"><img src="../web/img/icon/list.png"></a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a tabindex="-1" href="produto/editar">Novo Produto</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<div style="padding: 30px 30px 35px">
	<div id="dataTables-1_wrapper" class="dataTables_wrapper">
		<div class="dataTables_length" id="dataTables-1_length">
			<form action="produto/index" method="post" >
				<label>
					<font>Exposição</font>
						<select	name="expo" id='expo'>
							<option value="15" <?=($expo == 15)?"selected":"";?>>15</option>
							<option value="25" <?=($expo == 25)?"selected":"";?>>25</option>
							<option value="50" <?=($expo == 50)?"selected":"";?>>50</option>
							<option value="100" <?=($expo == 100)?"selected":"";?>>100</option>
						</select>
				</label>
			</form>
		</div>
		<form action="produto/index" method="post" >
			<div style="margin-left: 70%;">
					<font>Pesquisar:</font>
					<div class="input-control text size2">
						<input type="text" name="busca"/>
						<button class="btn-search" type="submit"></button>
					</div>
			</div>
		</form>
		<div id="dataTables-1_processing" class="dataTables_processing"
			style="visibility: hidden;">
			<font><font>Processing ...</font></font>
		</div>
		<table class="table striped hovered dataTable" id="dataTables-1">
			<thead>
				<tr>
					<th class="text-left sorting_asc" style="width: 300px;">Nome</th>
					<th class="text-left sorting" style="width: 200px;">Marca</th>
					<th class="text-left sorting" >Modelo</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($produtos as $produto) {?>
					<tr class="tdlink" style="cursor: pointer;"
						data-link='produto/mostra/codigo/<?= $produto->getCodigo()?>'>
						<th class="text-left"><?= $produto->getNome(); ?></th>
						<th class="text-left"><?= $produto->getMarca(); ?></th>
						<th class="text-left"><?= $produto->getModelo();?></th>
					</tr>
				<?php }
					if(!$produtos){?>
					<tr>
						<th colspan="3" class="text-left">Não tem Produtos por aqui!</th>
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
		$('#expo').click( function(){
			valor = $(this).val();
			window.location = 'produto/index/expo/'+valor;
		});

		<?php if($error == 1){?>
		new AlertaError("Atenção...", "O nome deve ser informado!!");
		<?php }?>
		<?php if($error == 2){?>
		new AlertaError("Atenção...", "O Modelo deve ser informado!!");
		<?php }?>
		<?php if($error == 3){?>
		new AlertaError("Atenção...", "A Marca deve ser informada!!");
		<?php }?>
		<?php if($error == 4){?>
		new AlertaError("Atenção...", "O Valor deve ser informado!!");
		<?php }?>
	});
</script>