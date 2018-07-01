<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Produto</a>
		</li>
	</ul>
</div>
<div style="width: 50%; margin: auto; margin-top:50px; padding-bottom: 40px;">
	<div>
		<form method="post" action="produto/salvar">
		<input type="hidden" name="codigo" value="<?= $produto->getCodigo();?>">
			<fieldset>
				<legend>
					<font><font class=""><?= ($produto)?'Editar':'Novo' ?> Produto</font></font>
				</legend>
				<div class="input-control" data-role="input-control">
				<div>
					<label>Nome</label>
					<div class="input-control text size6" data-role="input-control">
						<input type="text" placeholder="Nome" value="<?= $produto->getNome();?>" name="nome">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				</div>
				<div>
					<label>Valor</label>
					<div class="input-control text size6" data-role="input-control">
						<input type="text" placeholder="Valor" value="<?= NumberUtils::format($produto->getValor());?>" id='valor' name="valor">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				</div>
				<div>
					<label>Marca</label>
					<div class="input-control text size6" data-role="input-control">
						<input type="text" placeholder="Marca" value="<?= $produto->getMarca();?>" name="marca">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				</div>
				<div>
					<label>Categoria</label>
					<div class="input-control select size6">
						<select name="categoria">
							<?php
							$categorias = Categoria::retrieveAtivos();
							foreach ($categorias as $row) {
							?>
							<option value="<?= $row->getCodigo() ?>" <?= ($row->getCodigo() == $produto->getIdCategoria())?'checked':"" ?>><?= $row->getNome(); ?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div>
					<label>Modelo</label>
					<div class="input-control text size6" data-role="input-control">
						<input type="text" placeholder="Modelo" value="<?= $produto->getModelo();?>" name="modelo">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				</div>
				<div>
					<label>Descrção</label>
					<div class="input-control textarea size6" data-role="input-control">
						<textarea class="textarea" placeholder="Decrição" name="descricao"><?= $produto->getDescricao();?></textarea>
					</div>
				</div>
				<br><br>
				</div>
				<div style="float: right;">
					<a href="produto">
						<button type="button" class="button inverse large">Voltar</button>
					</a>
				</div>
				<div style="float: left;">
					<button type="submit" class="button large">Salvar</button>
				</div>
			</fieldset>
		</form>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$('#valor').maskMoney();
	});
<?php if($error == 1){?>
	new AlertaError("Atenção...", "Encontramos uma Produto com o mesmo nome!!");
<?php }?>
</script>