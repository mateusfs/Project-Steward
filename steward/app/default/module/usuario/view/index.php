<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Usuários</a>
		</li>
	</ul>
</div>
<div style="float: right;">
	<nav class="horizontal-menu">
		<ul>
			<li><a class="dropdown-toggle" href="#"><img src="../web/img/icon/list.png"></a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a tabindex="-1" href="PerfilUsuario/index">Incluir Usuários</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<div style="padding: 30px 30px 35px">
	<div id="dataTables-1_wrapper" class="dataTables_wrapper">
		<div class="dataTables_length" id="dataTables-1_length">
			<form action="usuario/index" method="post" >
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
		<form action="usuario/index" method="post" >
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
					<th class="text-left sorting" style="width: 250px;">Email</th>
					<th class="text-left sorting" >Grupo</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($usuarios as $usuario){
						$grupo = Grupo::retrieveByPk($usuario->getIdGrupo());
					?>
					<tr class="tdlink" style="cursor: pointer;"
						data-link='perfilUsuario/index/codigo/<?= $usuario->getCodigo()?>'>
						<th class="text-left"><?= $usuario->getNome(); ?></th>
						<th class="text-left"><?= $usuario->getEmail(); ?></th>
						<th class="text-left"><?= $grupo->getNome(); ?></th>
					</tr>
				<?php }
					if(!$usuarios){?>
					<tr>
						<th colspan="3" class="text-left">Não tem usuários por aqui!</th>
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
			window.location = 'usuario/index/expo/'+valor;
		});
	});
</script>