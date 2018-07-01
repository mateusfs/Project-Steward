<?php

/**
 * Classe Base da tabela [cliente]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Cliente
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseCliente extends Base {

	const TABLE_NAME = 'cliente';
	const CODIGO = 'codigo';
	const NOME = 'nome';
	const DATANASCIMENTO = 'datanascimento';
	const FOTO = 'foto';
	const SEXO = 'sexo';
	const FUNCAO = 'funcao';
	const EMAIL = 'email';
	const TELEFONE = 'telefone';
	const IDNOTA = 'idnota';
	const IDESTADOCIVIL = 'idestadocivil';
	const IDLINGUA = 'idlingua';
	const IDSISTEMA = 'idsistema';

	protected $codigo;
	protected $nome;
	protected $datanascimento;
	protected $foto;
	protected $sexo;
	protected $funcao;
	protected $email;
	protected $telefone;
	protected $idnota;
	protected $idestadocivil;
	protected $idlingua;
	protected $idsistema;

	/**
	 * @var Cliente
	 */
	protected $jCliente = null;



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
	 * @param date $datanascimento
	 */
	public function setDatanascimento($datanascimento) {
		$this->datanascimento = $datanascimento;
	}

	/**
	 * @return date
	 */
	public function getDatanascimento() {
		return $this->datanascimento;
	}

	/**
	 * @return date|time|null
	 */
	public function getDatanascimentoFormatada($formato = 'd/m/Y') {
		if (!$this->getDatanascimento()) {
			return null;
		}
		return date($formato, strtotime($this->getDatanascimento()));
	}

	/**
	 * @param varchar $foto
	 */
	public function setFoto($foto) {
		$this->foto = $foto;
	}

	/**
	 * @return varchar
	 */
	public function getFoto() {
		return $this->foto;
	}

	/**
	 * @param char $sexo
	 */
	public function setSexo($sexo) {
		$this->sexo = $sexo;
	}

	/**
	 * @return char
	 */
	public function getSexo() {
		return $this->sexo;
	}

	/**
	 * @param varchar $funcao
	 */
	public function setFuncao($funcao) {
		$this->funcao = $funcao;
	}

	/**
	 * @return varchar
	 */
	public function getFuncao() {
		return $this->funcao;
	}

	/**
	 * @param varchar $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return varchar
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param decimal $telefone
	 */
	public function setTelefone($telefone) {
		$this->telefone = $telefone;
	}

	/**
	 * @return decimal
	 */
	public function getTelefone() {
		return $this->telefone;
	}

	/**
	 * @param int $idnota
	 */
	public function setIdnota($idnota) {
		$this->idnota = $idnota;
	}

	/**
	 * @return int
	 */
	public function getIdnota() {
		return $this->idnota;
	}

	/**
	 * @param int $idestadocivil
	 */
	public function setIdestadocivil($idestadocivil) {
		$this->idestadocivil = $idestadocivil;
	}

	/**
	 * @return int
	 */
	public function getIdestadocivil() {
		return $this->idestadocivil;
	}

	/**
	 * @param int $idlingua
	 */
	public function setIdlingua($idlingua) {
		$this->idlingua = $idlingua;
	}

	/**
	 * @return int
	 */
	public function getIdlingua() {
		return $this->idlingua;
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
	 * @return Cliente|null
	 */
	public static function retrieveByPk($codigo, $idsistema = null, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':codigo'] = $codigo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM cliente WHERE codigo = :codigo " ; 

		if (!is_null($idsistema)) {
			$sql.= " AND idsistema = :idsistema";
			$sqlParam[':idsistema'] = $idsistema;
		}

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Cliente();
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
					cliente
				SET
					codigo = :codigo
					, nome = :nome
					, datanascimento = :datanascimento
					, foto = :foto
					, sexo = :sexo
					, funcao = :funcao
					, email = :email
					, telefone = :telefone
					, idnota = :idnota
					, idestadocivil = :idestadocivil
					, idlingua = :idlingua
					, idsistema = :idsistema
				WHERE
					codigo = :codigo
			";

			}
		} else {

			$sql = "
				INSERT INTO
					cliente
				(
					codigo
					, nome
					, datanascimento
					, foto
					, sexo
					, funcao
					, email
					, telefone
					, idnota
					, idestadocivil
					, idlingua
					, idsistema
				) VALUES (
					:codigo
					, :nome
					, :datanascimento
					, :foto
					, :sexo
					, :funcao
					, :email
					, :telefone
					, :idnota
					, :idestadocivil
					, :idlingua
					, :idsistema
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':codigo'] = $this->codigo;
		$sqlParam[':nome'] = $this->nome;
		$sqlParam[':datanascimento'] = $this->timeToDate($this->datanascimento);
		$sqlParam[':foto'] = $this->foto;
		$sqlParam[':sexo'] = $this->sexo;
		$sqlParam[':funcao'] = $this->funcao;
		$sqlParam[':email'] = $this->email;
		$sqlParam[':telefone'] = $this->telefone;
		$sqlParam[':idnota'] = $this->idnota;
		$sqlParam[':idestadocivil'] = $this->idestadocivil;
		$sqlParam[':idlingua'] = $this->idlingua;
		$sqlParam[':idsistema'] = $this->idsistema;

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
				cliente
			WHERE
				codigo = :codigo
		";
		if (!is_null($this->idsistema)) {
			$sql.= " AND idsistema = :idsistema";
			$sqlParam[':idsistema'] = $this->idsistema;
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
	 * @param Cliente $cliente
	 */
	public function setCliente(Cliente $cliente) {
		$this->jCliente = $cliente;
	}

	/**
	 * @throws PDOException
	 * @return Cliente|null
	 */
	public function getCliente() {

		if (is_null($this->jCliente)) {
			$this->jCliente = Cliente::retrieveByPk($this->idsistema);
		}

		return $this->jCliente;
	}

}