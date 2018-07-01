<?php
class clienteController extends Security {

	public function index() {
		$busca = $this->getPost('busca');
		$expo = $this->getRequest('expo');

		if($busca){
			$clientes = Cliente::retrieveBusca($busca);
		}else if($expo){
			$clientes = Cliente::retrieveExpo($expo);
		}else{
			$clientes = Cliente::retrieveAtivos();
		}

		$this->wee->expo = $expo;
		$this->wee->clientes = $clientes;
		$this->wee->show('index');
	}
}