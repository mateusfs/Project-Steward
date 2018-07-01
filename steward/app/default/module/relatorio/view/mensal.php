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

</style>
<page>
<h2><span style="font-size: 25pt ; font-weight: bold">Mensal</span></h2>
<?php
$clientes = Cliente::retrieveAll();
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
</page>