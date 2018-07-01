<?php

/**
 * Modelo Compra que estende de BaseCompra
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 * Data de cria��o do modelo: 2014-05-27 00:56:09
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas neste modelo e n�o no BaseCompra
 * - Esta classe somente ir� ser gerada se n�o existir no diret�rio de output
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @package model
 */
class Compra extends BaseCompra {

	public static function retrieveByCliente($codigo) {

		$sqlParam = array();
		$sqlParam[':idcliente'] = $codigo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM  compra WHERE idcliente = :idcliente" ;

		try{

			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Compra();
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
		$sql = "SELECT co.* FROM
					compra co
				INNER JOIN
					item i
				ON
					co.codigo = i.idcompra
				INNER JOIN
					cliente ci
				ON
					ci.codigo = co.idCliente
				INNER JOIN
					produto p
				ON
					i.idProduto = p.codigo
				WHERE
					UPPER(ci.nome) LIKE UPPER(:BUSCA)
				OR
					UPPER(ci.funcao) LIKE UPPER(:BUSCA)
				OR
					UPPER(ci.codigo) LIKE UPPER(:BUSCA)
				OR
					UPPER(co.data) LIKE UPPER(:BUSCA)
				OR
					UPPER(co.codigo) LIKE UPPER(:BUSCA)
				OR
					UPPER(i.valor) LIKE UPPER(:BUSCA)
				OR
					UPPER(p.nome) LIKE UPPER(:BUSCA)
				OR
					UPPER(p.modelo) LIKE UPPER(:BUSCA)
				OR
					UPPER(p.marca) LIKE UPPER(:BUSCA)
				" ;

		try{

			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Compra();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}


	public static function retrieveUltima() {

		$sqlParam = array();

		$db = Database::getInstance();
		$sql = "SELECT * FROM compra ORDER BY codigo DESC LIMIT 1" ;

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Compra();
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
		$sql = "SELECT * FROM  compra" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Compra();
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
				SELECT DISTINCT(c.codigo), c.idCliente, c.data FROM
					compra c
				INNER JOIN
					item i
				ON
					c.codigo = i.idCompra
				INNER JOIN
					produto p
				ON
					p.codigo = i.idProduto
				INNER JOIN
					categoria ct
				ON
					ct.codigo = p.idcategoria
				INNER JOIN
					sistema s
				ON
					s.codigo = ct.idSistema
				INNER JOIN
					empresa e
				ON
					e.codigo = s.idEmpresa
				WHERE
					s.idStatus = 1
				AND
					e.idStatus = 1
				ORDER BY c.codigo
				LIMIT 15
				" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Compra();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}


	public static function countMes($mes) {

		$proximo = $mes+1;
		$sqlParam = array();
		$sqlParam[':DATA'] = date('Y').'-'.$mes.'-'.date('d');
		$sqlParam[':PROXIMO'] = date('Y').'-'.$proximo.'-'.date('d');
		$db = Database::getInstance();
		$sql = "SELECT count(data) as data FROM compra WHERE data > :DATA AND data < :PROXIMO " ;

		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				return $result['data'];
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

}