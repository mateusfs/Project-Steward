<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Produto</a>
		</li>
	</ul>
</div>
<div style="float: right;" >
	<nav class="horizontal-menu">
		<ul>
			<li><a class="dropdown-toggle" href="#"><img src="../web/img/icon/list.png"></a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a tabindex="-1" href="produto/deletar/codigo/<?= $produto->getCodigo();?>">Deletar Produto</a></li>
					<li><a tabindex="-1" href="produto/editar/codigo/<?= $produto->getCodigo();?>">Editar Produto</a></li>
					<li><a tabindex="-1" href="produto/editar">Novo Produto</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<div style="width: 50%; margin: auto; margin-top:50px;">
	<div style="margin: auto;">
		<form method="post" action="produto/editar/codigo/<?= $produto->getCodigo();?>">
			<div>
				<fieldset>
					<legend>Produto</legend>
					<button type="submit" class="button" style="padding: 8px; width: 70px; float: right; margin-top: -55px;">Editar</button>
					<div class="span6">
						<div class="text-center padding10 border" style="margin: auto;" data-hint="Nome"><?= $produto->getNome();?></div>
					</div>
					<br>
					<div class="span6">
						<div class="text-center padding10 border" data-hint="Valor"><?= NumberUtils::format($produto->getValor());?></div>
					</div>
					<br>
					<div class="span6">
						<div class="text-center padding10 border" data-hint="Marca"><?= ($produto->getMarca())?$produto->getMarca():"Marca";?></div>
					</div>
					<br>
					<div class="span6">
						<div class="text-center padding10 border" data-hint="Modelo"><?= ($produto->getModelo())?$produto->getModelo():"Modelo";?></div>
					</div>
					<br>
					<div class="span6">
						<div class="text-center padding10 border" data-hint="Categoria">
						<?php
							$categoria = Categoria::retrieveByPk($produto->getIdcategoria());
							if($categoria){
								echo $categoria->getNome();
							}
						?>
						</div>
					</div>
					<br>
					<div class="span6">
						<div class="text-center padding10 border" data-hint="Descrição"><?= $produto->getDescricao();?></div>
					</div>
					<br>
				</fieldset>
			</div>
		</form>
		<div style="float: right;">
			<a href="produto">
				<button type="button" class="button inverse large">Voltar</button>
			</a>
		</div>
	</div>
</div>