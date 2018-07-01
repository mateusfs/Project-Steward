<?php
class loginController extends SecurityLogin{

	public function index() {
		$error = $this->getRequest('error');
		$sucesso = $this->getRequest('sucesso');

		$this->wee->error = $error;
		$this->wee->sucesso = $sucesso;
		$this->wee->show('index');
	}

	public function logando() {

		$email = $this->getPost('email');
		$senha = $this->getPost('senha');

		if(!$email || !$senha){
			$this->wee->redirect('login','index/error/1');
		}
		$usuario = Usuario::retrieveByEmail($email);

		if(!$usuario){
			$this->wee->redirect('login','index/error/2');
		}


		if($usuario->getSenha() != $senha){
			$this->wee->redirect('login','index/error/3');
		}

		SessaoUtils::sessionSet('USUARIO', $usuario);

		Funcoes::geraSteward();

		$this->wee->redirect('index');
	}

	public function sair() {
		SessaoUtils::sessionSet('USUARIO', null);
		$this->wee->redirect('index');
	}


	public function gerar() {
		Funcoes::geraSteward();
		$this->wee->redirect('index', 'index/sucesso/1');
	}

}