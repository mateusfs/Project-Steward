<?php

function exec_query($query)
{
//***************************************************CONNESSIONE DW
global $db_host, $db_user, $db_password, $db_name;
$db = mysql_connect($db_host, $db_user, $db_password);
if ($db == FALSE) die ("Errore nella connessione.<br>");
mysql_select_db($db_name, $db) or die ("Errore nella selezione del database.<br>");


$result=mysql_query($query, $db);
if(!$result)
{
print "QUERY: $query<br>";
print mysql_error($db);
}

mysql_close($db);

return $result;
}



function printLegend($img_cube,$img_mea,$img_dim,$img_hier,$img_lev,$img_prop)
{
print "<fieldset>";
print "<legend> Legenda </legend><img src='$img_cube'> Cubo <img src='$img_mea'> Medida  <img src='$img_dim' width=24px height=24px>";
print " ".utf8_decode(" Dimensão ")."  <img src='$img_hier'>  Hierarquia   <img src='$img_lev'>".utf8_decode(" Nível ")." <img src='$img_prop'> Propriedades ";print " </fieldset>";

}

function printHTMLHead($stylefile,$jsfile)
{
print "<head>";
print "<link rel='stylesheet' type='text/css' href='$stylefile' />";
print "<script type='text/javascript' src='$jsfile' language='javascript'></script>";
print "<title>phpMyOLAP: OLAP tool for MySQL databases</title>";
print "</head>";
}

?>
