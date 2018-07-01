<?php

/**
 * Classe Base da tabela [estado_civil]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo EstadoCivil
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseEstadoCivil extends Base {

	const TABLE_NAME = 'estado_civil';
	const CODIGO = 'codigo';
	const NOME = 'nome';

	protected $codigo;
	protected $nome;



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
	 * @throws PDOException
	 * @return EstadoCivil|null
	 */
	public static function retrieveByPk($codigo, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':codigo'] = $codigo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM estado_civil WHERE codigo = :codigo " ; 
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new EstadoCivil();
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
					estado_civil
				SET
					codigo = :codigo
					, nome = :nome
				WHERE
					codigo = :codigo
			";

			}
		} else {

			$sql = "
				INSERT INTO
					estado_civil
				(
					codigo
					, nome
				) VALUES (
					:codigo
					, :nome
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':codigo'] = $this->codigo;
		$sqlParam[':nome'] = $this->nome;

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
				estado_civil
			WHERE
				codigo = :codigo
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

}