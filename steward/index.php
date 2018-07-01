<?php
session_start();

include('core/Wee.php');

include('weeconfig.php');


try {

	$app = new Wee($settings);
	$app->run();


} catch (Exception $e) {

	try {
		Logger::exceptionLog ($e);

		$app->setCacheException($e);
		$app->forward('error');

	} catch (Exception $e) {
		echo "<pre>"; print_r($e->getMessage()); echo "</pre>"; die(__FILE__." - ".__LINE__);
	}
}
