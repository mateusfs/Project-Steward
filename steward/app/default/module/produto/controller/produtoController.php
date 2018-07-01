<?php
class produtoController extends Security {

	public function index() {
		$error = $this->getRequest('error');
		$busca = $this->getPost('busca');
		$expo = $this->getRequest('expo');

		if($busca){
			$produtos = Produto::retrieveBusca($busca);
		}elseif($expo){
			$produtos = Produto::retrieveExpo($expo);
		}else{
			$produtos = Produto::retrieveAtivos();
		}

		$this->wee->produtos = $produtos;
		$this->wee->expo = $expo;
		$this->wee->error = $error;
		$this->wee->show('index');
	}


	public function mostra(){
		$codigo = $this->getRequest('codigo');
		$error = $this->getRequest('error');

		$produto = Produto::retrieveByPk($codigo);

		$this->wee->produto = $produto;
		$this->wee->error = $error;
		$this->wee->show('mostra');
	}

	public function editar() {
		$codigo = $this->getRequest('codigo');
		$error = $this->getRequest('error');

		$produto = Produto::retrieveByPk($codigo);
		if(!$produto){
			$produto = new Produto();
		}

		$this->wee->produto = $produto;
		$this->wee->error = $error;
		$this->wee->show('editar');
	}


	public function salvar() {
		$codigo = $this->getPost('codigo');
		$nome = $this->getPost('nome');
		$valor = $this->getPost('valor');
		$marca = $this->getPost('marca');
		$categoria = $this->getPost('categoria');
		$modelo = $this->getPost('modelo');
		$descricao = $this->getPost('descricao');

		if(!$codigo){
			$produtos = Produto::retrieveAll();

			foreach ($produtos as $row) {
				if(trim($row->getNome()) === trim($nome)){
					$this->wee->redirect('produto','editar/error/1');
					die();
				}
			}
		}
		if($nome == null){
			$this->wee->redirect('produto','index/error/1');
		}
		if($modelo == null){
			$this->wee->redirect('produto','index/error/2');
		}
		if($marca == null){
			$this->wee->redirect('produto','index/error/3');
		}
		if($valor == null){
			$this->wee->redirect('produto','index/error/4');
		}

		$produto = Produto::retrieveByPk($codigo);

		if($produto){
			$produto->setCodigo($codigo);
			$produto->setNome($nome);
			$produto->setValor(NumberUtils::convertToDB($valor));
			$produto->setMarca($marca);
			$produto->setIdcategoria($categoria);
			$produto->setModelo($modelo);
			$produto->setDescricao($descricao);
			$produto->save();

		}else{
			$produto = new Produto();
			$produto->setNome($nome);
			$produto->setValor(NumberUtils::convertToDB($valor));
			$produto->setMarca($marca);
			$produto->setIdcategoria($categoria);
			$produto->setModelo($modelo);
			$produto->setDescricao($descricao);
			$produto->save();
		}

		$this->wee->redirect('produto');
	}


	public function deletar() {
		$codigo = $this->getRequest('codigo');

		$produto = Produto::retrieveByPk($codigo);

		if($produto){
			if($produto->delete()){
				$this->wee->redirect('produto','editar/codigo/'.$codigo.'/error/2');
			}
		}
		$this->wee->redirect('produto');
	}

}