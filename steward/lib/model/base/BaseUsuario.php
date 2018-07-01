<?php

/**
 * Classe Base da tabela [usuario]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Usuario
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseUsuario extends Base {

	const TABLE_NAME = 'usuario';
	const CODIGO = 'codigo';
	const NOME = 'nome';
	const EMAIL = 'email';
	const ADMINISTRADOR = 'administrador';
	const SENHA = 'senha';
	const FUNCAO = 'funcao';
	const SEXO = 'sexo';
	const TELEFONE = 'telefone';
	const FOTO = 'foto';
	const IDGRUPO = 'idGrupo';

	protected $codigo;
	protected $nome;
	protected $email;
	protected $administrador;
	protected $senha;
	protected $funcao;
	protected $sexo;
	protected $telefone;
	protected $foto;
	protected $idgrupo;

	/**
	 * @var Usuario
	 */
	protected $jUsuario = null;



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
	 * @param char $administrador
	 */
	public function setAdministrador($administrador) {
		$this->administrador = $administrador;
	}

	/**
	 * @return char
	 */
	public function getAdministrador() {
		return $this->administrador;
	}

	/**
	 * @param varchar $senha
	 */
	public function setSenha($senha) {
		$this->senha = $senha;
	}

	/**
	 * @return varchar
	 */
	public function getSenha() {
		return $this->senha;
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
	 * @param int $idgrupo
	 */
	public function setIdgrupo($idgrupo) {
		$this->idgrupo = $idgrupo;
	}

	/**
	 * @return int
	 */
	public function getIdgrupo() {
		return $this->idgrupo;
	}

	/**
	 * @param int $codigo
	 * @param varchar $email
	 * @param int $idgrupo
	 * @throws PDOException
	 * @return Usuario|null
	 */
	public static function retrieveByPk($codigo, $email, $idgrupo = null, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':codigo'] = $codigo;
		$sqlParam[':email'] = $email;


		$db = Database::getInstance();
		$sql = "SELECT * FROM usuario WHERE codigo = :codigo AND email = :email " ; 

		if (!is_null($idgrupo)) {
			$sql.= " AND idGrupo = :idGrupo";
			$sqlParam[':idGrupo'] = $idgrupo;
		}

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Usuario();
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

		if ($this->codigo   && $this->email  ) {

			 if($this->retrieveByPk($this->codigo, $this->email)){

			$sql = "
				UPDATE
					usuario
				SET
					codigo = :codigo
					, nome = :nome
					, email = :email
					, administrador = :administrador
					, senha = :senha
					, funcao = :funcao
					, sexo = :sexo
					, telefone = :telefone
					, foto = :foto
					, idGrupo = :idGrupo
				WHERE
					codigo = :codigo
					AND email = :email
			";

			}
		} else {

			$sql = "
				INSERT INTO
					usuario
				(
					codigo
					, nome
					, email
					, administrador
					, senha
					, funcao
					, sexo
					, telefone
					, foto
					, idGrupo
				) VALUES (
					:codigo
					, :nome
					, :email
					, :administrador
					, :senha
					, :funcao
					, :sexo
					, :telefone
					, :foto
					, :idGrupo
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':codigo'] = $this->codigo;
		$sqlParam[':nome'] = $this->nome;
		$sqlParam[':email'] = $this->email;
		$sqlParam[':administrador'] = $this->administrador;
		$sqlParam[':senha'] = $this->senha;
		$sqlParam[':funcao'] = $this->funcao;
		$sqlParam[':sexo'] = $this->sexo;
		$sqlParam[':telefone'] = $this->telefone;
		$sqlParam[':foto'] = $this->foto;
		$sqlParam[':idGrupo'] = $this->idgrupo;

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
		$sqlParam[':email'] = $this->email;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				usuario
			WHERE
				codigo = :codigo
				AND email = :email
		";
		if (!is_null($this->idgrupo)) {
			$sql.= " AND idGrupo = :idGrupo";
			$sqlParam[':idGrupo'] = $this->idgrupo;
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
	 * @param Usuario $usuario
	 */
	public function setUsuario(Usuario $usuario) {
		$this->jUsuario = $usuario;
	}

	/**
	 * @throws PDOException
	 * @return Usuario|null
	 */
	public function getUsuario() {

		if (is_null($this->jUsuario)) {
			$this->jUsuario = Usuario::retrieveByPk($this->idgrupo);
		}

		return $this->jUsuario;
	}

}