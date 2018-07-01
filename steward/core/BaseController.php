<?php
Abstract Class BaseController {

	/**
	 * @var Wee
	 */
	protected $wee;

	public function __construct(Wee $wee) {
		$this->wee = $wee;
	}

	public function getPost($indice = null) {
		if (!is_null($indice)){
			if (isset($_POST[$indice])) {
				return $_POST[$indice];
			} else {
				return null;
			}
		}
		return $_POST;
	}

	public function getFile($indice = null){
		if (!is_null($indice)){
			if (isset($_FILES[$indice])) {
				return $_FILES[$indice];
			} else {
				return null;
			}
		}
		return $_FILES;
	}

	public function getRequest($indice = null) {
		if (!is_null($indice)){
			if (isset($_GET[$indice])) {
				return trim($_GET[$indice]);
			} else {
				return null;
			}
		}
		return $_GET;
	}


	/**
	 * @return Usuario
	 */
	public function getUsuario($sessionName = Sessao::USUARIO_STAFF) {
		return Sessao::sessionGet($sessionName);
	}

	/**
	 * @param Usuario $obj
	 */
	public function setUsuario($obj, $sessionName = Sessao::USUARIO_STAFF) {
		Sessao::sessaoSet($sessionName, $obj);
	}

	/**
	 * @all controllers must contain an index method
	 */
	abstract function index();
}