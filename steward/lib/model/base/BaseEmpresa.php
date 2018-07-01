<?php

/**
 * Classe Base da tabela [empresa]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Empresa
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseEmpresa extends Base {

	const TABLE_NAME = 'empresa';
	const CODIGO = 'codigo';
	const NOME = 'nome';
	const IDSTATUS = 'idStatus';

	protected $codigo;
	protected $nome;
	protected $idstatus;

	/**
	 * @var Empresa
	 */
	protected $jEmpresa = null;



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
	 * @param varchar $nome
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}

	/**
	 * @return varchar
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @param int $idstatus
	 */
	public function setIdstatus($idstatus) {
		$this->idstatus = $idstatus;
	}

	/**
	 * @return int
	 */
	public function getIdstatus() {
		return $this->idstatus;
	}

	/**
	 * @param int $codigo
	 * @param int $idstatus
	 * @throws PDOException
	 * @return Empresa|null
	 */
	public static function retrieveByPk($codigo, $idstatus = null, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':codigo'] = $codigo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM empresa WHERE codigo = :codigo " ; 

		if (!is_null($idstatus)) {
			$sql.= " AND idStatus = :idStatus";
			$sqlParam[':idStatus'] = $idstatus;
		}

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Empresa();
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
					empresa
				SET
					codigo = :codigo
					, nome = :nome
					, idStatus = :idStatus
				WHERE
					codigo = :codigo
			";

			}
		} else {

			$sql = "
				INSERT INTO
					empresa
				(
					codigo
					, nome
					, idStatus
				) VALUES (
					:codigo
					, :nome
					, :idStatus
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':codigo'] = $this->codigo;
		$sqlParam[':nome'] = $this->nome;
		$sqlParam[':idStatus'] = $this->idstatus;

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
				empresa
			WHERE
				codigo = :codigo
		";
		if (!is_null($this->idstatus)) {
			$sql.= " AND idStatus = :idStatus";
			$sqlParam[':idStatus'] = $this->idstatus;
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
	 * @param Empresa $empresa
	 */
	public function setEmpresa(Empresa $empresa) {
		$this->jEmpresa = $empresa;
	}

	/**
	 * @throws PDOException
	 * @return Empresa|null
	 */
	public function getEmpresa() {

		if (is_null($this->jEmpresa)) {
			$this->jEmpresa = Empresa::retrieveByPk($this->idstatus);
		}

		return $this->jEmpresa;
	}

}