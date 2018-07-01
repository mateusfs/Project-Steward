<?php
$administrador = null;
$idUsuario = null;

if ($usuarioPerfil->getCodigo() != null) {

	$administrador = SessaoUtils::sessionGet('USUARIO')->getAdministrador();
	$idUsuario = SessaoUtils::sessionGet('USUARIO')->getCodigo();
}


?>
<div>
	<form method="post" action="perfilUsuario/salvar" enctype="multipart/form-data">
		<div>
			<div style="float: left; margin: auto; margin-left: 100px;">
				<div style="margin-left: 50px; margin-top: 50px; width: 150px;">
				<?php if($usuarioPerfil->getFoto()){ ?>
				<img src="../web/files/usuario/<?= $usuarioPerfil->getFoto()?>"
						class="rounded bd-amber" alt="120x120"
						style="width: 120px; height: 120px;">
				<?php }else{?>
				<img src="../web/img/imagem120.png" class="rounded bd-amber"
						alt="120x120" style="width: 120px; height: 120px;">
				<?php }?>
				<?php
				if ($usuario !=  null){
				$moduloUplaod =  Modulo::retrieveByNome('UPLOAD_USUARIO');
				$moduloGrupoUsuario = GrupoModulo::retrieveByPk($usuario->getIdGrupo(), $moduloUplaod->getCodigo());
				if($moduloUplaod->getIdStatus() == 1 && $moduloGrupoUsuario->getIdStatus() == 1){
				?>
					<div class="input-control file size2" style="margin-top: 10px;">
						<input type="file" name="foto" id='foto' />
						<button class="btn-file"></button>
					</div>
				<?php }
				}else{?>
					<div class="input-control file size2" style="margin-top: 10px;">
						<input type="file" name="foto" id='foto' />
						<button class="btn-file"></button>
					</div>
				<?php }?>
				</div>
			</div>
		<div class='clear'></div>
		<div style="margin-top: 50px; padding: 20px 20px 30px; width: 90%; margin: auto;">
			<div style="float: left">
				<div>
					<label>Nome</label>
					<div class="input-control text size3" data-role="input-control">
						<input type="text" placeholder="Nome"
							value="<?= $usuarioPerfil->getNome();?>" name="nome">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				</div>
				<div>
					<label>E-mail</label>
					<div class="input-control text size3" data-role="input-control">
						<input type="text" placeholder="E-mail"
							value="<?= $usuarioPerfil->getEmail();?>" name="email">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				</div>

				<div>
					<label>Função</label>
					<div class="input-control text size3" data-role="input-control">
						<input type="text" placeholder="Função"
							value="<?= $usuarioPerfil->getFuncao();?>" name="funcao">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				</div>
			</div>
			<div style="float: right;">
				<div>
					<label>Telefone</label>
					<div class="input-control text size3" data-role="input-control">
						<input type="text" placeholder="Telefone"
							value="<?= $usuarioPerfil->getTelefone();?>" name="telefone">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				</div>
				<div>
					<label>Sexo</label>
					<div class="input-control select">
						<select name="sexo">
							<option <?= ($usuarioPerfil->getSexo() == 'M')?'checked':""?>
								value="M">Masculino</option>
							<option <?= ($usuarioPerfil->getSexo() == 'F')?'checked':""?>
								value="F">Femenino</option>
						</select>
					</div>
				</div>
			<?php
			if(SessaoUtils::sessionGet('USUARIO')){
				if(SessaoUtils::sessionGet('USUARIO')->getAdministrador()){
					if($usuarioPerfil->getAdministrador() === 'S'){
				?>
				<div>
					<label>Adminstrador</label>
					<div class="input-control select">
						<select name="administrador">
							<option
								<?= ($usuarioPerfil->getAdministrador() === 'S')?'selected':"";?>
								value="S">Sim</option>
							<option
								<?= ($usuarioPerfil->getAdministrador() === 'N')?'selected':"";?>
								value="N">Não</option>
						</select>
					</div>
				</div>
				<div>
					<label>Grupo de Usúario</label>
				<?php $grupo  = Grupo::retrieveAll(); ?>
				<div class="input-control select">
						<select name="grupo">
				<?php foreach ($grupo as $row) {?>
						<option value="<?= $row->getCodigo()?>"
								<?= ($row->getCodigo() == $usuarioPerfil->getIdGrupo())?'selected':"" ?>>
							<?= $row->getNome()?>
						</option>
				<?php }?>
					</select>
					</div>
				</div>
			<?php }}}?>
		</div>
			<div class="clear"></div>
		<?php if($administrador  === 'S' || $usuarioPerfil->getCodigo() == $idUsuario ||$usuarioPerfil->getCodigo() == NULL){?>
			<fieldset>
				<legend>
					<font><font class=""><?= ($usuarioPerfil->getCodigo() != NULL)?"Alterar Senha":"Senha";?></font></font>
				</legend>
				<?php if($usuarioPerfil->getCodigo() != NULL){?>
				<div>
					<label>Senha Atual</label>
					<div class="input-control text size3" data-role="input-control">
						<input type="password" placeholder="Senha Atual" name="atual">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				</div>
				<?php }?>
				<div style="float: left;">
					<label>Nova Senha</label>
					<div class="input-control text size3" data-role="input-control">
						<input type="password" placeholder="Nova Senha" name="nova">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				</div>
				<div style="float: right;">
					<label>Redigite a Senha</label>
					<div class="input-control text size3" data-role="input-control">
						<input type="password" placeholder="Redigite a Senha" name="senha">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				</div>
			</fieldset>
			<div class="clear"></div>
		<?php }else{ ?>
				<fieldset>
					<legend>
						<font class="">Senha</font>
					</legend>
				<div style="float: left;">
					<label>Nova Senha</label>
					<div class="input-control text size3" data-role="input-control">
						<input type="password" placeholder="Nova Senha" name="nova">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				</div>
				<div style="float: right;">
					<label>Redigite a Senha</label>
					<div class="input-control text size3" data-role="input-control">
						<input type="password" placeholder="Redigite a Senha" name="senha">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				</div>
			</fieldset>
			<div class="clear"></div>
		<?php } ?>
			<input type="hidden" value="<?= $usuarioPerfil->getCodigo();?>"	name="codigo" />
			<button type="submit" class="button large" style="margin-top: 50px;">Salvar</button>
		</div>
	</div>
	</form>
</div>

