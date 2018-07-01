<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Mensagens</a></li>
	</ul>
</div>
<div style="width: 60%; margin: auto; padding-bottom: 40px;">
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
					<th class="text-left">Mensagem</th>
					<th class="text-left">Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($mensagens as $row) {?>
				<tr style="text-align: center;">
					<td class="text-left"><?= $row->getApelido()?></td>
					<td style="width: 25%;">
						<a href="mensagem/editar/codigo/<?= $row->getCodigo(); ?>" style="float: left;">Editar</a>
					</td>
				</tr>
			<?php }?>
			</tbody>
		</table>
	</div>
</div>

