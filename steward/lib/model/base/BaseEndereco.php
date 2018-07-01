<?php

/**
 * Classe Base da tabela [endereco]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Endereco
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseEndereco extends Base {

	const TABLE_NAME = 'endereco';
	const CODIGO = 'codigo';
	const BAIRRO = 'bairro';
	const CEP = 'CEP';
	const NUMERO = 'numero';
	const COMPLEMENTO = 'complemento';
	const CIDADE = 'cidade';
	const ESTADO = 'estado';
	const RUA = 'rua';
	const IDCLIENTE = 'idCliente';

	protected $codigo;
	protected $bairro;
	protected $cep;
	protected $numero;
	protected $complemento;
	protected $cidade;
	protected $estado;
	protected $rua;
	protected $idcliente;

	/**
	 * @var Endereco
	 */
	protected $jEndereco = null;



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
	 * @param varchar $bairro
	 */
	public function setBairro($bairro) {
		$this->bairro = $bairro;
	}

	/**
	 * @return varchar
	 */
	public function getBairro() {
		return $this->bairro;
	}

	/**
	 * @param varchar $cep
	 */
	public function setCep($cep) {
		$this->cep = $cep;
	}

	/**
	 * @return varchar
	 */
	public function getCep() {
		return $this->cep;
	}

	/**
	 * @param decimal $numero
	 */
	public function setNumero($numero) {
		$this->numero = $numero;
	}

	/**
	 * @return decimal
	 */
	public function getNumero() {
		return $this->numero;
	}

	/**
	 * @param varchar $complemento
	 */
	public function setComplemento($complemento) {
		$this->complemento = $complemento;
	}

	/**
	 * @return varchar
	 */
	public function getComplemento() {
		return $this->complemento;
	}

	/**
	 * @param varchar $cidade
	 */
	public function setCidade($cidade) {
		$this->cidade = $cidade;
	}

	/**
	 * @return varchar
	 */
	public function getCidade() {
		return $this->cidade;
	}

	/**
	 * @param char $estado
	 */
	public function setEstado($estado) {
		$this->estado = $estado;
	}

	/**
	 * @return char
	 */
	public function getEstado() {
		return $this->estado;
	}

	/**
	 * @param varchar $rua
	 */
	public function setRua($rua) {
		$this->rua = $rua;
	}

	/**
	 * @return varchar
	 */
	public function getRua() {
		return $this->rua;
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
	 * @param int $codigo
	 * @param int $idcliente
	 * @throws PDOException
	 * @return Endereco|null
	 */
	public static function retrieveByPk($codigo, $idcliente = null, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':codigo'] = $codigo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM endereco WHERE codigo = :codigo " ; 

		if (!is_null($idcliente)) {
			$sql.= " AND idCliente = :idCliente";
			$sqlParam[':idCliente'] = $idcliente;
		}

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Endereco();
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
					endereco
				SET
					codigo = :codigo
					, bairro = :bairro
					, CEP = :CEP
					, numero = :numero
					, complemento = :complemento
					, cidade = :cidade
					, estado = :estado
					, rua = :rua
					, idCliente = :idCliente
				WHERE
					codigo = :codigo
			";

			}
		} else {

			$sql = "
				INSERT INTO
					endereco
				(
					codigo
					, bairro
					, CEP
					, numero
					, complemento
					, cidade
					, estado
					, rua
					, idCliente
				) VALUES (
					:codigo
					, :bairro
					, :CEP
					, :numero
					, :complemento
					, :cidade
					, :estado
					, :rua
					, :idCliente
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':codigo'] = $this->codigo;
		$sqlParam[':bairro'] = $this->bairro;
		$sqlParam[':CEP'] = $this->cep;
		$sqlParam[':numero'] = $this->numero;
		$sqlParam[':complemento'] = $this->complemento;
		$sqlParam[':cidade'] = $this->cidade;
		$sqlParam[':estado'] = $this->estado;
		$sqlParam[':rua'] = $this->rua;
		$sqlParam[':idCliente'] = $this->idcliente;

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
				endereco
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
	 * @param Endereco $endereco
	 */
	public function setEndereco(Endereco $endereco) {
		$this->jEndereco = $endereco;
	}

	/**
	 * @throws PDOException
	 * @return Endereco|null
	 */
	public function getEndereco() {

		if (is_null($this->jEndereco)) {
			$this->jEndereco = Endereco::retrieveByPk($this->idcliente);
		}

		return $this->jEndereco;
	}

}