<?php

/**
 * Classe Base da tabela [tarefa]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Tarefa
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseTarefa extends Base {

	const TABLE_NAME = 'tarefa';
	const CODIGO = 'codigo';
	const NOME = 'nome';
	const TEXTO = 'texto';
	const JUSTIFICATIVA = 'justificativa';
	const PORCENTAGEM = 'porcentagem';
	const IDGRAFICO = 'idGrafico';
	const IDCLIENTE = 'idCliente';
	const IDUSUARIO = 'idUsuario';
	const IDPRIORIDADE = 'idPrioridade';
	const IDPRODUTO = 'idProduto';
	const IDSTATUS = 'idStatus';
	const APELIDO = 'apelido';
	const DATA_INICIAL = 'data_inicial';
	const DATA_FINAL = 'data_final';

	protected $codigo;
	protected $nome;
	protected $texto;
	protected $justificativa;
	protected $porcentagem;
	protected $idgrafico;
	protected $idcliente;
	protected $idusuario;
	protected $idprioridade;
	protected $idproduto;
	protected $idstatus;
	protected $apelido;
	protected $dataInicial;
	protected $dataFinal;

	/**
	 * @var Tarefa
	 */
	protected $jTarefa = null;



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
	 * @param text $justificativa
	 */
	public function setJustificativa($justificativa) {
		$this->justificativa = $justificativa;
	}

	/**
	 * @return text
	 */
	public function getJustificativa() {
		return $this->justificativa;
	}

	/**
	 * @param decimal $porcentagem
	 */
	public function setPorcentagem($porcentagem) {
		$this->porcentagem = $porcentagem;
	}

	/**
	 * @return decimal
	 */
	public function getPorcentagem() {
		return $this->porcentagem;
	}

	/**
	 * @param int $idgrafico
	 */
	public function setIdgrafico($idgrafico) {
		$this->idgrafico = $idgrafico;
	}

	/**
	 * @return int
	 */
	public function getIdgrafico() {
		return $this->idgrafico;
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
	 * @param int $idusuario
	 */
	public function setIdusuario($idusuario) {
		$this->idusuario = $idusuario;
	}

	/**
	 * @return int
	 */
	public function getIdusuario() {
		return $this->idusuario;
	}

	/**
	 * @param int $idprioridade
	 */
	public function setIdprioridade($idprioridade) {
		$this->idprioridade = $idprioridade;
	}

	/**
	 * @return int
	 */
	public function getIdprioridade() {
		return $this->idprioridade;
	}

	/**
	 * @param int $idproduto
	 */
	public function setIdproduto($idproduto) {
		$this->idproduto = $idproduto;
	}

	/**
	 * @return int
	 */
	public function getIdproduto() {
		return $this->idproduto;
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
	 * @param date $dataInicial
	 */
	public function setDataInicial($dataInicial) {
		$this->dataInicial = $dataInicial;
	}

	/**
	 * @return date
	 */
	public function getDataInicial() {
		return $this->dataInicial;
	}

	/**
	 * @return date|time|null
	 */
	public function getDataInicialFormatada($formato = 'd/m/Y') {
		if (!$this->getDataInicial()) {
			return null;
		}
		return date($formato, strtotime($this->getDataInicial()));
	}

	/**
	 * @param date $dataFinal
	 */
	public function setDataFinal($dataFinal) {
		$this->dataFinal = $dataFinal;
	}

	/**
	 * @return date
	 */
	public function getDataFinal() {
		return $this->dataFinal;
	}

	/**
	 * @return date|time|null
	 */
	public function getDataFinalFormatada($formato = 'd/m/Y') {
		if (!$this->getDataFinal()) {
			return null;
		}
		return date($formato, strtotime($this->getDataFinal()));
	}

	/**
	 * @param int $codigo
	 * @param int $idusuario
	 * @throws PDOException
	 * @return Tarefa|null
	 */
	public static function retrieveByPk($codigo, $idusuario = null, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':codigo'] = $codigo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM tarefa WHERE codigo = :codigo " ;

		if (!is_null($idusuario)) {
			$sql.= " AND idUsuario = :idUsuario";
			$sqlParam[':idUsuario'] = $idusuario;
		}

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Tarefa();
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
					tarefa
				SET
					codigo = :codigo
					, nome = :nome
					, texto = :texto
					, justificativa = :justificativa
					, porcentagem = :porcentagem
					, idGrafico = :idGrafico
					, idCliente = :idCliente
					, idUsuario = :idUsuario
					, idPrioridade = :idPrioridade
					, idProduto = :idProduto
					, idStatus = :idStatus
					, apelido = :apelido
					, data_inicial = :data_inicial
					, data_final = :data_final
				WHERE
					codigo = :codigo
			";

			}
		} else {

			$sql = "
				INSERT INTO
					tarefa
				(
					codigo
					, nome
					, texto
					, justificativa
					, porcentagem
					, idGrafico
					, idCliente
					, idUsuario
					, idPrioridade
					, idProduto
					, idStatus
					, apelido
					, data_inicial
					, data_final
				) VALUES (
					:codigo
					, :nome
					, :texto
					, :justificativa
					, :porcentagem
					, :idGrafico
					, :idCliente
					, :idUsuario
					, :idPrioridade
					, :idProduto
					, :idStatus
					, :apelido
					, :data_inicial
					, :data_final
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':codigo'] = $this->codigo;
		$sqlParam[':nome'] = $this->nome;
		$sqlParam[':texto'] = $this->texto;
		$sqlParam[':justificativa'] = $this->justificativa;
		$sqlParam[':porcentagem'] = $this->porcentagem;
		$sqlParam[':idGrafico'] = $this->idgrafico;
		$sqlParam[':idCliente'] = $this->idcliente;
		$sqlParam[':idUsuario'] = $this->idusuario;
		$sqlParam[':idPrioridade'] = $this->idprioridade;
		$sqlParam[':idProduto'] = $this->idproduto;
		$sqlParam[':idStatus'] = $this->idstatus;
		$sqlParam[':apelido'] = $this->apelido;
		$sqlParam[':data_inicial'] = $this->timeToDate($this->dataInicial);
		$sqlParam[':data_final'] = $this->timeToDate($this->dataFinal);

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
				tarefa
			WHERE
				codigo = :codigo
		";
		if (!is_null($this->idusuario)) {
			$sql.= " AND idUsuario = :idUsuario";
			$sqlParam[':idUsuario'] = $this->idusuario;
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
	 * @param Tarefa $tarefa
	 */
	public function setTarefa(Tarefa $tarefa) {
		$this->jTarefa = $tarefa;
	}

	/**
	 * @throws PDOException
	 * @return Tarefa|null
	 */
	public function getTarefa() {

		if (is_null($this->jTarefa)) {
			$this->jTarefa = Tarefa::retrieveByPk($this->idusuario);
		}

		return $this->jTarefa;
	}

}