<?php
class Funcoes {

	public function __construct() {
	}

	public static function pegaHoraMinutos($val){
		$result = explode(":", $val);

		return $result[0].':'.$result[1];
	}

	public static function validaData($data){
		$d = explode("/", $data);
		if(count($d) == 3 && is_numeric($d[0]) && is_numeric($d[1]) && is_numeric($d[2]) && checkdate($d[1], $d[0], $d[2])) {
			if($d[2] < 1902){
				return false;
			}else if($d[2] > 2050){
				return false;
			}
			return true;
		}
		return false;
	}

	/**
	 * Arruma a data que vem do sql.
	 */
	public static function dataFromDb($data)
	{
		$arrTemp = explode(" ", $data);

		return(implode("/", array_reverse(explode("-", $arrTemp[0]))));
	}

	/**
	 *
	 * Gera Steward
	 *
	 */

	public static function geraSteward()
	{
		Tarefa::criaTarefaRecomendacaoClientes();
		Tarefa::criaTarefaSimilaridade();
		Tarefa::criaTarefaCliente();
		Tarefa::criaTarefaUsuario();
		Tarefa::criaTarefaEndereco();
		Tarefa::criaTarefaCompras();
		Tarefa::criaTarefaSistema();
		Tarefa::criaTarefaGraficoMeses();
		Tarefa::criaTarefaGraficoProduto();
		Tarefa::criaTarefaGraficoTarefas();
		Tarefa::criaTarefaGrupoModulo();
	}

	/*
	 *
	 * Manda Email
	 *
	 */
	public static function emailContato($nome, $email, $comentario){

		$menssagem = "
				<html>
					<head>
						<meta charset='iso-8859-1'>
						<meta name='robots' content='noindex,nofollow'/>
						<title>Gestor</title>
						<meta name='viewport' content='width=device-width, initial-scale=1.0'>
						<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
						<meta http-equiv='X-UA-Compatible' content='IE=edge' />
					</head>
					<body>
						<style>
							* {
								padding: 0;
								margin: 0;
								text-decoration: none;
								color: #000;
							}

							body {
								font-family: 'Segoe UI Light', 'Segoe UI', 'Lucida Grande', Verdana,
									Arial, Helvetica, sans-serif;
								font-size: 14px;
								color: #5f5f5f;
								margin: 0px;
								font-family: Arial;
								color: #000000;
								font-size: 12px;
							}
						</style>
						<p>Olá <b>".$nome."</b></p><br/>
						<p>".$comentario."</p><br/>
						<p>
							<i>
								Obrigado pelo interesse em nosso sistema Steward.<br/>
								Iremos analisar seu comentarios, e entrar em contato assim que possivel.<b>Obrigado</b><br/>
								Atenciosamente equipe Steward..
							</i>
						</p>
					</body>
				<html>";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'To: '.$nome.'<'.$email.'>'."\r\n";
		$headers .= 'From: Steward <mateusfs@outlook.com>'."\r\n";

		mail($email," Steward - ".$nome, $menssagem, $headers);
	}


	/**
	* Arruma a data para inserir no banco.
	*/
	public static function dataToDb($data)
	{
		return(implode("-", array_reverse(explode("/", $data))));
	}

	/**
	 * @param unknown_type $string
	 * @return string
	 */
	public static function antiInjection($string){
		$string = preg_replace(sql_regcase('/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/'),"",$string);
		$string = trim($string);//limpa espa�os vazio
		$string = strip_tags($string);//tira tags html e php
		$string = addslashes($string);//Adiciona barras invertidas a uma string
		return $string;
	}

	/**
	 * Valida imagme ...
	 * @param File $file
	 * @param array $extensoes
	 * @return Ambigous <NULL, string>
	 */
	public static function validaImagem ($file, $extensoes = array('jpg', 'jpeg', 'gif', 'png')) {
		$erro = null;
		if ($file['error'] == UPLOAD_ERR_NO_FILE) {
			$erro = 'Por favor informe o arquivo';
		} else {
			$ext = array_reverse(explode('.', $file['name']));
			if (!in_array(strtolower($ext[0]), $extensoes)) {
				$erro = 'Arquivo com extens�o diferente das permitidas ( '.implode(', ', $extensoes).' )';
			}
		}

		return $erro;
	}

	/**
	 * Valida email ...
	 * @param string $mail
	 * @return boolean
	 */
	public static function validaEmail($mail){
		if(preg_match('/^([[:alnum:]_.-]){3,}@([[:lower:][:digit:]_.-]{3,})(\.[[:lower:]]{2,3})(\.[[:lower:]]{2})?$/', $mail)) {
			return true;
		}else{
			return false;
		}
	}

	/**
	 * @param unknown_type $conteudo
	 * @return string
	 */
	public static function javascript($conteudo) {

		$javascript = "<script type='text/javascript'>".$conteudo."</script>";

		return $javascript;
	}

	public static function mes($mes) {
		$arr = array(
			"01" => "jan"
			, "02" => "fev"
			, "03" => "mar"
			, "04" => "abr"
			, "05" => "mai"
			, "06" => "jun"
			, "07" => "jul"
			, "08" => "ago"
			, "09" => "set"
			, "10" => "out"
			, "11" => "nov"
			, "12" => "dez"
		);

		return $arr[$mes];
	}

	public static function tresPontinhos($string, $length = 30) {
		$result = substr($string, 0, $length);
		if(strlen($string) >= $length){
			return $result."...";
		}else{
			return $result;
		}
	}

}

?>
