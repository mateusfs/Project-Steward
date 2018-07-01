<div>
	<form method="post" action="perfilCliente/salvar" enctype="multipart/form-data">
	<div>
		<div style="float: left; margin: auto; margin-left: 50px;">
			<div style="margin-left: 50px; margin-top: 50px; width: 150px;">
				<?php if($cliente->getFoto()){ ?>
				<img src="../web/files/cliente/<?= $cliente->getFoto()?>" class="rounded bd-amber" alt="120x120" style="width: 120px; height: 120px;">
				<?php }else{?>
				<img src="../web/img/imagem120.png" class="rounded bd-amber" alt="120x120" style="width: 120px; height: 120px;">
				<?php }?>
				<?php
				$moduloUplaod =  Modulo::retrieveByNome('UPLOAD_CLIENTE');
				$moduloGrupoUsuario = GrupoModulo::retrieveByPk($usuario->getIdGrupo(), $moduloUplaod->getCodigo());
				if($moduloUplaod->getIdStatus() == 1 && $moduloGrupoUsuario->getIdStatus() == 1){
				?>
				<div class="input-control size2 file" style="margin-top: 10px;">
					<input type="file" name="foto" id="foto"/>
					<button class="btn-file"></button>
				</div>
				<?php }?>
			</div>
		</div>
		<div style="margin-top: 50px; width: 40%; float: left;">
			<div class="rating large active">
				<ul>
					<?php $nota = $cliente->getIdNota();
					for ($i = 0; $i < $nota; $i++) {?>
					<li class="rated"></li>
					<?php }?>
				</ul>
			</div>
		</div>
	</div>
	<div class='clear'></div>
	<div style="margin-top: 50px; padding: 20px 20px 30px; width: 90%; margin: auto;">
		<div style="float: left">
			<div>
				<label>Nome</label>
				<div class="input-control text size3" data-role="input-control">
					<input type="text" placeholder="Nome" value="<?= $cliente->getNome();?>" name="nome">
					<button class="btn-clear" tabindex="-1" type="button"></button>
				</div>
			</div>
			<div>
				<label>E-mail</label>
				<div class="input-control text size3" data-role="input-control">
					<input type="text" placeholder="E-mail" value="<?= $cliente->getEmail();?>" name="email">
					<button class="btn-clear" tabindex="-1" type="button"></button>
				</div>
			</div>
			<div>
				<label>Lingua</label>
				<div class="input-control select">
				<select name="lingua">
				<?php
				$lingua  = Lingua::retrieveAll();
				foreach ($lingua as $row) {?>
						<option value="<?= $row->getCodigo()?>" <?= ($row->getCodigo() == $cliente->getIdLingua())?'selected':"" ?>>
							<?= $row->getNome() ?>
						</option>
				<?php }?>
					</select>
				</div>
			</div>
			<label>Data Nascimento</label>
			<div class="input-control text" data-role="datepicker" data-effect="slide" data-locale="en"
				data-date="<?= ($cliente->getCodigo() != null)?($cliente->getDataNascimento() == '0000-00-00')?date('Y/m/d'):$cliente->getDataNascimento():date('Y/m/d');?>">
				<input type="text" name="nascimento" readonly="readonly" >
				<button type="button" class="btn-date"></button>
			</div>
		</div>
		<div style="float: right;">
			<div>
				<label>Função</label>
				<div class="input-control text size3" data-role="input-control">
					<input type="text" placeholder="Função" value="<?= $cliente->getFuncao();?>" name="funcao">
					<button class="btn-clear" tabindex="-1" type="button"></button>
				</div>
			</div>
			<div>
				<label>Telefone</label>
				<div class="input-control text size3" data-role="input-control">
					<input type="text" placeholder="Telefone" value="<?= $cliente->getTelefone();?>" name="telefone">
					<button class="btn-clear" tabindex="-1" type="button"></button>
				</div>
			</div>
			<div>
				<label>Sexo</label>
				<div class="input-control select">
					<select name="sexo">
						<option <?= ($cliente->getSexo() == 'M')?'checked':""?> value="M">Masculino</option>
						<option <?= ($cliente->getSexo() == 'F')?'checked':""?> value="S">Femenino</option>
					</select>
				</div>
			</div>
			<div>
				<label>Sistema</label>
				<div class="input-control select">
				<select name="sistema">
				<?php
				$sistemas  = Sistema::retrieveAll();
				foreach ($sistemas as $row) {?>
						<option value="<?= $row->getCodigo()?>" <?= ($row->getCodigo() == $cliente->getIdSistema())?'selected':"" ?>>
							<?= $row->getNome() ?>
						</option>
				<?php }?>
					</select>
				</div>
			</div>
			<div>
				<label>Estado Civil</label>
				<div class="input-control select">
					<select name="estadoCivil">
					<?php
						$estado  = EstadoCivil::retrieveAll();
						foreach ($estado as $row) {?>
						<option value="<?= $row->getCodigo()?>" <?= ($row->getCodigo() == $cliente->getIdEstadoCivil())?'selected':"" ?>>
							<?= $row->getNome() ?>
						</option>
					<?php }?>
					</select>
				</div>
			</div>
		</div>
		<div class='clear'></div>
		<input type="hidden" value="<?= $cliente->getCodigo();?>" name="codigo"/>
		<button type="submit" class="button large" style="margin-top: 50px;">Salvar</button>
	</div>
	</form>
</div>
