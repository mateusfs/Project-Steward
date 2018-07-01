<?php

/**
 * Classe Base da tabela [categoria]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Categoria
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseCategoria extends Base {

	const TABLE_NAME = 'categoria';
	const CODIGO = 'codigo';
	const NOME = 'nome';
	const IDSISTEMA = 'idSistema';

	protected $codigo;
	protected $nome;
	protected $idsistema;

	/**
	 * @var Categoria
	 */
	protected $jCategoria = null;



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
	 * @param int $idsistema
	 */
	public function setIdsistema($idsistema) {
		$this->idsistema = $idsistema;
	}

	/**
	 * @return int
	 */
	public function getIdsistema() {
		return $this->idsistema;
	}

	/**
	 * @param int $codigo
	 * @param int $idsistema
	 * @throws PDOException
	 * @return Categoria|null
	 */
	public static function retrieveByPk($codigo, $idsistema = null, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':codigo'] = $codigo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM categoria WHERE codigo = :codigo " ; 

		if (!is_null($idsistema)) {
			$sql.= " AND idSistema = :idSistema";
			$sqlParam[':idSistema'] = $idsistema;
		}

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Categoria();
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
					categoria
				SET
					codigo = :codigo
					, nome = :nome
					, idSistema = :idSistema
				WHERE
					codigo = :codigo
			";

			}
		} else {

			$sql = "
				INSERT INTO
					categoria
				(
					codigo
					, nome
					, idSistema
				) VALUES (
					:codigo
					, :nome
					, :idSistema
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':codigo'] = $this->codigo;
		$sqlParam[':nome'] = $this->nome;
		$sqlParam[':idSistema'] = $this->idsistema;

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
				categoria
			WHERE
				codigo = :codigo
		";
		if (!is_null($this->idsistema)) {
			$sql.= " AND idSistema = :idSistema";
			$sqlParam[':idSistema'] = $this->idsistema;
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
	 * @param Categoria $categoria
	 */
	public function setCategoria(Categoria $categoria) {
		$this->jCategoria = $categoria;
	}

	/**
	 * @throws PDOException
	 * @return Categoria|null
	 */
	public function getCategoria() {

		if (is_null($this->jCategoria)) {
			$this->jCategoria = Categoria::retrieveByPk($this->idsistema);
		}

		return $this->jCategoria;
	}

}