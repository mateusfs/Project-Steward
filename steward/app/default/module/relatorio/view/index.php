<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Relatórios</a>
		</li>
	</ul>
</div>
<div>
	<div style="margin: 20px;">
		<fieldset>
			<legend>Relatórios</legend>
			<form method="post" action="relatorio/gerar" enctype="multipart/form-data">
				<div style="width: 80%; margin: auto;">
					<div class="input-control select">
						<select name="relatorio" style="width: 80%">
							<option value="cliente">Relatótio de Clientes</option>
							<option value="mensal">Relatótio Mensal</option>
							<option value="produto">Relatótio de Produtos</option>
							<option value="sistema">Relatótio de Sistema</option>
							<option value="tarefa">Relatótio de Tarefas</option>
						</select>
						<button type="submit" class="button large">Gerar</button>
					</div>
				</div>
			</form>
		</fieldset>
	</div>
</div>