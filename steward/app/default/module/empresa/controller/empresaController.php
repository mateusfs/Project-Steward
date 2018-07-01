<?php
class empresaController extends Security {

	public function index() {

		$empresas = Empresa::retrieveAll();

		$this->wee->empresas = $empresas;
		$this->wee->show('index');
	}


	public function editar(){
		$codigo = $this->getRequest('codigo');
		$error = $this->getRequest('error');

		$empresa = Empresa::retrieveByPk($codigo);

		$sistemas =  Sistema::retrieveByEmpresa($codigo);

		$this->wee->sistemas = $sistemas;
		$this->wee->empresa = $empresa;
		$this->wee->error = $error;
		$this->wee->show('editar');
	}

	public function novo() {
		$error = $this->getRequest('error');

		$this->wee->error = $error;
		$this->wee->show('novo');
	}


	public function salvarNovo() {
		$nome = $this->getPost('nome');
		$status = $this->getPost('status');

		$empresa = Empresa::retrieveAll();
		foreach ($empresa as $row) {
			if(trim($row->getNome()) === trim($nome)){
				$this->wee->redirect('empresa','novo/error/1');
				die();
			}
		}

		if($nome){
			$empresa = new Empresa();
			$empresa->setNome($nome);
			$empresa->setIdStatus($status);
			$empresa->save();
		}

		$this->wee->redirect('empresa');
	}

	public function salvaEmpresa() {
		$nome = $this->getPost('nome');
		$codigo = $this->getPost('codigo');
		$status = $this->getPost('status');

		$empresa = Empresa::retrieveByPk($codigo);
		if($empresa && $nome){
			$empresa->setNome($nome);
			$empresa->setIdStatus($status);
			$empresa->save();
		}

		$this->wee->redirect('empresa','editar/codigo/'.$codigo);
	}

	public function salvaStatus() {
		$codigo = $this->getPost('codigo');
		$tipo = $this->getPost('tipo');

		if($tipo == 'empresa'){
			$empresa = Empresa::retrieveByPk($codigo);

			if($empresa){
				$empresa->setIdStatus(($empresa->getIdStatus() == '1')?'0':'1');
				$empresa->save();
			}
		}else{
			$sistema = Sistema::retrieveByPk($codigo);
			if($sistema){
				$sistema->setIdStatus(($sistema->getIdStatus() == '1')?'0':'1');
				$sistema->save();
			}
		}

	}

	public function salvaSistema() {
		$nome = $this->getPost('nome');
		$codigo = $this->getPost('codigo');
		$status = $this->getPost('status');

		$sistema = Empresa::retrieveAll();

		foreach ($sistema as $row) {
			if(trim($row->getNome()) === trim($nome)){
				$this->wee->redirect('empresa','editar/codigo/'.$codigo.'/error/1');
				die();
			}
		}

		if($codigo && $nome){
			$sistema = new Sistema();
			$sistema->setNome($nome);
			$sistema->setIdStatus($status);
			$sistema->setIdEmpresa($codigo);
			$sistema->save();
		}
		$this->wee->redirect('empresa','editar/codigo/'.$codigo);
	}


	public function deletarSistema() {

		$codigo = $this->getRequest('codigo');

		$sistema = Sistema::retrieveByPk($codigo);

		if($sistema){
			if($sistema->delete()){
				$this->wee->redirect('empresa','editar/codigo/'.$sistema->getIdempresa().'/error/3');
			}
		}

		$this->wee->redirect('empresa','editar/codigo/'.$sistema->getIdempresa());
	}


	public function deletarEmpresa() {
		$codigo = $this->getRequest('codigo');

		$empresa = Empresa::retrieveByPk($codigo);

		if($empresa){
			$tarefa = Tarefa::retrieveByEmpresa($codigo);
			if(!$tarefa){
				if($empresa->delete()){
					$this->wee->redirect('empresa','editar/codigo/'.$codigo.'/error/2');
				}
			}else{
				$this->wee->redirect('empresa','editar/codigo/'.$codigo.'/error/2');
			}
		}

		$this->wee->redirect('empresa');
	}

}