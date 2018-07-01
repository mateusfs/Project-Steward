<?php

/**
 * Classe Base da tabela [item]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Item
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseItem extends Base {

	const TABLE_NAME = 'item';
	const CODIGO = 'codigo';
	const IDCOMPRA = 'idCompra';
	const IDPRODUTO = 'idProduto';
	const VALOR = 'valor';
	const QUANTIDADE = 'quantidade';

	protected $codigo;
	protected $idcompra;
	protected $idproduto;
	protected $valor;
	protected $quantidade;

	/**
	 * @var Item
	 */
	protected $jItem = null;



	/**
	 * @param int $codigo
	 */
	public function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	/**
	 * @return int
	 */
	public function getCodigo() {
		return $this->codigo;
	}

	/**
	 * @param int $idcompra
	 */
	public function setIdcompra($idcompra) {
		$this->idcompra = $idcompra;
	}

	/**
	 * @return int
	 */
	public function getIdcompra() {
		return $this->idcompra;
	}

	/**
	 * @param int $idproduto
	 */
	public function setIdproduto($idproduto) {
		$this->idproduto = $idproduto;
	}

	/**
	 * @return int
	 */
	public function getIdproduto() {
		return $this->idproduto;
	}

	/**
	 * @param float $valor
	 */
	public function setValor($valor) {
		$this->valor = $valor;
	}

	/**
	 * @return float
	 */
	public function getValor() {
		return $this->valor;
	}

	/**
	 * @param float $quantidade
	 */
	public function setQuantidade($quantidade) {
		$this->quantidade = $quantidade;
	}

	/**
	 * @return float
	 */
	public function getQuantidade() {
		return $this->quantidade;
	}

	/**
	 * @param int $codigo
	 * @param int $idcompra
	 * @param int $idproduto
	 * @throws PDOException
	 * @return Item|null
	 */
	public static function retrieveByPk($codigo, $idcompra, $idproduto = null, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':codigo'] = $codigo;
		$sqlParam[':idCompra'] = $idcompra;


		$db = Database::getInstance();
		$sql = "SELECT * FROM item WHERE codigo = :codigo AND idCompra = :idCompra " ; 

		if (!is_null($idproduto)) {
			$sql.= " AND idProduto = :idProduto";
			$sqlParam[':idProduto'] = $idproduto;
		}

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Item();
				$obj->hydrate($result);

				return $obj;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}


	/**
	 * @throws PDOException
	 * @return void
	 */
	public function save() {

		$db = Database::getInstance();

		if ($this->codigo   && $this->idcompra  ) {

			 if($this->retrieveByPk($this->codigo, $this->idcompra)){

			$sql = "
				UPDATE
					item
				SET
					codigo = :codigo
					, idCompra = :idCompra
					, idProduto = :idProduto
					, valor = :valor
					, quantidade = :quantidade
				WHERE
					codigo = :codigo
					AND idCompra = :idCompra
			";

			}
		} else {

			$sql = "
				INSERT INTO
					item
				(
					codigo
					, idCompra
					, idProduto
					, valor
					, quantidade
				) VALUES (
					:codigo
					, :idCompra
					, :idProduto
					, :valor
					, :quantidade
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':codigo'] = $this->codigo;
		$sqlParam[':idCompra'] = $this->idcompra;
		$sqlParam[':idProduto'] = $this->idproduto;
		$sqlParam[':valor'] = $this->valor;
		$sqlParam[':quantidade'] = $this->quantidade;

		try{
			$db->beginTransaction();
			$db->execute($sql, $sqlParam);
			$db->commit();
			return true;
		} catch (PDOException $e) {
			$db->rollBack();
			throw new PDOException($e->getMessage());
		}
	}

	/**
	 * @throws PDOException
	 * @return void
	 */
	public function delete() {

		$sqlParam = array();
		$sqlParam[':codigo'] = $this->codigo;
		$sqlParam[':idCompra'] = $this->idcompra;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				item
			WHERE
				codigo = :codigo
				AND idCompra = :idCompra
		";
		if (!is_null($this->idproduto)) {
			$sql.= " AND idProduto = :idProduto";
			$sqlParam[':idProduto'] = $this->idproduto;
		}

		try{
			$db->beginTransaction();
			$db->execute($sql, $sqlParam);
			$db->commit();
		} catch (PDOException $e) {
			$db->rollBack();
			throw new PDOException($e->getMessage());
		}
	}

	/**
	 * @param Item $item
	 */
	public function setItem(Item $item) {
		$this->jItem = $item;
	}

	/**
	 * @throws PDOException
	 * @return Item|null
	 */
	public function getItem() {

		if (is_null($this->jItem)) {
			$this->jItem = Item::retrieveByPk($this->idproduto);
		}

		return $this->jItem;
	}

}