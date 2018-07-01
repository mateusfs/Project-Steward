<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Empresas</a>
		</li>
	</ul>
</div>
<div style="float: right;">
	<nav class="horizontal-menu">
		<ul>
			<li><a class="dropdown-toggle" href="#"><img src="../web/img/icon/list.png"></a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a tabindex="-1" href="empresa/deletarEmpresa/codigo/<?= $empresa->getCodigo() ?>">Deletar Empresa</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<div style="margin-top: 50px;">
	<form method="post" action="empresa/salvaEmpresa">
		<div style="float: left;">
			<fieldset>
				<legend>Empresa</legend>
				<label>Nome</label>
				<div class="input-control text size3" data-role="input-control">
					<input type="text" placeholder="Nome" value="<?= $empresa->getNome();?>" name="nome">
					<input type="hidden" name="codigo" value="<?= $empresa->getCodigo()?>">
					<button class="btn-clear" tabindex="-1" type="button"></button>
				</div>
				<div style="padding-rigth: 50px;">
					<div class="button-set" data-role="button-group">
						<button class="<?= ($empresa->getIdStatus() == 1)?'active':''; ?> small status" data-tipo='empresa' data-codigo='<?= $empresa->getCodigo(); ?>'>Ativado</button>
						<button class="<?= ($empresa->getIdStatus() == 0)?'active':''; ?> small status" data-tipo='empresa' data-codigo='<?= $empresa->getCodigo(); ?>'>Desativado</button>
					</div>
				</div>
				<br>
				<button type="submit" class="button"
					style="padding: 8px; width: 70px;">Salvar</button>
			</fieldset>
		</div>
	</form>
	<br/><br/>
	<div style="float: right; width: 400px;">
		<div>
			<fieldset>
				<legend>Sistemas</legend>
				<label>Incluir Sistema</label>
				<form method="post" action="empresa/salvaSistema">
					<div class="input-control text size3" data-role="input-control">
						<input type="text" placeholder="Nome" name='nome'>
						<input type="hidden" name="codigo" value="<?= $empresa->getCodigo()?>">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
					<button type="submit" class="button"
						style="padding: 8px; width: 70px;">Incluir</button>
				</form>
				<table class="table hovered">
					<thead>
						<tr>
							<th class="text-left">Nome</th>
							<th class="text-left">Status</th>
							<th class="text-left">Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($sistemas as $row) {?>
						<tr style="text-align: center;">
							<td class="text-left"><?= $row->getNome(); ?></td>
							<td>
								<div class="button-set" data-role="button-group">
									<button class="<?= ($row->getIdStatus() == 1)?'active':''; ?> mini status" data-tipo='sistema' data-codigo='<?= $row->getCodigo(); ?>'>Ativado</button>
									<button class="<?= ($row->getIdStatus() == 0)?'active':''; ?> mini status" data-tipo='sistema' data-codigo='<?= $row->getCodigo(); ?>'>Desativado</button>
								</div>
							</td>
							<td><a href="empresa/deletarSistema/codigo/<?= $row->getCodigo(); ?>"
								style="float: left;">Apagar</a>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</fieldset>
		</div>
	</div>
</div>
<script type="text/javascript">
<?php if($error == 1){?>
	new AlertaError("Atenção...", "Encontramos um Sistema com o mesmo nome!!");
<?php }?>
<?php if($error == 2){?>
	new AlertaError("Atenção...", "<p style='text-align: center;'>Existem sistemas vinculados com está empresa!! <br/><font size='4px'><?= $empresa->getNome()?></font></p>");
<?php }?>
<?php if($error == 3){?>
	new AlertaError("Atenção...", "Existem clientes vinculados com este sistema!!");
<?php }?>
$(document).ready(function(){
	$('.status').click( function(){
		url = 'empresa/salvaStatus';
		codigo  = $(this).attr('data-codigo');
		tipo  = $(this).attr('data-tipo');
		data = {codigo: codigo, tipo: tipo};
		$.ajax({
			type: "POST",
			url: url,
			data: data
		});
	});
});
</script>
