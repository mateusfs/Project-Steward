<?php
class categoriaController extends Security {

	public function index() {
		$busca = $this->getPost('busca');

		if($busca){
			$categorias = Categoria::retrieveBusca($busca);
		}else{
			$categorias = Categoria::retrieveAtivos();
		}


		$this->wee->categorias = $categorias;
		$this->wee->show('index');
	}

	public function editar() {
		$codigo = $this->getRequest('codigo');

		if($codigo){
			$categoria = Categoria::retrieveByPk($codigo);
		}else{
			$categoria = new Categoria();
		}

		$this->wee->categoria = $categoria;
		$this->wee->show('editar');
	}


	public function salvar(){
		$codigo = $this->getPost('codigo');
		$nome = $this->getPost('nome');

		if($codigo){
			$categoria = Categoria::retrieveByPk($codigo);
			if($categoria){
				$categoria->setNome($nome);
				$categoria->save();
			}
		}else{
			$categoria = new Categoria();
			$categoria->setNome($nome);
			$categoria->setIdSistema(Sistema::retrieveByEmpresaSistema()->getCodigo());
			$categoria->save();
		}
		$this->wee->redirect('categoria', 'index');
	}

	public function deletar(){
		$codigo = $this->getRequest('codigo');

		if($codigo){
			$categoria = Categoria::retrieveByPk($codigo);
			if($categoria){
				$categoria->delete();
			}
		}
			$this->wee->redirect('categoria', 'index');
	}

}