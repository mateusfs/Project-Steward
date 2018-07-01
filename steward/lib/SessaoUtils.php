<?php
class SessaoUtils {

	const USUARIO_STAFF = 'Steward';
	private $CodOrcamento;
	public function __construct() {
	}

	/**
	 * @param string $indice
	 * @param unknown_type $valor
	 */
	public static function sessionSet($indice, $valor) {
		$_SESSION[$indice] = serialize($valor);
	}

	/**
	 * @param String $indice
	 * @return unknown_type|NULL
	 */
	public static function sessionGet($indice) {
		if (isset($_SESSION[$indice])) {
			return unserialize($_SESSION[$indice]);
		}

		return null;
	}


	/**
	 * @param String $indice
	 */
	public static function sessionRemove($indice = '') {

		if (empty($indice)) {
			unset($_SESSION);
		} else {
			unset($_SESSION[$indice]);
		}

	}

	public function getCodOrcamento()
	{
		return $this->CodOrcamento;
	}

	public function setCodOrcamento($CodOrcamento)
	{
		$this->CodOrcamento = $CodOrcamento;
	}
}