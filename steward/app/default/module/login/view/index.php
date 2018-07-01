<div class="login">
	<div>
		<h1 style="margin-left: 50px;"><a href="index">Steward</a></h1>
	</div>
	<div>
		<br> <br>
		<div style="margin-left: 65px;">
			<img src="../web/img/entrar.png" width="120">
		</div>
		<br>
		<div>
			<form method="post" action="login/logando">
				<fieldset>
					<legend>
						<font><font class="">Logar</font> </font>
					</legend>
					<div class="input-control text" data-role="input-control">
						<input type="email" placeholder="E-mail" name='email'>
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
					<div class="input-control password" data-role="input-control">
						<input type="password" placeholder="Senha" name='senha'>
						<button class="btn-reveal" tabindex="-1" type="button"></button>
					</div>
					<div class="input-control checkbox" data-role="input-control">
						<label>
							<input type="checkbox" >
							<span class="check"></span>
							<font>Manter logado</font>
						</label>
					</div>
					<br>
					<button type="submit" style="width: 250px;" class="button large primary">Entrar</button>
				</fieldset>
			</form>
		</div>
	</div>
	<div style="margin-top: 20px; text-align: center;"><h6>Já possui uma conta? <a href="perfilUsuario/index"> Entre agora</a></h6></div>
</div>

<script type="text/javascript">
<?php if($error == 1){?>
	new AlertaError("Atenção...", "Insira dados para autenticação!");
<?php }?>
<?php if($error == 2){?>
	new AlertaError("Atenção...", "E-mail não cadastrado ou incorreto!!");
<?php }?>
<?php if($error == 3){?>
	new AlertaError("Atenção...", "Senha Incorreta!!!!");
<?php }?>
<?php if($sucesso == 1){?>
	new AlertaSucesso("Olá...", "Por Favor faça seu login!!!!");
<?php }?>
</script>

