<?php
class grupoController extends Security {

	public function index() {
		$sucesso = $this->getRequest('sucesso');

		$grupos = Grupo::retrieveAll();
		$this->wee->grupos = $grupos;
		$this->wee->show('index');
	}


	public function novo() {
		$codigo = $this->getRequest('codigo');
		$error = $this->getRequest('error');
		$sucesso = $this->getRequest('sucesso');

		$grupo = Grupo::retrieveByPk($codigo);
		$grupoModulos =  GrupoModulo::RetrieveAllGrupo($codigo);

		$this->wee->sucesso = $sucesso;
		$this->wee->grupoModulos = $grupoModulos;
		$this->wee->grupo = $grupo;
		$this->wee->error = $error;
		$this->wee->show('novo');
	}



	public function salvar() {
		$nome = $this->getPost('nome');
		$codigo = $this->getPost('codigo');

		if(!$codigo){
			$grupos = Grupo::retrieveAll();
			foreach ($grupos as $row) {
				if(trim($row->getNome()) === trim($nome)){
					$this->wee->redirect('grupo','novo/error/1');
					die();
				}
			}
			if($nome){
				$grupo = new Grupo();
				$grupo->setNome($nome);
				$grupo->save();

				if($grupo){
					GrupoModulo::adicionaGrupoNovo($idGrupo);
				}
			}
		}else{
			$grupo = Grupo::retrieveByPk($codigo);
			if($grupo){
				$grupo->setNome($nome);
				$grupo->save();
			}
		}
		$this->wee->redirect('grupo');
	}

	public function salvaStatus() {
		$grupo = $this->getPost('grupo');
		$modulo = $this->getPost('modulo');

		$grupoModulo = GrupoModulo::retrieveByPk($grupo, $modulo);

		if($grupoModulo){
				$grupoModulo->setIdStatus(($grupoModulo->getIdStatus() == '1')?'0':'1');
				$grupoModulo->saveStatus();
		}
	}

	public function excluir() {
		$codigo = $this->getRequest('codigo');

		if($codigo){
			$grupo = Grupo::retrieveByPk($codigo);
			$usuarios = Usuario::retrieveAllGrupoUsuario($codigo);

			if($usuarios){
				$this->wee->redirect('grupo','novo/error/2');
				die();
			}

			if($grupo && !$usuarios){
				$grupo->delete();
			}
		}
		$this->wee->redirect('grupo');
	}

}