<?php

/**
 * Modelo Categoria que estende de BaseCategoria
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 * Data de cria��o do modelo: 2014-05-20 14:26:38
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas neste modelo e n�o no BaseCategoria
 * - Esta classe somente ir� ser gerada se n�o existir no diret�rio de output
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @package model
 */
class Categoria extends BaseCategoria {

	public static function retrieveAll() {

		$sqlParam = array();


		$db = Database::getInstance();
		$sql = "SELECT * FROM  categoria" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Categoria();
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
		$sql = "SELECT * FROM  categoria WHERE UPPER(nome) LIKE UPPER(:BUSCA)" ;
	
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

	public static function retrieveBySistema($idSistema) {

		$sqlParam = array();
		$sqlParam['idSistema'] = $idSistema;

		$db = Database::getInstance();
		$sql = "SELECT * FROM categoria WHERE idSistema = :idSistema" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Categoria();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
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
					categoria c
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
					$obj = new Categoria();
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