<?php 
class ServerUtils{

	public static function ping($host, $port, $timeout) {
		$tB = microtime(true);
		$fP = @fSockOpen($host, $port, $errno, $errstr, $timeout);
		
		if (!$fP) {
			return "down";
		}
		$tA = microtime(true);
		return round((($tA - $tB) * 1000), 0)." ms";
	}
	
	public static function isOnline($host, $port = 80){
		
		if(ServerUtils::ping($host, $port, 100) == 'down'){
			return false;
		}
		
		return true;
	}
	
	public static function getIpAddress(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

}
?>