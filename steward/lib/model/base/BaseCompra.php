<?php

/**
 * Classe Base da tabela [compra]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Compra
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseCompra extends Base {

	const TABLE_NAME = 'compra';
	const CODIGO = 'codigo';
	const IDCLIENTE = 'idCliente';
	const DATA = 'data';

	protected $codigo;
	protected $idcliente;
	protected $data;

	/**
	 * @var Compra
	 */
	protected $jCompra = null;



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
	 * @param int $idcliente
	 */
	public function setIdcliente($idcliente) {
		$this->idcliente = $idcliente;
	}

	/**
	 * @return int
	 */
	public function getIdcliente() {
		return $this->idcliente;
	}

	/**
	 * @param date $data
	 */
	public function setData($data) {
		$this->data = $data;
	}

	/**
	 * @return date
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * @return date|time|null
	 */
	public function getDataFormatada($formato = 'd/m/Y') {
		if (!$this->getData()) {
			return null;
		}
		return date($formato, strtotime($this->getData()));
	}

	/**
	 * @param int $codigo
	 * @param int $idcliente
	 * @throws PDOException
	 * @return Compra|null
	 */
	public static function retrieveByPk($codigo, $idcliente = null, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':codigo'] = $codigo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM compra WHERE codigo = :codigo " ; 

		if (!is_null($idcliente)) {
			$sql.= " AND idCliente = :idCliente";
			$sqlParam[':idCliente'] = $idcliente;
		}

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Compra();
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

		if ($this->codigo  ) {

			 if($this->retrieveByPk($this->codigo)){

			$sql = "
				UPDATE
					compra
				SET
					codigo = :codigo
					, idCliente = :idCliente
					, data = :data
				WHERE
					codigo = :codigo
			";

			}
		} else {

			$sql = "
				INSERT INTO
					compra
				(
					codigo
					, idCliente
					, data
				) VALUES (
					:codigo
					, :idCliente
					, :data
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':codigo'] = $this->codigo;
		$sqlParam[':idCliente'] = $this->idcliente;
		$sqlParam[':data'] = $this->timeToDate($this->data);

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

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				compra
			WHERE
				codigo = :codigo
		";
		if (!is_null($this->idcliente)) {
			$sql.= " AND idCliente = :idCliente";
			$sqlParam[':idCliente'] = $this->idcliente;
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
	 * @param Compra $compra
	 */
	public function setCompra(Compra $compra) {
		$this->jCompra = $compra;
	}

	/**
	 * @throws PDOException
	 * @return Compra|null
	 */
	public function getCompra() {

		if (is_null($this->jCompra)) {
			$this->jCompra = Compra::retrieveByPk($this->idcliente);
		}

		return $this->jCompra;
	}

}