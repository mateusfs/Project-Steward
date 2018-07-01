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
	<h2><span style="font-size: 20pt ; font-weight: bold">Produtos</span></h2>
	<br>
	<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
        <tr>
            <td style="width: 20%; text-align: left; ">Nome</td>
            <td style="width: 15%; text-align: center;">Marca</td>
            <td style="width: 20%; text-align: center;">Modelo</td>
            <td style="width: 10%; text-align: center;">Valor</td>
            <td style="width: 15%; text-align: center;">Categoria</td>
            <td style="width: 10%; text-align: center;">Itens Comprados</td>
        </tr>
    </table>
<?php
	$produtos = Produto::retrieveAll();
	foreach ($produtos as $produto) {
	$itens = Item::retrieveByProduto($produto->getCodigo());
?>
	<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 10pt;">
		<tr>
			<td style="width: 20%; text-align: left"><?= $produto->getNome() ?></td>
			<td style="width: 15%; text-align: center"><?= $produto->getMarca() ?></td>
			<td style="width: 20%; text-align: center"><?= $produto->getModelo() ?></td>
			<td style="width: 10%; text-align: center"><?= $produto->getValor() ?></td>
			<td style="width: 15%; text-align: center"><?= Categoria::retrieveByPk($produto->getIdcategoria())->getNome() ?></td>
			<td style="width: 10%; text-align: center"><?= count($itens)?></td>
		</tr>
	</table>
<?php }?>
<br><br><br>
</page>