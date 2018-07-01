<?php

/**
 * Classe Base da tabela [produto]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Produto
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseProduto extends Base {

	const TABLE_NAME = 'produto';
	const CODIGO = 'codigo';
	const NOME = 'nome';
	const VALOR = 'valor';
	const DESCRICAO = 'descricao';
	const MARCA = 'marca';
	const MODELO = 'modelo';
	const IDCATEGORIA = 'idCategoria';

	protected $codigo;
	protected $nome;
	protected $valor;
	protected $descricao;
	protected $marca;
	protected $modelo;
	protected $idcategoria;

	/**
	 * @var Produto
	 */
	protected $jProduto = null;



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
	 * @param decimal $valor
	 */
	public function setValor($valor) {
		$this->valor = $valor;
	}

	/**
	 * @return decimal
	 */
	public function getValor() {
		return $this->valor;
	}

	/**
	 * @param text $descricao
	 */
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	/**
	 * @return text
	 */
	public function getDescricao() {
		return $this->descricao;
	}

	/**
	 * @param varchar $marca
	 */
	public function setMarca($marca) {
		$this->marca = $marca;
	}

	/**
	 * @return varchar
	 */
	public function getMarca() {
		return $this->marca;
	}

	/**
	 * @param varchar $modelo
	 */
	public function setModelo($modelo) {
		$this->modelo = $modelo;
	}

	/**
	 * @return varchar
	 */
	public function getModelo() {
		return $this->modelo;
	}

	/**
	 * @param int $idcategoria
	 */
	public function setIdcategoria($idcategoria) {
		$this->idcategoria = $idcategoria;
	}

	/**
	 * @return int
	 */
	public function getIdcategoria() {
		return $this->idcategoria;
	}

	/**
	 * @param int $codigo
	 * @param int $idcategoria
	 * @throws PDOException
	 * @return Produto|null
	 */
	public static function retrieveByPk($codigo, $idcategoria = null, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':codigo'] = $codigo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM produto WHERE codigo = :codigo " ; 

		if (!is_null($idcategoria)) {
			$sql.= " AND idCategoria = :idCategoria";
			$sqlParam[':idCategoria'] = $idcategoria;
		}

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Produto();
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
					produto
				SET
					codigo = :codigo
					, nome = :nome
					, valor = :valor
					, descricao = :descricao
					, marca = :marca
					, modelo = :modelo
					, idCategoria = :idCategoria
				WHERE
					codigo = :codigo
			";

			}
		} else {

			$sql = "
				INSERT INTO
					produto
				(
					codigo
					, nome
					, valor
					, descricao
					, marca
					, modelo
					, idCategoria
				) VALUES (
					:codigo
					, :nome
					, :valor
					, :descricao
					, :marca
					, :modelo
					, :idCategoria
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':codigo'] = $this->codigo;
		$sqlParam[':nome'] = $this->nome;
		$sqlParam[':valor'] = $this->valor;
		$sqlParam[':descricao'] = $this->descricao;
		$sqlParam[':marca'] = $this->marca;
		$sqlParam[':modelo'] = $this->modelo;
		$sqlParam[':idCategoria'] = $this->idcategoria;

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
				produto
			WHERE
				codigo = :codigo
		";
		if (!is_null($this->idcategoria)) {
			$sql.= " AND idCategoria = :idCategoria";
			$sqlParam[':idCategoria'] = $this->idcategoria;
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
	 * @param Produto $produto
	 */
	public function setProduto(Produto $produto) {
		$this->jProduto = $produto;
	}

	/**
	 * @throws PDOException
	 * @return Produto|null
	 */
	public function getProduto() {

		if (is_null($this->jProduto)) {
			$this->jProduto = Produto::retrieveByPk($this->idcategoria);
		}

		return $this->jProduto;
	}

}