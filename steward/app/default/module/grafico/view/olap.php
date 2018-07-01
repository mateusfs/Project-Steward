<?php
require ('lib/plugins/olap4php/autoload.php');

use OLAP4PHP\Provider\XMLA\XMLAConnection;

$properties = array(
	XMLAConnection::PROP_CATALOG => 'root',
	XMLAConnection::PROP_DATASOURCE => 'Provider=localhost;DataSource=bancosteward'
);

$connection = new XMLAConnection($properties);
echo "<pre>";var_dump($connection);die("</pre>");


use OLAP4PHP\Provider\XMLA\XMLAStatement;

$statement = new XMLAStatement($connection);
$cellSet = $statement->executeOlapQuery($query);

echo "<pre>";var_dump($cellSet);die("</pre>");