<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Grupos de Usuários</a>
		</li>
	</ul>
</div>
<div style="float: right;">
	<nav class="horizontal-menu">
		<ul>
			<li><a class="dropdown-toggle" href="#"><img src="../web/img/icon/list.png"></a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a tabindex="-1" href="grupo/novo">Incluir Grupo</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<div style="width: 70%; margin: auto; padding-bottom: 40px;">
	<div style="margin-top: 25px; float: right; padding-bottom: 20px;">
		<div class="input-control text size3">
			<input type="text" />
			<button class="btn-search"></button>
		</div>
	</div>
	<div>
		<table class="table hovered" style="margin: auto;">
			<thead>
				<tr>
					<th class="text-left">Nome</th>
					<th class="text-left">Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($grupos as $row) {?>
				<tr style="text-align: center;">
					<td class="text-left"><?= $row->getNome(); ?></td>
					<td style="width: 25%;">
						<a href="grupo/novo/codigo/<?= $row->getCodigo(); ?>" style="float: left;">Editar</a>
					</td>


				</tr>
			<?php }?>
			</tbody>
		</table>
	</div>
</div>