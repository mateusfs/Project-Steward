<?php
class importarController extends Security {

	public function index() {
		$error = $this->getRequest('error');
		$sucesso = $this->getRequest('sucesso');

		$this->wee->sucesso = $sucesso;
		$this->wee->error = $error;
		$this->wee->show('index');
	}

	public function save(){

		$arquivo = $this->getFile('arquivo');
		$tipoSalvado = $this->getPost('tipo');
		$tipoValido = array("application/vnd.ms-excel", 'application/octet-stream', 'text/xml', 'text/plain');

		if(in_array($arquivo["type"], $tipoValido) != true){
			$this->wee->redirect('importar', 'index/error/1');
		}else{
			if($arquivo["type"] == 'application/octet-stream'){
				$arq = file($_FILES['arquivo']['tmp_name']);
				Importar::importSql($arq);
			}else{

				$formatoCompraItem = array('IdCliente','data', 'idProduto', 'valor', 'quantidade');
				$formatoCompra = array('IdCliente','data');
				$formatoItem = array('IdCliente','idProduto', 'valor', 'quantidade');
				$formatoProduto = array('nome','valor','marca','modelo','idCategoria','descricao');
				$formatoCliente = array('nome','dataNascimento','foto','sexo','funcao','email','telefone','idNota','idEstadoCivil','idLingua','idSistema');
	
				$contaEfetuados = 0;
				$contaCancelados = 0;
	
				$arq = fopen($_FILES['arquivo']['tmp_name'], "r");
	
				if($tipoSalvado == "compraItens"){
					$temp = fgetcsv($arq, 1000, ",");
					if($temp == $formatoCompraItem){
						while (($temp = fgetcsv($arq, 1000, ",")) !== FALSE) {
							Importar::importCompraItens($temp);
						}
					}else{
						$this->wee->redirect('importar', 'index/error/2');
					}
				}
	
				if($tipoSalvado == "compra"){
					$temp = fgetcsv($arq, 1000, ",");
					if($temp == $formatoCompra){
						while (($temp = fgetcsv($arq, 1000, ",")) !== FALSE) {
							Importar::importCompra($temp);
						}
					}else{
						$this->wee->redirect('importar', 'index/error/2');
					}
				}
	
				if($tipoSalvado == "item"){
					$temp = fgetcsv($arq, 1000, ",");
					if($temp == $formatoItem){
						while (($temp = fgetcsv($arq, 1000, ",")) !== FALSE) {
							Importar::importItem($temp);
						}
					}else{
						$this->wee->redirect('importar', 'index/error/2');
					}
				}
	
				if($tipoSalvado == "produto"){
					$temp = fgetcsv($arq, 1000, ",");
					if($temp == $formatoProduto){
						while (($temp = fgetcsv($arq, 1000, ",")) !== FALSE) {
							Importar::importProduto($temp);
						}
					}else{
						$this->wee->redirect('importar', 'index/error/2');
					}
				}
				if($tipoSalvado == "cliente"){
					$temp = fgetcsv($arq, 1000, ",");
					if($temp == $formatoProduto){
						while (($temp = fgetcsv($arq, 1000, ",")) !== FALSE) {
							Importar::importCliente($temp);
						}
					}else{
						$this->wee->redirect('importar', 'index/error/2');
					}
				}
			}
		}

		$this->wee->redirect('importar', 'index/sucesso/1');
	}
}