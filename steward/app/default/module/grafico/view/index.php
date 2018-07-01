<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Gráficos</a>
		</li>
	</ul>
</div>
<div>
	<div style="margin: 20px;">
		<fieldset>
			<legend>Gráficos</legend>
			<form method="post" action="grafico/gerar" enctype="multipart/form-data">
				<div style="width: 80%; margin: auto;">
					<div class="input-control select">
					<select name="grafico" style="width: 80%;">
						<?php foreach ($graficos as $row) {?>
							<option value="<?= $row->getNome() ?>"><?= $row->getApelido() ?></option>
						<?php }?>
					</select>
						<button type="submit" class="button large">Gerar</button>
					</div>
				</div>
			</form>
		</fieldset>
	</div>
</div>


