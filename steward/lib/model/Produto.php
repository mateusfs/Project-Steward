<?php

/**
 * Modelo Produto que estende de BaseProduto
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 * Data de cria��o do modelo: 2014-04-16 02:08:50
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas neste modelo e n�o no BaseProduto
 * - Esta classe somente ir� ser gerada se n�o existir no diret�rio de output
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @package model
 */
class Produto extends BaseProduto {

	public static function retrieveAll() {

		$sqlParam = array();

		$db = Database::getInstance();
		$sql = "SELECT * FROM  produto" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Produto();
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
					produto
				WHERE
					UPPER(nome) LIKE UPPER(:BUSCA)
				OR
					UPPER(marca) LIKE UPPER(:BUSCA)
				OR
					UPPER(modelo) LIKE UPPER(:BUSCA)
				OR
					UPPER(descricao) LIKE UPPER(:BUSCA)
				OR
					UPPER(valor) LIKE UPPER(:BUSCA)
				" ;

		try{

			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Produto();
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
		$sql = "SELECT * FROM  produto LIMIT $expo" ;

		try{

			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Produto();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveOrderCompra() {

		$sqlParam = array();

		$db = Database::getInstance();
		$sql = "SELECT DISTINCT(p.codigo), p.* FROM  produto p INNER JOIN item i ON i.idProduto = p.codigo ORDER BY i.idProduto" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Produto();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function countCompra($codigo) {

		$sqlParam = array();
		$sqlParam[':CODIGO'] = $codigo;

		$db = Database::getInstance();
		$sql = "SELECT
					count(c.codigo) as data
				FROM
					compra c
				INNER JOIN
					item i ON i.idCompra = c.codigo
				INNER JOIN
					produto p ON i.idProduto = p.codigo
				WHERE
					p.codigo = :CODIGO
				" ;

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

	public static function countMes($codigo, $mes) {


		$sqlParam = array();
		$sqlParam[':PRODUTO'] = $codigo;
		$sqlParam[':DATA'] = date('Y').'-'.$mes.'-'.date('d');

		$db = Database::getInstance();
		$sql = "SELECT
					count(c.codigo) as count FROM produto p
				INNER JOIN
					item i ON p.codigo = i.idProduto
				INNER JOIN
					compra c ON c.codigo = i.idCompra
				WHERE
					p.codigo = :PRODUTO
				AND
					c.data >= :DATA
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

	public static function countMeses($mes) {


		$proximo = $mes+1;
		$sqlParam = array();
		$sqlParam[':DATA'] = date('Y').'-'.$mes.'-'.date('d');
		$sqlParam[':PROXIMO'] = date('Y').'-'.$proximo.'-'.date('d');

		$db = Database::getInstance();
		$sql = "SELECT
					count(c.codigo) as count FROM produto p
				INNER JOIN
					item i ON p.codigo = i.idProduto
				INNER JOIN
					compra c ON c.codigo = i.idCompra
				WHERE
					c.data >= :DATA
				AND
					c.data <= :PROXIMO
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
				SELECT p.* FROM
					produto p
				INNER JOIN
					categoria c
				ON
					c.codigo = p.idcategoria
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
					$obj = new Produto();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

	public static function retrieveByCategoria($codigo) {

		$sqlParam = array();
		$sqlParam[':idCategoria'] = $codigo;

		$db = Database::getInstance();
		$sql = "SELECT * FROM  produto WHERE idCategoria = :idCategoria" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Produto();
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