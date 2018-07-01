<?php
$usuario = SessaoUtils::sessionGet('USUARIO');
if($usuario){
	if($usuario->getCodigo()){
		$nomeHeader = $usuario->getNome();
		$codigoHeader = $usuario->getCodigo();
		$fotoHeader = $usuario->getFoto();
		$administrador = $usuario->getAdministrador();
	}
}else{
	$nomeHeader = 'Novo Usuário';
	$codigoHeader = false;
	$fotoHeader = false;
	$administrador = false;
}

?>
<header>
	<div class="header">
		<div class="logo">
			<h1><a href="index">Steward</a></h1>
		</div>
	<div style="float: right; margin-right: 20%; margin-top: 40px;">
		<div style="float: left;">
			<div style="float: left; margin-top: -20px; margin-right: 20px; ">
				<?php if($fotoHeader){ ?>
					<a href="perfilUsuario/index/codigo/<?= $codigoHeader ?>">
						<img src="../web/files/usuario/<?= $fotoHeader?>" class="cycle" alt="<?= $nomeHeader ?>" style="width: 70px; height:70px;">
					</a>
				<?php }else{?>
					<a href="perfilUsuario/index/codigo/<?= $codigoHeader ?>">
						<img src="../web/img/default.png" class="cycle" alt="<?= $nomeHeader ?>" style="width: 70px; height:70px;">
					</a>
				<?php }?>
			</div>
			<div style="float: right; margin-top: -5px;">
				<h2><a href="perfilUsuario/index/codigo/<?= $codigoHeader ?>" style="color: black;"><?= $nomeHeader ?></a></h2>
			</div>
		</div>
		<div style="float: right;">
			<nav class="horizontal-menu">
				<ul>
					<li>
						<a class="dropdown-toggle" href="#"><img src="../web/img/icon/list.png" ></a>
						<ul class="dropdown-menu" data-role="dropdown">
							<?php if($usuario){?>
							<li><a tabindex="-1" href="perfilUsuario/index/codigo/<?= $codigoHeader ?>">Meu Perfil</a></li>
							<li><a tabindex="-1" href="usuario">Usuários</a></li>
							<?php if($administrador === "S"){?>
							<li><a tabindex="-1" href="login/gerar">Gerar Steward</a></li>
							<li><a tabindex="-1" href="../lib/plugins/phpMyOLAP/home.php">Steward Olap</a></li>
							<?php }}?>
							<li><a tabindex="-1" href="ajuda">Ajuda</a></li>
							<li><a tabindex="-1" href="contato">Contato</a></li>
							<li><a tabindex="-1" href="login/sair">Sair</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
	</div>
</header>