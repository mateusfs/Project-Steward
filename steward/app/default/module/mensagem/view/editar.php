<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Mensagem</a>
		</li>
	</ul>
</div>
<div style="margin-top: 50px;">
		<div style="width: 50% ; margin: auto;">
			<fieldset>
				<legend>Mensagem</legend>
				<form method="post" action="mensagem/salvar">
					<input type="hidden" value="<?= $mensagem->getCodigo()?>" name="codigo">
					<div class="input-control text size3" data-role="input-control">
						<input type="text" placeholder="Apelido" value="<?= $mensagem->getApelido();?>" name="apelido">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
					<div class="input-control textarea" data-role="input-control">
						<textarea placeholder="Texto" name="texto"><?= $mensagem->getTexto();?></textarea>
					</div>
					<div style="float: right; margin-top: 50px;">
					<a href="mensagem/index">
						<button type="button" class="button inverse large">Voltar</button>
					</a>
					</div>
					<div style="float: left; margin-top: 50px;">
						<button type="submit" class="button large">Salvar</button>
					</div>
				</form>
			</fieldset>
		</div>
</div>