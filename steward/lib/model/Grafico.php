<?php

/**
 * Modelo Grafico que estende de BaseGrafico
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 * Data de cria��o do modelo: 2014-05-16 23:09:36
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas neste modelo e n�o no BaseGrafico
 * - Esta classe somente ir� ser gerada se n�o existir no diret�rio de output
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @package model
 */
class Grafico extends BaseGrafico {

	public static function retrieveAtivos() {

		$sqlParam = array();


		$db = Database::getInstance();
		$sql = "SELECT * FROM  grafico WHERE idStatus = 1" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Grafico();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}
	
	public static function retrieveByNome($nome) {
	
		$sqlParam = array();
		$sqlParam[':nome'] = $nome;
	
	
		$db = Database::getInstance();
		$sql = "SELECT * FROM  grafico WHERE nome = :nome" ;
	
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Grafico();
				$obj->hydrate($result);

				return $obj;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}

}