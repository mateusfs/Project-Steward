<?php

/**
 * Modelo Sistema que estende de BaseSistema
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 * Data de cria��o do modelo: 2014-04-17 21:05:31
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas neste modelo e n�o no BaseSistema
 * - Esta classe somente ir� ser gerada se n�o existir no diret�rio de output
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @package model
 */
class Sistema extends BaseSistema {


	public static function retrieveByEmpresa($idEmpresa) {

		$sqlParam = array();
		$sqlParam[':idempresa'] = $idEmpresa;

		$db = Database::getInstance();
		$sql = "SELECT * FROM  sistema WHERE idempresa = :idempresa" ;


		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Sistema();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveAll() {

		$sqlParam = array();

		$db = Database::getInstance();
		$sql = "SELECT * FROM  sistema" ;


		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Sistema();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveByEmpresaSistema() {

		$sqlParam = array();


		$db = Database::getInstance();
		$sql = "SELECT * FROM  empresa e INNER JOIN sistema s ON e.codigo = s.idEmpresa where e.idStatus = 1";

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Empresa();
				$obj->hydrate($result);

				return $obj;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}
}