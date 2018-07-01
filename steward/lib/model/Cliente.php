<?php

/**
 * Modelo cliente que estende de Basecliente
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 * Data de cria��o do modelo: 2014-04-16 02:08:50
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas neste modelo e n�o no Basecliente
 * - Esta classe somente ir� ser gerada se n�o existir no diret�rio de output
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @package model
 */
class Cliente extends BaseCliente {

	public static function retrieveTable() {

		$sqlParam = array();


		$db = Database::getInstance();
		$sql = "SELECT * FROM  cliente LIMIT 0 , 15" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Cliente();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveExpo($expo) {

		$sqlParam = array();
		$sqlParam[':EXPO'] = $expo;

		$db = Database::getInstance();
		$sql = "SELECT * FROM  cliente LIMIT $expo" ;

		try{

			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Cliente();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveBusca($busca) {

		$sqlParam = array();
		$sqlParam[':BUSCA'] = "%".$busca."%";

		$db = Database::getInstance();
		$sql = "SELECT * FROM
					cliente
				WHERE
					UPPER(nome) LIKE UPPER(:BUSCA)
				OR
					UPPER(funcao) LIKE UPPER(:BUSCA)
				OR
					UPPER(email) LIKE UPPER(:BUSCA)
				OR
					UPPER(telefone) LIKE UPPER(:BUSCA)" ;

		try{

			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Cliente();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function countClienteCompraNota($nota) {


		$sqlParam = array();
		$sqlParam[':NOTA'] = $nota;
		$db = Database::getInstance();
		$sql = "SELECT
					count(c.codigo) as count FROM cliente c
				INNER JOIN
					nota n ON  c.idNota = n.codigo
				WHERE
					n.codigo = :NOTA
				" ;

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				return $result['count'];
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveAtivos() {

		$sqlParam = array();

		$db = Database::getInstance();
		$sql = "
				SELECT c.* FROM
					cliente c
				INNER JOIN
					sistema s
				ON
					s.codigo = c.idSistema
				INNER JOIN
					empresa e
				ON
					e.codigo = s.idEmpresa
				WHERE
					s.idStatus = 1
				AND
					e.idStatus = 1
				" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Cliente();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveBySistema($idsistema) {

		$sqlParam = array();
		$sqlParam[':idsistema'] = $idsistema;


		$db = Database::getInstance();
		$sql = "SELECT * FROM  cliente WHERE idsistema =  :idsistema" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Cliente();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public function saveInsert() {

		$db = Database::getInstance();

			$sql = "
				insert into
					cliente
				(
					nome
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
				) values (
					:nome
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


		$sqlParam = array();
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

	public static function retrieveAll() {

		$sqlParam = array();


		$db = Database::getInstance();
		$sql = "select * from  cliente" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Cliente();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

}