<?php
class Logger {
	
	const MAIL_LOG_SUBJECT 	= 'ERROR LOG JCMSW';
	const MAIL_LOG_FROM 	= 'juancm86@gmail.com';
	const MAIL_LOG_TO 		= 'juancm86@gmail.com';
	
	
	public function __construct() {
	}
	
	public static function exceptionLog(Exception $e) {
		
		$path = dirname(dirname(__FILE__));
		$filename = $path . '/log/logger.log';
		
		error_log(self::getContent($e), 3, $filename);
	}

	public static function exceptionMail($e, $emailTo = self::MAIL_LOG_TO, $emailFrom = self::MAIL_LOG_FROM, $emailSubject = self::MAIL_LOG_SUBJECT) {
		
		$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers.= "Subject: ".$emailSubject."\n";
		$headers.= "From: ".$emailFrom."\n";
		
		if ($e instanceof Exception) {
			$msg = self::getContent($e);
		} else {
			$msg = $e;
		}
		error_log($msg, 1, $emailTo, $headers);
	}
	
	
	public static function reportMail($day, Exception $e, $emailTo = self::MAIL_LOG_TO, $emailFrom = self::MAIL_LOG_FROM, $emailSubject = self::MAIL_LOG_SUBJECT) {
		
		$path = dirname(dirname(__FILE__));
		$filename = $path . '/log/logger.log';
		
		/*
		 if (file_exists($filename)) {
			
		$newFilename = $path . '/log/'.date('Y_m_d').'_logger.log';
		if (!file_exists($newFilename)) {
		
		// 				rename($filename, $newFilename);
		
		self::exceptionMail(file_get_contents($filename));
		}
		}
		*/
		
		echo "<pre>"; print_r('TODO'); echo "</pre>"; die(__FILE__." - ".__LINE__);
		
		/*
		$boundary = strtotime('NOW');
		$anexo = base64_encode(file_get_contents($filename));
 		
		$headers = "From: Eu <meu@email.com.br>\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\n";
		
		$msg = "--" . $boundary . "\n";
		$msg .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
		$msg .= "Content-Transfer-Encoding: quoted-printable\n\n";
		
		$msg .= "Aqui eu escrevo o texto do email\n";
		
		$msg .= "--" . $boundary . "\n";
		$msg .= "Content-Transfer-Encoding: base64\n";
		$msg .= "Content-Disposition: attachment; filename=\"logger.log\"\n";
		
// 		$msg_temp = $anexo. "\n";
// 		$tmp[1] = strlen($msg_temp);
// 		$tmp[2] = ceil($tmp[1]/76);
		
// 		for ($b = 0; $b <= $tmp[2]; $b++) {
// 			$tmp[3] = $b * 76;
// 			$msg .= substr($msg_temp, $tmp[3], 76) . "\n";
// 		}
		
		$msg.= $anexo;
		
		mail("juancm86@gmail.com", "Assunto", $msg, $headers);
		*/
	}
	
	private static function getContent(Exception $e) {
		
		$msg = str_replace("\n", " ", $e->getMessage());
		
		$file = $e->getFile()." (Linha: ".$e->getLine().")";
		
		if (preg_match('/^SQLSTATE(.*)+/i', $e->getMessage())) {
			$tipo = "SQL";
		} else {
			$tipo = "ERROR";
		}
		
		$arr = array(
				date('d-m-Y H:i:s')
				, "--- ".$tipo." ---"
				, $msg . " (".$_SERVER['REQUEST_URI'].")"
				, $file
				, "--- IP [".$_SERVER['REMOTE_ADDR']."]"
				, "--- HOST [".gethostbyaddr($_SERVER['REMOTE_ADDR'])."]"
		);
		
		return implode($arr, "|")."\n";

	}
	
	private function __clone() {
	}

}