<?php

print "<div id='divChangeHier' style='z-index:300; visibility:hidden;background-color: white; width:400px; height:250px; border: 2px grey solid;position:absolute;top:100px;left:300px;margin-left:15px;margin-top:15px'>";

print "<center>";
print "<form id='form_report_hier' name='form_report_hier' action='../olap/report.php' method='post'>";

print "<table style='margin-top:15px' border=0>";
print "<tr><td colspan=3 align=center><h4>Cambio gerarchia</h4></td></tr>";
print "<tr><td colspan=3 align=center><b>Seleziona una gerarchia</b></td></tr>";

print "<tr>";
	print "<td valign=center align=center>";
	  include "levels.php";
	print "</td>";
	print "<td valign=center align=center>";
	  print "<img src='../images/arrow_up.png' width='50' height='50'><br>";
	  print "<img src='../images/arrow_down.png' width='50' height='50'>";
	print "</td>";
	print "<td valign=center align=center>";
	  print "<div id='divChangeHier2'>";
	  print "</div>";
	print "</td>";
print "</tr>";
print "</table>";

print "<table>";
print "<tr>";
	print "<td>";
	  print "<input type=hidden name=cube value='$cubename_sel'>";
	  print "<input type=hidden name=colonna id=colonna2 value=''>";
	  print "<input type=hidden name=ordinamento id=ordinamento2 value=''>";
	  print "<input type=hidden name=slice id=slice2 value=''>";
	print "</td>";
	print "<td>";
	  print "<a class='button' href='#' onclick='exec_change_hier(\"form_report_hier\")'>OK</a>";
	print "</td>";
	print "<td>";
	  print "<a class='button' href='#' onclick=\"document.getElementById('divChangeHier').style.visibility='hidden';\">Anular</a>";
	print "</td>";
print "</tr>";
print "</table>";

print "</form>";
print "</center>";

print "</div>";

?>
