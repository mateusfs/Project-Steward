<?php

/**
 * Modelo Usuario que estende de BaseUsuario
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 * Data de cria��o do modelo: 2014-04-16 02:08:50
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas neste modelo e n�o no BaseUsuario
 * - Esta classe somente ir� ser gerada se n�o existir no diret�rio de output
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @package model
 */
class Usuario extends BaseUsuario {

	public static function retrieveByEmail($email) {

		$sqlParam = array();
		$sqlParam[':email'] = $email;


		$db = Database::getInstance();
		$sql = "SELECT * FROM usuario WHERE email = :email " ;

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

	public static function retrieveAll() {

		$sqlParam = array();


		$db = Database::getInstance();
		$sql = "SELECT * FROM  usuario" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Usuario();
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
					usuario
				WHERE
					UPPER(nome) LIKE UPPER(:BUSCA)
				OR
					UPPER(funcao) LIKE UPPER(:BUSCA)
				OR
					UPPER(email) LIKE UPPER(:BUSCA)
				OR
					UPPER(telefone) LIKE UPPER(:BUSCA)
				" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Usuario();
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
		$sql = "SELECT * FROM  usuario LIMIT $expo" ;

		try{

			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Usuario();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveByPk($codigo) {

		$sqlParam = array();
		$sqlParam[':codigo'] = $codigo;

		$db = Database::getInstance();
		$sql = "SELECT * FROM usuario WHERE codigo = :codigo " ;


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

	public static function retrieveAllGrupoUsuario($grupo) {

		$sqlParam = array();
		$sqlParam[':IDGRUPO'] = $grupo;

		$db = Database::getInstance();
		$sql = "SELECT * FROM  USUARIO WHERE IDGRUPO = :IDGRUPO" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Usuario();
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