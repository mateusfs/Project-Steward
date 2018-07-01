<?php

/**
 * Classe Base da tabela [mensagem]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Mensagem
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseMensagem extends Base {

	const TABLE_NAME = 'mensagem';
	const CODIGO = 'codigo';
	const NOME = 'nome';
	const TEXTO = 'texto';
	const APELIDO = 'apelido';

	protected $codigo;
	protected $nome;
	protected $texto;
	protected $apelido;



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
	 * @param text $texto
	 */
	public function setTexto($texto) {
		$this->texto = $texto;
	}

	/**
	 * @return text
	 */
	public function getTexto() {
		return $this->texto;
	}

	/**
	 * @param varchar $apelido
	 */
	public function setApelido($apelido) {
		$this->apelido = $apelido;
	}

	/**
	 * @return varchar
	 */
	public function getApelido() {
		return $this->apelido;
	}

	/**
	 * @throws PDOException
	 * @return Mensagem|null
	 */
	public static function retrieveByPk($codigo, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':codigo'] = $codigo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM mensagem WHERE codigo = :codigo " ; 
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Mensagem();
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
					mensagem
				SET
					codigo = :codigo
					, nome = :nome
					, texto = :texto
					, apelido = :apelido
				WHERE
					codigo = :codigo
			";

			}
		} else {

			$sql = "
				INSERT INTO
					mensagem
				(
					codigo
					, nome
					, texto
					, apelido
				) VALUES (
					:codigo
					, :nome
					, :texto
					, :apelido
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':codigo'] = $this->codigo;
		$sqlParam[':nome'] = $this->nome;
		$sqlParam[':texto'] = $this->texto;
		$sqlParam[':apelido'] = $this->apelido;

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
				mensagem
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