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
	<h2><span style="font-size: 25pt ; font-weight: bold">Tarefas</span></h2>
	<br>
	<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
        <tr>
            <td style="width: 20%; text-align: center; ">Nome</td>
            <td style="width: 15%; text-align: center;">Cliente</td>
            <td style="width: 10%; text-align: center;">Prioridade</td>
            <td style="width: 10%; text-align: center;">Status</td>
            <td style="width: 10%; text-align: center;">Usuario</td>
            <td style="width: 10%; text-align: center;">Procentagem</td>
            <td style="width: 10%; text-align: center;">Produto</td>
            <td style="width: 10%; text-align: center;">Grafico</td>
        </tr>
    </table>
<?php
	$tarefas = Tarefa::retrieveAll();
	foreach ($tarefas as $tarefa) {
?>
	<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 10pt;">
		<tr>
			<td style="width: 20%; text-align: center"><?= $tarefa->getApelido() ?></td>
			<td style="width: 15%; text-align: center"><?= ($tarefa->getIdcliente())?Cliente::retrieveByPk($tarefa->getIdcliente())->getNome():"Cliente";?></td>
			<td style="width: 10%; text-align: center"><?= Prioridade::retrieveByPk($tarefa->getIdprioridade())->getNome() ?></td>
			<td style="width: 10%; text-align: center"><?= Status::retrieveByPk($tarefa->getIdstatus())->getNome() ?></td>
			<td style="width: 10%; text-align: center"><?= Usuario::retrieveByPk($tarefa->getIdusuario())->getNome() ?></td>
			<td style="width: 10%; text-align: center"><?= $tarefa->getPorcentagem() ?></td>
			<td style="width: 10%; text-align: center"><?= ($tarefa->getIdproduto())?Produto::retrieveByPk($tarefa->getIdproduto())->getNome():"Produto"; ?></td>
			<td style="width: 10%; text-align: center"><?= ($tarefa->getIdgrafico())?Grafico::retrieveByPk($tarefa->getIdgrafico())->getApelido():"Cliente";?></td>
		</tr>
	</table>
<?php } ?>
<br><br><br>
</page>