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
	<h2><span style="font-size: 25pt ; font-weight: bold">Sistemas</span></h2>
	<br>
	<table cellspacing="0" style="width: 50%; border: solid 1px black; background: #E7E7E7; text-align: center; margin-left: 200px; font-size: 10pt;">
        <tr>
            <td style="width: 70%; text-align: center; ">Nome</td>
            <td style="width: 30%; text-align: center;">Status</td>
        </tr>
    </table>
<?php
	$sistemas = Sistema::retrieveAll();
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
</page>