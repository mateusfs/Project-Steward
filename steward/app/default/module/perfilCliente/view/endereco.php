<?php if($endereco){?>
<div>
	<form method="post" action="perfilCliente/salvarEndereco" enctype="multipart/form-data">
	<input type="hidden" name="codigo" value="<?= $endereco->getCodigo() ?>" >
	<input type="hidden" name="idCliente" value="<?= $cliente->getCodigo() ?>" >	
	<div style="margin-top: 50px; padding: 20px 20px 30px; width: 90%; margin: auto;">
		<div style="float: left">
			<div>
				<label>Bairro</label>
				<div class="input-control text size3" data-role="input-control">
					<input type="text" placeholder="Bairro" value="<?= $endereco->getBairro();?>" name="bairro">
					<button class="btn-clear" tabindex="-1" type="button"></button>
				</div>
			</div>
			<div>
				<label>CEP</label>
				<div class="input-control text size3" data-role="input-control">
					<input type="text" placeholder="CEP" value="<?= $endereco->getCep();?>" name="cep">
					<button class="btn-clear" tabindex="-1" type="button"></button>
				</div>
			</div>
			<div>
				<label>Número</label>
				<div class="input-control text size3" data-role="input-control">
					<input type="text" placeholder="Número" value="<?= $endereco->getNumero();?>" name="numero">
					<button class="btn-clear" tabindex="-1" type="button"></button>
				</div>
			</div>
			<label>Complemento</label>
			<div class="input-control text size3" data-role="input-control">
					<input type="text" placeholder="Complemento" value="<?= $endereco->getComplemento();?>" name="complemento">
					<button class="btn-clear" tabindex="-1" type="button"></button>
				</div>
		</div>
		<div style="float: right;">
			<div>
				<label>Cidade</label>
				<div class="input-control text size3" data-role="input-control">
					<input type="text" placeholder="Cidade" value="<?= $endereco->getCidade();?>" name="cidade">
					<button class="btn-clear" tabindex="-1" type="button"></button>
				</div>
			</div>
			<div>
				<label>Estado</label>
				<div class="input-control text size3" data-role="input-control">
					<input type="text" placeholder="Estado" value="<?= $endereco->getEstado();?>" name="estado">
					<button class="btn-clear" tabindex="-1" type="button"></button>
				</div>
			</div>
			<div>
				<label>Rua</label>
				<div class="input-control text size3" data-role="input-control">
					<input type="text" placeholder="Rua" value="<?= $endereco->getRua();?>" name="rua">
					<button class="btn-clear" tabindex="-1" type="button"></button>
				</div>
			</div>
		</div>
		<div class='clear'></div>
		<input type="hidden" value="<?= $endereco->getCodigo();?>" name="codigo"/>
		<button type="submit" class="button large" style="margin-top: 50px;">Salvar</button>
	</div>
	</form>
</div>
<?php }?>