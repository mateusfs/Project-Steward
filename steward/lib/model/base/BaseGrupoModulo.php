<?php

/**
 * Classe Base da tabela [grupo_modulo]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo GrupoModulo
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseGrupoModulo extends Base {

	const TABLE_NAME = 'grupo_modulo';
	const IDGRUPOUSUARIO = 'idgrupousuario';
	const IDMODULO = 'idmodulo';
	const IDSTATUS = 'idstatus';

	protected $idgrupousuario;
	protected $idmodulo;
	protected $idstatus;

	/**
	 * @var GrupoModulo
	 */
	protected $jGrupoModulo = null;



	/**
	 * @param int $idgrupousuario
	 */
	public function setIdgrupousuario($idgrupousuario) {
		$this->idgrupousuario = $idgrupousuario;
	}

	/**
	 * @return int
	 */
	public function getIdgrupousuario() {
		return $this->idgrupousuario;
	}

	/**
	 * @param int $idmodulo
	 */
	public function setIdmodulo($idmodulo) {
		$this->idmodulo = $idmodulo;
	}

	/**
	 * @return int
	 */
	public function getIdmodulo() {
		return $this->idmodulo;
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
	 * @param int $idgrupousuario
	 * @param int $idmodulo
	 * @param int $idmodulo
	 * @throws PDOException
	 * @return GrupoModulo|null
	 */
	public static function retrieveByPk($idgrupousuario, $idmodulo, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':idgrupousuario'] = $idgrupousuario;
		$sqlParam[':idmodulo'] = $idmodulo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM grupo_modulo WHERE idgrupousuario = :idgrupousuario AND idmodulo = :idmodulo " ; 
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new GrupoModulo();
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

		if ($this->idgrupousuario   && $this->idmodulo  ) {

			 if($this->retrieveByPk($this->idgrupousuario, $this->idmodulo)){

			$sql = "
				UPDATE
					grupo_modulo
				SET
					idgrupousuario = :idgrupousuario
					, idmodulo = :idmodulo
					, idstatus = :idstatus
				WHERE
					idgrupousuario = :idgrupousuario
					AND idmodulo = :idmodulo
			";

			}
		} else {

			$sql = "
				INSERT INTO
					grupo_modulo
				(
					idgrupousuario
					, idmodulo
					, idstatus
				) VALUES (
					:idgrupousuario
					, :idmodulo
					, :idstatus
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':idgrupousuario'] = $this->idgrupousuario;
		$sqlParam[':idmodulo'] = $this->idmodulo;
		$sqlParam[':idstatus'] = $this->idstatus;

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
		$sqlParam[':idgrupousuario'] = $this->idgrupousuario;
		$sqlParam[':idmodulo'] = $this->idmodulo;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				grupo_modulo
			WHERE
				idgrupousuario = :idgrupousuario
				AND idmodulo = :idmodulo
		";
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
	 * @param GrupoModulo $grupoModulo
	 */
	public function setGrupoModulo(GrupoModulo $grupoModulo) {
		$this->jGrupoModulo = $grupoModulo;
	}

	/**
	 * @throws PDOException
	 * @return GrupoModulo|null
	 */
	public function getGrupoModulo() {

		if (is_null($this->jGrupoModulo)) {
			$this->jGrupoModulo = GrupoModulo::retrieveByPk($this->idmodulo);
		}

		return $this->jGrupoModulo;
	}

}