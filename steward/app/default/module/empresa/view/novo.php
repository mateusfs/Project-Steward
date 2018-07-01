<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Empresas</a>
		</li>
	</ul>
</div>
<div style="width: 70%; margin: auto; margin-top:50px; padding-bottom: 40px;">
	<div>
		<form method="post" action="empresa/salvarNovo">
				<fieldset>
					<legend>
						<font><font class="">Nova Empresa</font></font>
					</legend>
					<div class="input-control text" data-role="input-control">
						<input type="text" placeholder="Nome" name='nome'>
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
					<div class="input-control select">
						<select name="status">
							<option	value="1">Ativo</option>
							<option	value="0">Desativado</option>
						</select>
					</div>
					<br>
					<button type="submit" class="button large">Salvar</button>
				</fieldset>
			</form>
	</div>
</div>
<script type="text/javascript">
<?php if($error == 1){?>
	new AlertaError("Atenção...","Encontramos uma Empresa com o mesmo nome!!");
<?php }?>
</script>