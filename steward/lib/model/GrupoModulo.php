<?php

/**
 * Modelo GrupoModulo que estende de BaseGrupoModulo
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 * Data de cria��o do modelo: 2014-04-27 02:30:41
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas neste modelo e n�o no BaseGrupoModulo
 * - Esta classe somente ir� ser gerada se n�o existir no diret�rio de output
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @package model
 */
class GrupoModulo extends BaseGrupoModulo {



	public static function RetrieveAllGrupo($idGrupo) {

		$sqlParam = array();
		$sqlParam[':IDGRUPO'] = $idGrupo;


		$db = Database::getInstance();
		$sql = "SELECT * FROM  grupo_modulo WHERE idgrupousuario = :IDGRUPO " ;

		try{
			$result = $db->query($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {

				$retorno = array();
				foreach($result as $r){
					$obj = new GrupoModulo();
					$obj->hydrate($r);

					$retorno[] = $obj;
				}


				return $retorno;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}


	public static function adicionaGrupoNovo($idGrupo) {

		for ($i = 2; $i < 11; $i++) {
			$grupoModulo = new GrupoModulo();
			$grupoModulo->setIdgrupousuario($idGrupo);
			$grupoModulo->setIdmodulo($i);
			$grupoModulo->setIdstatus(1);
			$grupoModulo->save();
		}
	}

	public function saveStatus() {

		$db = Database::getInstance();


		$sql = "
			UPDATE
				grupo_modulo
			SET
				idgrupousuario = :idgrupousuario
				, idmodulo = :idmodulo
				, idstatus = :idstatus
			WHERE
				idgrupousuario = :idgrupousuario
				AND idmodulo = :idmodulo
		";


		$sqlParam = array();
		$sqlParam[':idgrupousuario'] = $this->idgrupousuario;
		$sqlParam[':idmodulo'] = $this->idmodulo;
		$sqlParam[':idstatus'] = $this->idstatus;

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

}