<?php
spl_autoload_register(array('Wee', 'weeAutoload'));

class Wee {

	const KEY_APP_DEFAULT 	= 'app_default';
	const DEBUG_TRUE		= TRUE;
	const DEBUG_FALSE		= FALSE;
	const WWW_BASE			= 'www_base';

	/**
	 * @var string
	 */
	private $wee_layout;

	/**
	 * @var Exception
	 */
	protected $wee_exception;

	/**
	 * @var Exception
	 */
	protected $wee_cache_exception;

	/**
	 * @var array
	 */
	private $wee_vars;

	/**
	 * @var array
	 */
	protected $wee_environment;

	/**
	 * @var WeeRouter
	 */
	protected $wee_router;

	/**
	 * @var array
	 */
	protected static $wee_autoload = array(
		'core'
		, 'lib'
	);

	/**
	 * @var array
	 */
	protected $wee_settings = array(
		'app_default' 	=> 'default'
		, 'debug'		=> FALSE
		, 'www_base'	=> ''
		, 'domain'		=> ''
		, 'favicon'		=> 'web/img/favicon.ico'
		, 'default' 	=> array(
								'head' => array(
										'title' 		=> ''
										, 'description' => ''
										, 'keywords' 	=> ''
										, 'analytics' 	=> ''
								)
								, 'css' => array()
								, 'javascript' => array()

							)
	);




	private static function weeSanDir( $base = '', &$data = array() ) {

		$array = array_diff(scandir($base), array('.', '..'));

		foreach($array as $value) {

			if (is_dir($base.$value)) {
				$data[] = $base.$value.'/';
				$data = self::weeSanDir($base.$value.'/', $data);
			}

		}

		return $data;
	}

	public static function weeAutoload( $class ) {

		$arrOpcoes = array();
		foreach (self::$wee_autoload as $value) {

			$dir_path = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . $value . '/';

			$arrOpcoes[] = $dir_path;

			$arrOpcoes = array_merge($arrOpcoes, self::weeSanDir($dir_path));
		}

		$filename = $class . '.php';

		foreach ($arrOpcoes as $dir) {
			$file = $dir . $filename;

			if (file_exists ( $file )) {
				require_once ($file);
				return true;
			}
		}

	}





	public function __set($index, $value) {
		$this->wee_vars[$index] = $value;
	}

	public function __get($index) {
		return $this->wee_vars[$index];
	}

	public function setLayout($layout) {
		$this->wee_layout = $layout;
	}

	public function setException(Exception $e) {
		$this->wee_exception = $e;
	}

	public function setCacheException(Exception $e) {
		$this->wee_exception = null;
		$this->wee_cache_exception = $e;
	}

	public function setConfig( $key, $value ) {
		$this->wee_settings[$key] = $value;
	}

	public function getExceptionMessage() {
		return $this->wee_exception_message;
	}

	public function getApp() {
		if(!$this->wee_router){
			return ;
		}
		return $this->wee_router->getApp();
	}

	public function getController() {
		if(is_object($this->wee_router)){
			return $this->wee_router->getController();
		}
	}

	public function getAction() {
		if(is_object($this->wee_router)){
			return $this->wee_router->getAction();
		}
	}

	public function getConfig( $chave= '' ) {
		if ($chave) {
			return (isset($this->wee_settings[$chave]) ? $this->wee_settings[$chave] : null);
		}
		return $this->wee_settings;
	}

	public function getEnv( $env ) {
		return $this->wee_environment->getEnv($env);
	}

	/**
	 * @return WeeRoute $this->wee_router
	 */
	public function getRoute() {
		return $this->wee_router;
	}

	/**
	 * @see http://www.php.net/manual/pt_BR/function.array-merge-recursive.php#96201
	 */
	private function array_merge_recursive_distinct () {
		$arrays = func_get_args();
		$base = array_shift($arrays);
		if(!is_array($base)) $base = empty($base) ? array() : array($base);
		foreach($arrays as $append) {
			if(!is_array($append)) $append = array($append);
			foreach($append as $key => $value) {
				if(!array_key_exists($key, $base) and !is_numeric($key)) {
					$base[$key] = $append[$key];
					continue;
				}
				if(is_array($value) || (isset($base[$key]) && is_array($base[$key]))) {
					$base[$key] = $this->array_merge_recursive_distinct($base[$key], $append[$key]);
				} else if(is_numeric($key)) {
					if(!in_array($value, $base)) $base[] = $value;
				} else {
					$base[$key] = $value;
				}
			}
		}
		return $base;
	}


	public function __construct( $settings = array() ) {

		$this->wee_environment = new WeeEnviroment();

		$this->setConfig(self::WWW_BASE, $this->getEnv('PROTOCOL').'://'.$this->getEnv('SERVER_NAME').(ltrim($this->getEnv('SCRIPT_NAME')) ? $this->wee_environment->getEnv('SCRIPT_NAME').'/': $this->getEnv('SCRIPT_NAME')));
		$this->wee_settings = $this->array_merge_recursive_distinct($this->wee_settings, $settings);

		$this->wee_router = new WeeRoute($this);


		$this->wee_layout = $this->getApp();
	}



	public function run() {

		$class = $this->getController() . 'Controller';

		if ($this->wee_exception) {
			throw $this->wee_exception;
		}

		include_once $this->wee_router->getPathController($class);

		$controller = new $class($this);

		$controller->{$this->getAction()}();
	}



	public function show($view, $useLayout = true) {

		try {
			$path = $this->wee_router->getPathView($view);

			if ($this->wee_vars) {
				foreach ($this->wee_vars as $key => $value) {
					$$key = $value;
				}
			}

			if ($useLayout) {
				require_once $this->wee_router->getPathLayout($this->wee_layout);
			} else {
				require_once ($path);
			}
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}


	}


	public function redirect ($controller = '', $action = '', $app = ''){

		$protocol 	= $this->getEnv('PROTOCOL');
		$host  		= $this->getEnv('SERVER_NAME');
		$uri   		= $this->getEnv('SCRIPT_NAME');


		if ($app) {
			$uri.= '/'.$app;
		} else if ($this->getApp() != $this->getConfig(self::KEY_APP_DEFAULT)) {
			$uri.= '/'.$this->getApp();
		}


		$extra = "";
		if ($controller) {
			$extra.= '/' . $controller;
		}

		if ($controller && $action) {
			$extra.= '/' . $action;
		}

		header("Location: ".$protocol."://".$host . $uri . $extra);
		die();
	}


	public function forward ($controller, $action = 'index') {
		$this->wee_router->setNewRoute($controller, $action);
		$this->run();
	}


	public function setRequestParameter($chave, $valor) {
		$this->wee_parameters[$chave] = $valor;
	}


	public function getRequestParameter($chave = null) {

		if (!is_null($chave)) {
			if (isset($this->wee_parameters[$chave])) {
				return $this->wee_parameters[$chave];
			}
			return null;
		} else {
			return $this->wee_parameters;
		}
	}

}