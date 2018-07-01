<?php
class contatoController extends Security {

	public function index() {
		$this->wee->show('index');
	}

	public function salvar(){
		$nome = $this->getPost('nome');
		$email = $this->getPost('email');
		$comentario = $this->getPost('comentario');

		if($nome && $email && $comentario){
			Funcoes::emailContato($nome, $email, $comentario);
		}
		$this->wee->redirect('index', 'index/sucesso/3');
	}
}