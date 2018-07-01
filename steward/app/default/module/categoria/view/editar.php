<div class="fluent-menu" style="margin-top: -50px;">
	<ul class="tabs-holder">
		<li class="active"><a>Categoria</a>
		</li>
	</ul>
</div>
<?php if($categoria->getCodigo()){?>
<div style="float: right;">
	<nav class="horizontal-menu">
		<ul>
			<li><a class="dropdown-toggle" href="#"><img src="../web/img/icon/list.png"></a>
				<ul class="dropdown-menu" data-role="dropdown">
					<li><a tabindex="-1" href="categoria/deletar/codigo/<?= $categoria->getCodigo();?>">Deletar Categoria</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<?php }?>
<div style="margin-top: 50px;">
	<div style="width: 70%; margin: auto;">
		<form method="post" action="categoria/salvar">
			<input type="hidden" value="<?= $categoria->getCodigo();?>" name="codigo">
			<div>
				<fieldset>
					<legend>Categoria</legend>
					<div class="input-control text size3" data-role="input-control">
						<input type="text" placeholder="Nome" value="<?= $categoria->getNome();?>" name="nome">
						<button class="btn-clear" tabindex="-1" type="button"></button>
					</div>
				</fieldset>
			</div>
			<?php if($categoria->getCodigo()){?>
			<div>
				<fieldset>
					<legend>Produtos dessa categoria</legend>
						<div>
							<table class="table hovered" style="margin: auto;">
								<thead>
									<tr>
										<th class="text-left">Nome</th>
										<th class="text-left">Marca</th>
										<th class="text-left" colspan="2">Modelo</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$produtos = Produto::retrieveByCategoria($categoria->getCodigo());
									if($produtos){
										foreach ($produtos as $row) {?>
										<tr style="text-align: center; cursor: pointer;" class="tdlink" data-link="produto/mostra/codigo/<?= $row->getCodigo(); ?>">
											<td class="text-left" style="width: 250px;"><?= ($row->getNome())?$row->getNome():" - "; ?></td>
											<td class="text-left" style="width: 250px;"><?= ($row->getMarca())?$row->getMarca():" - "; ?></td>
											<td class="text-left" style="width: 250px;"><?= ($row->getModelo())?$row->getModelo():" - "; ?></td>
										</tr>
								<?php 	}
									}else{
								?>
									<tr>
										<th colspan="3" class="text-left">Não tem produtos por aqui!</th>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
				</fieldset>
			</div>
			<?php }?>
			<div style="float: right; margin-top: 50px;">
				<a href="categoria/index">
					<button type="button" class="button inverse large">Voltar</button>
				</a>
			</div>
			<div style="float: left; margin-top: 50px;">
				<button type="submit" class="button large">Salvar</button>
			</div>
		</form>
	</div>
</div>
