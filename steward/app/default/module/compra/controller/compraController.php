<?php
class compraController extends Security {

	public function index() {
		$busca = $this->getPost('busca');

		if($busca){
			$compras = Compra::retrieveBusca($busca);
		}else{
			$compras = Compra::retrieveAtivos();
		}


		$this->wee->compras = $compras;
		$this->wee->show('index');
	}


	public function editar() {
		$codigo = $this->getRequest('codigo');
		$compra = Compra::retrieveByPk($codigo);
		$cliente = Cliente::retrieveByPk($compra->getIdCliente());
		$itens = Item::retrieveByCompra($compra->getCodigo());

		$this->wee->codigo = $codigo;
		$this->wee->compra = $compra;
		$this->wee->cliente = $cliente;
		$this->wee->itens = $itens;
		$this->wee->show('editar');
	}

	public function novo() {
		$error = $this->getRequest('error');

		$this->wee->error = $error;
		$this->wee->show('novo');
	}

	public function salvar() {
		$cliente = $this->getPost('cliente');
		$valor = $this->getPost('valor');
		$produtos = $this->getPost('produtos');
		$rating = rand(0.0001, 10.0000);
		$quantidade = $this->getPost('quantidade');

		foreach(array_count_values($produtos) as $key => $produto){
			if($produto > 1){
				$this->wee->redirect('compra','novo/error/1');
			}
		}

		if($cliente){
			$compra = new Compra();
			$compra->setIdcliente($cliente);
			$compra->setData(date('d-m-Y'));
			$compra->save();

			$clienteCompelto =  Cliente::retrieveByPk($cliente);
			if($clienteCompelto){
				$clienteCompelto->setIdnota($clienteCompelto->getIdnota() +1);
				$clienteCompelto->save();
			}
		}
		$compra = Compra::retrieveUltima();

		if($compra){
			foreach ($produtos as $key => $produto) {
				$item = new Item();
				$item->setIdcompra($compra->getCodigo());
				$item->setIdproduto($produtos[$key]);
				$item->setQuantidade($quantidade[$key]);
				$item->setValor(NumberUtils::convertToDB($valor[$key]));
				$item->save();

				$one = new OsoUserRatings();
				$one->setItemId($produtos[$key]);
				$one->setUserId($cliente);
				$one->setRating($rating);
				$one->save();

			}
		}

		$this->wee->redirect('compra');
	}

	public function deletar() {
		$codigo = $this->getPost('codigo');
		$compra = Compra::retrieveByPk($codigo);
		if($compra){
			$itens = Item::retrieveByCompra($compra->getCodigo());
			foreach ($itens as $row) {
				$row->delete();
			}
			$compra->delete();
		}
		$this->wee->show('index');
	}

}