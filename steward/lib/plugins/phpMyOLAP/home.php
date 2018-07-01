<?php
include("config.php");
include("functions.php");


printHTMLHead($stylefile,$jsfile);

print "<table align=center>";
print "<tr>";
	print "<td align=center>";
	print "<a href='builder/report.php'><img src='$img_new'><h3>".utf8_decode("Criar Relatório")."</h3></a>";
	print "</td>";
	print "<td align=center>";
	print "<a href='builder/apri_report.php'><img src='$img_open'><h3>".utf8_decode("Abrir Relatório")."</h3></a>";
	print "</td>";
	print "<td align=center>";
	print "<a href='steward.php'><img src='images/voltar.png' width='250'><h3>".utf8_decode("Voltar")."</h3></a>";
	print "</td>";
print "</tr>";
print "</table>";




?>
