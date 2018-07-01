<?php
$empresas = Empresa::retrieveAll();
	foreach ($empresas as $empresa){
?>
<style type="text/css">

div.zone
{
	border: solid 2mm #66AACC;
	border-radius: 3mm;
	padding: 1mm;
	background-color: #FFEEEE;
	color: #440000;
}
div.zone_over
{
	width: 30mm;
	height: 35mm;
	overflow: hidden;
}

@font-face {
font-family: "PT Serif Caption";
font-style: normal;
font-weight: 400;
src: local("Cambria"), local("PT Serif Caption"), local("PTSerif-Caption"), url(https://themes.googleusercontent.com/static/fonts/ptserifcaption/v4/7xkFOeTxxO1GMC1suOUYWWhBabBbEjGd1iRmpyoZukE.woff) format('woff');
}

@font-face {
font-family: "Open Sans Light";
font-style: normal;
font-weight: 300;
src: local("Segoe UI Light"), local("Open Sans Light"), local("OpenSans-Light"), url(https://themes.googleusercontent.com/static/fonts/opensans/v6/DXI1ORHCpsQm3Vp6mXoaTZ1r3JsPcQLi8jytr04NNhU.woff) format('woff');
}


</style>
<page>
	<h1><span style="font-size: 35pt; width: 100%; font-family: helvetica; text-align: center; margin-left: 300px;">Steward</span></h1>
	<h2><span style="font-size: 20pt; width: 100%; font-family: helvetica; text-align: center;">Sistema de Gerenciamento de Tarefas</span></h2>
	<p style="font-size: 15pt; width: 100%; font-family: helvetica; text-align: center;">Steward “Sistema de Gerenciamento de Tarefas”, o projeto tem como objetivo criar tarefas para os usuários do sistema. A Tarefa por sua vez pode ser um objetivo, notificação, melhoria, adaptação. Tudo isso com o intuito de indicar e informar para os usuários do sistema quais são as suas prioridades, suas diferenças, seus melhores produtos, seus melhores clientes, analisando informações importantes. Podemos considerar que o Steward é um sistema gerencial de apoio a decisão.</p>
	<h1><span style="font-size: 25pt; font-weight: bold">Empresa - <?= $empresa->getNome()?></span></h1>
	<br>
	<h2><span style="font-size: 25pt ; font-weight: bold">Sistemas</span></h2>
	<br>
	<table cellspacing="0" style="width: 50%; border: solid 1px black; background: #E7E7E7; text-align: center; margin-left: 200px; font-size: 10pt;">
		<tr>
			<td style="width: 70%; text-align: center; ">Nome</td>
			<td style="width: 30%; text-align: center;">Status</td>
		</tr>
	</table>
<?php
	$sistemas = Sistema::retrieveByEmpresa($empresa->getCodigo());
	foreach ($sistemas as $sistema) {
?>
	<table cellspacing="0" style="width: 50%; border: solid 1px black; background: #F7F7F7; text-align: center; margin-left: 200px; font-size: 10pt;">
		<tr>
			<td style="width: 70%; text-align: center"><?= $sistema->getNome() ?></td>
			<td style="width: 30%; text-align: center"><?= Status::retrieveByPk($sistema->getIdStatus())->getNome() ?></td>
		</tr>
	</table>
<?php } ?>
<br><br><br>
<h2><span style="font-size: 20pt ; font-weight: bold">Categorias</span></h2>
<?php
foreach ($sistemas as $sistema) {
?>
	<h2><span style="font-size: 15pt ; font-weight: bold">Sistema - <?= $sistema->getNome() ?></span></h2>
	<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
		<tr>
			<td style="width: 40%; text-align: left; ">Sistema</td>
			<td style="width: 40%; text-align: center;">Nome</td>
			<td style="width: 20%; text-align: center;">Produtos</td>
		</tr>
	</table>
<?php
$categorias = Categoria::retrieveBySistema($sistema->getCodigo());
	foreach ($categorias as $categoria) {
	$produtos = Produto::retrieveByCategoria($categoria->getCodigo());
?>

	<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 10pt;">
		<tr>
			<td style="width: 40%; text-align: left"><?= $sistema->getNome() ?></td>
			<td style="width: 40%; text-align: center"><?= $categoria->getNome() ?></td>
			<td style="width: 20%; text-align: center"><?= count($produtos)?></td>
		</tr>
	</table>
<?php }?>
<br><br><br>
<?php }?>
<br><br><br>
<h2><span style="font-size: 20pt ; font-weight: bold">Produtos</span></h2>
<?php
foreach ($categorias as $categoria) {
?>
	<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
		<tr>
			<td style="width: 40%; text-align: left; ">Categoria</td>
			<td style="width: 40%; text-align: center;">Nome</td>
			<td style="width: 20%; text-align: center;">Itens Comprados</td>
		</tr>
	</table>
<?php
$produtos = Produto::retrieveByCategoria($categoria->getCodigo());
	foreach ($produtos as $produto) {
	$itens = Item::retrieveByProduto($produto->getCodigo());
?>
	<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 10pt;">
		<tr>
			<td style="width: 40%; text-align: left"><?= $categoria->getNome() ?></td>
			<td style="width: 40%; text-align: center"><?= $produto->getNome() ?></td>
			<td style="width: 20%; text-align: center"><?= count($itens)?></td>
		</tr>
	</table>
<?php }?>
<br><br><br>
<?php }?>
<br><br><br>
<h2><span style="font-size: 20pt ; font-weight: bold">Clientes</span></h2>
<?php
foreach ($sistemas as $sistema) {
?>
	<h3><span style="font-size: 25pt ; font-weight: bold">Sistema - <?= $sistema->getNome() ?></span></h3>
	<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
		<tr>
			<td style="width: 20%; text-align: left; ">Nome</td>
			<td style="width: 20%; text-align: center;">E-mail</td>
			<td style="width: 10%; text-align: center;">Função</td>
			<td style="width: 10%; text-align: center;">Nota</td>
			<td style="width: 10%; text-align: center;">Sexo</td>
			<td style="width: 10%; text-align: center;">Telefone</td>
			<td style="width: 10%; text-align: center;">Estado Civil</td>
			<td style="width: 10%; text-align: center;">Linguagem</td>
		</tr>
	</table>
<?php
$clientes = Cliente::retrieveBySistema($sistema->getCodigo());
foreach ($clientes as $cliente) {
?>
	<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 10pt;">
		<tr>
			<td style="width: 20%; text-align: left"><?= $cliente->getNome() ?></td>
			<td style="width: 20%; text-align: center"><?= $cliente->getEmail() ?></td>
			<td style="width: 10%; text-align: center"><?= $cliente->getFuncao() ?></td>
			<td style="width: 10%; text-align: center"><?= Nota::retrieveByPk($cliente->getIdNota())->getNome(); ?></td>
			<td style="width: 10%; text-align: center"><?= ($cliente->getSexo() == 'M')?"Masculino":"Femenino"; ?></td>
			<td style="width: 10%; text-align: center"><?= $cliente->getTelefone() ?></td>
			<td style="width: 10%; text-align: center"><?= EstadoCivil::retrieveByPk($cliente->getIdEstadoCivil())->getNome(); ?></td>
			<td style="width: 10%; text-align: center"><?= Lingua::retrieveByPk($cliente->getIdLingua())->getNome(); ?></td>
		</tr>
	</table>
<?php }?>
<br><br><br>
<h2><span style="font-size: 25pt ; font-weight: bold">Compras Cliente</span></h2>
<?php
foreach ($clientes as $cliente) {
?>
	<h3><span style="font-size: 25pt ; font-weight: bold"><?= $cliente->getNome() ?></span></h3>
	<table cellspacing="0" style="width: 50%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
		<tr>
			<td style="width: 80%; text-align: left; ">Data</td>
			<td style="width: 20%; text-align: center;">Itens</td>
		</tr>
	</table>
<?php
$compras = Compra::retrieveByCliente($cliente->getCodigo());
foreach ($compras as $compra) {
$itens = Item::retrieveByCompra($compra->getCodigo());
?>
	<table cellspacing="0" style="width: 50%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 10pt;">
		<tr>
			<td style="width: 80%; text-align: left"><?= $compra->getData() ?></td>
			<td style="width: 20%; text-align: center"><?= count($itens)?></td>
		</tr>
	</table>
<?php }?>
<br><br><br>
<h3><span style="font-size: 25pt ; font-weight: bold">Itens</span></h3>
	<h4><span style="font-size: 20pt ; font-weight: bold"><?= $cliente->getNome() ?></span></h4>
	<table cellspacing="0" style="width: 50%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
		<tr>
			<td style="width: 20%; text-align: left; ">Compra</td>
			<td style="width: 40%; text-align: center;">Produto</td>
			<td style="width: 20%; text-align: center;">Quantidade</td>
			<td style="width: 20%; text-align: center;">Valor</td>
		</tr>
	</table>
<?php
$compras = Compra::retrieveByCliente($cliente->getCodigo());
foreach ($compras as $compra) {
$itens = Item::retrieveByCompra($compra->getCodigo());
foreach ($itens as $item) {
?>
	<table cellspacing="0" style="width: 50%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 10pt;">
		<tr>
			<td style="width: 20%; text-align: left"><?=	$item->getIdCompra()?></td>
			<td style="width: 40%; text-align: center"><?= Produto::retrieveByPk($item->getIdProduto())->getNome();?></td>
			<td style="width: 20%; text-align: center"><?=	$item->getQuantidade()?></td>
			<td style="width: 20%; text-align: center"><?=	$item->getvalor()?></td>
		</tr>
	</table>
<?php }}?>
<br><br><br>
<?php }?>
<br><br><br>
<h2><span style="font-size: 25pt ; font-weight: bold">Usuarios</span></h2>
<?php }?>
<br><br><br>
	<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
		<tr>
			<td style="width: 40%; text-align: left; ">Nome</td>
			<td style="width: 20%; text-align: center;">Email</td>
			<td style="width: 20%; text-align: center;">Função</td>
			<td style="width: 20%; text-align: center;">Sexo</td>
			<td style="width: 20%; text-align: center;">Telefone</td>
			<td style="width: 20%; text-align: center;">Grupo</td>
		</tr>
	</table>
<?php
$usuarios = Usuario::retrieveAll();
foreach ($usuarios as $usuario) {
?>
	<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 10pt;">
		<tr>
			<td style="width: 40%; text-align: left"><?= $usuario->getNome() ?></td>
			<td style="width: 20%; text-align: center"><?= $usuario->getEmail() ?></td>
			<td style="width: 20%; text-align: center"><?= $usuario->getFuncao() ?></td>
			<td style="width: 20%; text-align: center"><?= $usuario->getSexo() ?></td>
			<td style="width: 20%; text-align: center"><?= $usuario->getTelefone() ?></td>
			<td style="width: 20%; text-align: center"><?= Grupo::retrieveByPk($usuario->getIdGrupo())->getNome()?></td>
		</tr>
	</table>
<?php }?>
<br><br><br>
</page>
<?php
}
?>
