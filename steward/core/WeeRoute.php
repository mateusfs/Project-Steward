<?php
class WeeRoute {

	/**
	 * @var Wee
	 */
	protected $wee;

	/**
	 * @var $root
	 */
	protected $root;

	/**
	 * @var $app
	 */
	protected $app;

	/**
	 * @var $controller
	 */
	protected $controller;

	/**
	 * @var $action
	 */
	protected $action;

	/**
	 * @var $parameters
	 */
	protected $parameters;


	/**
	 * Constructor
	 * @param   Wee   $wee
	 */
	public function __construct( Wee $wee ) {
		$this->wee = $wee;
		$this->root = dirname(dirname(__FILE__));
		$this->parameters = array();

		try {
			$this->map();
		} catch (Exception $e) {
			$this->wee->setException($e);
		}

	}

	public function getRoot() {
		return $this->root;
	}

	public function getApp() {
		return $this->app;
	}

	public function getController() {
		return $this->controller;
	}

	public function getAction() {
		return $this->action;
	}

	public function setNewRoute($controller, $action) {

		$this->controller = $controller;

		$this->action = $action;

	}

	private function map() {

		$app_default = $this->wee->getConfig(Wee::KEY_APP_DEFAULT);

		$app = $app_default;
		$this->app = $app;


		$path = trim($this->wee->getEnv('PATH_INFO'), '/');

		if (!$path) {
			$modulo = 'index';
			$acao = 'index';
		} else {

			$requestURI = explode('/', $path);

			//Tratamentos
			$app = current($requestURI);
			$dirname = $this->root . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $app;

			if (!is_dir($dirname)) {
				$app = $app_default;
				$dirname = $this->root . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $app;

				if (!is_dir($dirname)) {
					throw new ErrorException('App não encontrada - '.current($requestURI));
				}
			} else {
				array_shift($requestURI);
			}
			//Setando APP
			$this->app = $app;


			//Controller
			if (!count($requestURI)) {
				$modulo = 'index';
			} else {

				$modulo = current($requestURI);
				$dirname = $this->root . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $app . DIRECTORY_SEPARATOR . 'module' . DIRECTORY_SEPARATOR . $modulo;
				if (!is_dir($dirname)) {
					throw new Exception('Módulo não encontrado - '.$modulo);
				}
				array_shift($requestURI);
			}


			//Action
			if (!count($requestURI)) {
				$acao = 'index';
			} else {

				$acao = current($requestURI);
				$class = $modulo . 'Controller';

				$filename = $this->root . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $app . DIRECTORY_SEPARATOR . 'module' . DIRECTORY_SEPARATOR . $modulo . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . $class . '.php';
				if (!file_exists($filename)) {
					throw new ErrorException('Controller não encontrado - '.$class.'.php');
				}
				include_once $filename;

				$controller = new $class($this->wee);

				if (!is_callable(array($controller, $acao))) {
					throw new Exception ('Action não encontrada - '.$acao);
				}

				array_shift($requestURI);
			}
			//Setando ACTION
			$this->action = $acao;


			//Parâmetros
			if (count($requestURI)) {

				while (count($requestURI)) {

					$key = current($requestURI);

					array_shift($requestURI);

					$value = current($requestURI);

					$parameters[$key] = $value;

					array_shift($requestURI);
				}

				//Merge de parametros
				$_GET = array_merge($_GET, $parameters);
			}
			//Setando PARAMETROS
			$this->parameters = $_GET;
		}

		//Setando CONTROLLER
		$this->controller = $modulo;

		//Setando ACTION
		$this->action = $acao;

	}

	public function getPathController( $class ) {

		$filename = $this->root . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $this->app . DIRECTORY_SEPARATOR . 'module' . DIRECTORY_SEPARATOR . $this->controller . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . $class . '.php';

		if (!file_exists($filename)) {
			throw new ErrorException('Controller não existe');
		}

		return $filename;
	}

	public function getPathView( $view ) {

		$filename = $this->root . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $this->app . DIRECTORY_SEPARATOR . 'module' . DIRECTORY_SEPARATOR . $this->controller . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . $view . '.php';

		if (!file_exists($filename)) {
			throw new ErrorException('View não existe');
		}

		return $filename;
	}

	public function getPathLayout( $layout ) {

		$filename = $this->root . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'layout' . DIRECTORY_SEPARATOR . $layout . '.php';

		if (!file_exists($filename)) {
			throw new ErrorException('Layout não existe');
		}

		return $filename;
	}

	public function getParameters( $indice = null ){
		if (!is_null($indice)){
			if (isset($this->parameters[$indice])) {
				return trim($this->parameters[$indice]);
			} else {
				return null;
			}
		}
		return $this->parameters;
	}
}