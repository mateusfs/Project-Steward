<?php

/**
 * Modelo Lingua que estende de BaseLingua
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 * Data de cria��o do modelo: 2014-04-17 21:05:31
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas neste modelo e n�o no BaseLingua
 * - Esta classe somente ir� ser gerada se n�o existir no diret�rio de output
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @package model
 */
class Lingua extends BaseLingua {

	public static function retrieveAll(){
		$sqlParam = array();

		$db = Database::getInstance();
		$sql = "SELECT * FROM  lingua" ;

		try{
			$result = $db->query($sql, $sqlParam);
			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Lingua();
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