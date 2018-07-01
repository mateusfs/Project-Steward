<?php
class usuarioController extends Security {

	public function index() {
		$error = $this->getRequest('error');
		$busca = $this->getPost('busca');
		$expo = $this->getRequest('expo');

		if($busca){
			$usuarios = Usuario::retrieveBusca($busca);
		}elseif($expo){
			$usuarios = Usuario::retrieveExpo($expo);
		}else{
			$usuarios = Usuario::retrieveAll();
		}

		$this->wee->expo = $expo;
		$this->wee->error = $error;
		$this->wee->usuarios = $usuarios;
		$this->wee->show('index');
	}
}