<?php
class moduloController extends Security {

	public function index() {
		$sucesso = $this->getRequest('sucesso');

		$modulos =  Modulo::retrieveAll();

		$this->wee->sucesso = $sucesso;
		$this->wee->modulos = $modulos;
		$this->wee->show('index');
	}

	public function salvar() {
		$codigo = $this->getRequest('codigo');

		if($codigo){
			$modulo =  Modulo::retrieveByPk($codigo);

			if($modulo){
				if($modulo->getIdStatus() == 1){
					$modulo->setIdStatus(0);
					$modulo->save();
				}else{
					$modulo->setIdStatus(1);
					$modulo->save();
				}
			}
		}

		$this->wee->redirect('modulo', 'index/sucesso/1');
	}
}