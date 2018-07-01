<?php
$usuario = SessaoUtils::sessionGet('USUARIO');
if($usuario){
	$administrador = $usuario->getAdministrador();
}else{
	$administrador = false;
}
$menu = $this->getController();
?>
<div class="menu-metro">
	<nav class="sidebar light">
		<ul>
			<li class="title">Menu</li>
			<li class="<?= ($menu === 'index')?"active":"stick"?>"><a href="index"><i class="icon-home"></i>Inicio</a>
			</li>
			<li class="<?= ($menu === 'empresa')?"active":"stick"?> "><a href="empresa"><i class="icon-cog"></i>Empresas</a><!-- bg-red  // tag vermelha ao lado-->
			</li>
			<li class="stick "><!-- bg-yellow  // tag amarela ao lado-->
				<a class="dropdown-toggle" href="cliente"><i class="icon-user-2"></i>Clientes</a>
				<ul class="dropdown-menu" data-role="dropdown"
					style="display: none;">
					<li class="<?= ($menu === 'cliente')?"active":"stick"?>">
						<a href="cliente">Clientes</a>
					</li>
					<li class="<?= ($menu === 'perfilCliente')?"active":"stick"?>">
						<a href="perfilCliente/index">Perfil Cliente</a>
					</li>
					<li class="<?= ($menu === 'compra')?"active":"stick"?>">
						<a href="compra/index">Compras</a>
					</li>
				</ul>
			</li>
			<?php
				$moduloRelatorio =  Modulo::retrieveByNome('RELATORIO');
				$moduloGrupoUsuario = GrupoModulo::retrieveByPk($usuario->getIdGrupo(), $moduloRelatorio->getCodigo());
				if($moduloRelatorio->getIdStatus() == 1 && $moduloGrupoUsuario->getIdStatus() == 1){
			?>
			<li class="<?= ($menu === 'relatorio')?"active":"stick"?>">
				<a href="relatorio"><i class="icon-libreoffice"></i>Relatórios</a>
			</li>
			<?php
			}
			$moduloGrafico =  Modulo::retrieveByNome('GRAFICO');
			$moduloGrupoUsuario = GrupoModulo::retrieveByPk($usuario->getIdGrupo(), $moduloGrafico->getCodigo());
			if($moduloGrafico->getIdStatus() == 1 && $moduloGrupoUsuario->getIdStatus() == 1){
			?>
			<li class="<?= ($menu === 'grafico')?"active":"stick"?>">
				<a href="grafico"><i class="icon-stats-up"></i>Gráficos</a>
			</li>
			<?php }
			$moduloTarefa =  Modulo::retrieveByNome('TAREFA');
			$moduloGrupoUsuario = GrupoModulo::retrieveByPk($usuario->getIdGrupo(), $moduloTarefa->getCodigo());
			if($moduloTarefa->getIdStatus() == 1 && $moduloGrupoUsuario->getIdStatus() == 1){
			?>
			<li class="<?= ($menu === 'tarefa')?"active":"stick"?>">
				<a href="tarefa"><img src="../web/img/icon/goal.png" style="padding-right: 15px;"/>Tarefas</a>
			</li>
			<?php } ?>
			<li class="<?= ($menu === 'produtos' )?"active":"stick"?>">
				<a href="produto"><i class="icon-box"></i>Produtos</a>
			</li>
			<li class="<?= ($menu === 'categoria')?"active":"stick"?>">
				<a href="categoria"><i class="icon-tag"></i>Categorias</a>
			</li>
			<?php
			if($administrador  === 'S'){ ?>
			<li class="title">Administradores</li>
			<li class="<?= ($menu === 'administrar')?"active":"stick"?>"><!-- bg-yellow  // tag amarela ao lado -->
				<a class="dropdown-toggle" href="modulo"><i class="icon-equalizer"></i>Administrar</a>
				<ul class="dropdown-menu" data-role="dropdown"	style="display: none;">
					<li class="<?= ($menu === 'modulo')?"active":"stick"?> "> <!-- bg-green  // tag verde ao lado -->
					<a href="modulo"><i class="icon-database"></i>Modulos</a>
					</li>
					<li class="<?= ($menu === 'mensagem')?"active":"stick"?> "> <!-- bg-green  // tag verde ao lado -->
						<a href="mensagem"><i class="icon-comments"></i>Mensagens</a>
					</li>
				</ul>
			</li>
			<li class="<?= ($menu === 'usuarios')?"active":"stick"?>"><!-- bg-yellow  // tag amarela ao lado -->
				<a class="dropdown-toggle" href="usuario"><i class="icon-user-3"></i>Usuários</a>
				<ul class="dropdown-menu" data-role="dropdown"
					style="display: none;">
					<li class="<?= ($menu === 'usuario')?"active":"stick"?>">
						<a href="usuario">Usuários</a>
					</li>
					<li class="<?= ($menu === 'perfilUsuario')?"active":"stick"?>">
						<a href="perfilUsuario/index">Perfil Usuário</a>
					</li>
				</ul>
			</li>
			<?php
			$moduloExportar =  Modulo::retrieveByNome('EXPORTAR');
			$moduloGrupoUsuario = GrupoModulo::retrieveByPk($usuario->getIdGrupo(), $moduloExportar->getCodigo());
			if($moduloExportar->getIdStatus() == 1 && $moduloGrupoUsuario->getIdStatus() == 1){
			?>
			<li class="<?= ($menu === 'exportar')?"active":"stick"?>">
				<a href="exportar"><i class="icon-share"></i>Exportar</a>
			</li>
			<?php }
			$moduloImportar =  Modulo::retrieveByNome('IMPORTAR');
			$moduloGrupoUsuario = GrupoModulo::retrieveByPk($usuario->getIdGrupo(), $moduloImportar->getCodigo());
			if($moduloImportar->getIdStatus() == 1  && $moduloGrupoUsuario->getIdStatus() == 1){
			?>
			<li class="<?= ($menu === 'importar')?"active":"stick"?>">
				<a href="importar"><i class=" icon-enter"></i>Importar</a>
			</li>
			<?php }
			$moduloNovo =  Modulo::retrieveByNome('NOVO_GRUPO');
			$moduloGrupoUsuario = GrupoModulo::retrieveByPk($usuario->getIdGrupo(), $moduloNovo->getCodigo());
			if($moduloNovo->getIdStatus() == 1 && $moduloGrupoUsuario->getIdStatus() == 1){
			?>
			<li class="<?= ($menu === 'grupo')?"active":"stick"?>">
				<a href="grupo"><img src="../web/img/icon/comissao.png" width="30px" style="padding-right: 15px;"/>Grupos</a>
			</li>
			<?php }}?>
		</ul>
	</nav>
<?php if($administrador  === 'N'){ ?>
<div class="menu-metro" style="height: 300px;"></div>
<?php }?>
</div>
