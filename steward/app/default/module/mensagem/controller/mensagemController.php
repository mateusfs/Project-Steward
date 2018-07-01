<?php
class mensagemController extends Security {

	public function index() {

		$mensagens = Mensagem::retrieveALL();

		$this->wee->mensagens = $mensagens;
		$this->wee->show('index');
	}

	public function editar() {
		$codigo = $this->getRequest('codigo');
		$mensagem = Mensagem::retrieveByPk($codigo);

		$this->wee->codigo = $codigo;
		$this->wee->mensagem = $mensagem;
		$this->wee->show('editar');
	}

	public function salvar(){
		$codigo = $this->getPost('codigo');
		$apelido = $this->getPost('apelido');
		$texto = $this->getPost('texto');

		if($codigo){
			$mensagem = Mensagem::retrieveByPk($codigo);
			if($mensagem){
				$mensagem->setApelido($apelido);
				$mensagem->setTexto($texto);
				$mensagem->save();
			}
		}
		$this->wee->redirect('mensagem', 'index');
	}
}