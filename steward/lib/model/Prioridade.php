<?php

/**
 * Modelo Prioridade que estende de BasePrioridade
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 * Data de cria��o do modelo: 2014-04-17 21:05:31
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas neste modelo e n�o no BasePrioridade
 * - Esta classe somente ir� ser gerada se n�o existir no diret�rio de output
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @package model
 */
class Prioridade extends BasePrioridade {


	private $loaded = false;
	private $cor;

	private function load(){
		if(!$this->loaded){

			switch($this->codigo){
				case 1:
					$this->cor = 'bg-darkRed';
					break;
				case 2:
					$this->cor = 'bg-darkOrange';
					break;
				case 3:
					$this->cor = 'bg-steel';
					break;
				case 4:
					$this->cor = 'bg-teal';
					break;
				case 5:
					$this->cor = 'bg-cyan';
					break;
			}
			$this->urSuperior = $urLoad;
			$this->loaded = true;
		}
	}

	public function getCor(){
		$this->load();
		return $this->cor;
	}



	public static function retrieveAll() {

		$sqlParam = array();


		$db = Database::getInstance();
		$sql = "SELECT * FROM  prioridade" ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new Prioridade();
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