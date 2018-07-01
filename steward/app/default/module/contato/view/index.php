<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Contato</a></li>
	</ul>
</div>
<div style="margin-top: 50px;">
		<div style="width: 60% ; margin: auto;">
			<form action="contato/salvar" method="post">
				<fieldset>
						<legend><font>Contato</font></legend>
						<label>Nome</label>
						<div class="input-control text" data-role="input-control">
							<input type="text" placeholder="Nome" name="nome">
							<button class="btn-clear" tabindex="-1" type="button"></button>
						</div>
						<label>Email</label>
						<div class="input-control text" data-role="input-control">
							<input type="email" placeholder="Email" name="email">
							<button class="btn-clear" tabindex="-1" type="button"></button>
						</div>
						<div class="input-control textarea">
							<label>Comentário</label>
							<textarea name="comentario" placeholder="Comentário"></textarea>
						</div>
					<button type="submit" class="button inverse large" style="margin-top: 50px; float: right;">Enviar</button>
				</fieldset>
			</form>
		</div>
</div>