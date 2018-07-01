<?php

/**
 * Classe Base da tabela [sistema]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Sistema
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseSistema extends Base {

	const TABLE_NAME = 'sistema';
	const CODIGO = 'codigo';
	const NOME = 'nome';
	const IDEMPRESA = 'idEmpresa';
	const IDSTATUS = 'idStatus';

	protected $codigo;
	protected $nome;
	protected $idempresa;
	protected $idstatus;

	/**
	 * @var Sistema
	 */
	protected $jSistema = null;



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
	 * @param int $idempresa
	 */
	public function setIdempresa($idempresa) {
		$this->idempresa = $idempresa;
	}

	/**
	 * @return int
	 */
	public function getIdempresa() {
		return $this->idempresa;
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
	 * @return Sistema|null
	 */
	public static function retrieveByPk($codigo, $idstatus = null, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':codigo'] = $codigo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM sistema WHERE codigo = :codigo " ; 

		if (!is_null($idstatus)) {
			$sql.= " AND idStatus = :idStatus";
			$sqlParam[':idStatus'] = $idstatus;
		}

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Sistema();
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
					sistema
				SET
					codigo = :codigo
					, nome = :nome
					, idEmpresa = :idEmpresa
					, idStatus = :idStatus
				WHERE
					codigo = :codigo
			";

			}
		} else {

			$sql = "
				INSERT INTO
					sistema
				(
					codigo
					, nome
					, idEmpresa
					, idStatus
				) VALUES (
					:codigo
					, :nome
					, :idEmpresa
					, :idStatus
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':codigo'] = $this->codigo;
		$sqlParam[':nome'] = $this->nome;
		$sqlParam[':idEmpresa'] = $this->idempresa;
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
				sistema
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
	 * @param Sistema $sistema
	 */
	public function setSistema(Sistema $sistema) {
		$this->jSistema = $sistema;
	}

	/**
	 * @throws PDOException
	 * @return Sistema|null
	 */
	public function getSistema() {

		if (is_null($this->jSistema)) {
			$this->jSistema = Sistema::retrieveByPk($this->idstatus);
		}

		return $this->jSistema;
	}

}