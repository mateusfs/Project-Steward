<?php
class Importar extends Base{

	public static function importCompraItens($temp) {
		
		$compra = new Compra();
		$compra->setIdcliente($temp[0]);
		$compra->setData($temp[1]);
		$compra->save();

		$compra = Compra::retrieveUltima();
		
		if($compra){
			$item = new Item();
			$item->setIdcompra($compra->getCodigo());
			$item->setIdproduto($temp[2]);
			$item->setValor($temp[3]);
			$item->setQuantidade($temp[4]);
			$item->save();

			$one = new OsoUserRatings();
			$one->setItemId($temp[2]);
			$one->setUserId($temp[0]);
			$one->setRating(rand(0.0001, 10.0000));
			$one->save();
		}
	}
	
	public static function importSql($temp) {
		
		$db = Database::getInstance();
		foreach ($temp as $t) {
			$sql .= $t;
		}
		
		try{
			$db->beginTransaction();
			$db->execute($sql, $sqlParam);
			$db->commit();
			return true;
		}catch (PDOException $e) {
			$db->rollBack();
			throw new PDOException($e->getMessage());
		}
		
	}

	public static function importCompra($temp) {
		$compra = new Compra();
		$compra->setIdcliente($temp[0]);
		$compra->setData($temp[1]);
		$compra->save();
	}

	public static function importItem($temp) {
		$item = new Item();
		$item->setIdcompra($compra->getCodigo());
		$item->setIdproduto($temp[2]);
		$item->setQuantidade($temp[4]);
		$item->setValor($temp[3]);
		$item->save();
	}


	public static function importProduto($temp) {
		$produto = new Produto();
		$produto->setNome($temp[0]);
		$produto->setValor(NumberUtils::convertToDB($temp[1]));
		$produto->setMarca($temp[2]);
		$produto->setModelo($temp[3]);
		$produto->setIdcategoria($temp[4]);
		$produto->setDescricao($temp[5]);
		$produto->save();
	}
	
	public static function importCliente($temp) {
		$cliente = new Cliente();
		$cliente->setNome($temp[0]);
		$cliente->setDatanascimento($temp[1]);
		$cliente->setSexo($temp[2]);
		$cliente->setFuncao($temp[3]);
		$cliente->setEmail($temp[4]);
		$cliente->setTelefone($temp[5]);
		$cliente->setIdNota($temp[6]);
		$cliente->setIdestadocivil($temp[7]);
		$cliente->setIdLingua($temp[8]);
		$cliente->setIdsistema($temp[9]);
		$cliente->save();
	}

}