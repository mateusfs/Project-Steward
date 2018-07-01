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
	<h1><span style="font-size: 25pt; font-weight: bold">Clientes</span></h1>
	<br>
	<br>
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
$clientes = Cliente::retrieveAll();
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
</page>