<?php
header('Content-Type: text/html; charset=iso-8859-1');

include('../core/Wee.php');

try {
	$gen = new WeeGenerate();
	$gen->run();
	echo $gen->getResult();
} catch (Exception $e) {
	echo "<pre>";var_dump($e);die("</pre>");
	echo "<pre>"; print_r($e->getTraceAsString()); echo "</pre>"; die(__FILE__." - ".__LINE__);
}