<?php

/**
 * Modelo OsoUserRatings que estende de BaseOsoUserRatings
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 * Data de cria��o do modelo: 2014-05-28 14:19:34
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas neste modelo e n�o no BaseOsoUserRatings
 * - Esta classe somente ir� ser gerada se n�o existir no diret�rio de output
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @package model
 */
class OsoUserRatings extends BaseOsoUserRatings {

	public function save() {

		$db = Database::getInstance();

		$sql = "
			INSERT INTO
				oso_user_ratings
			(
				user_id
				, item_id
				, rating
			) VALUES (
				:userId
				, :itemId
				, :rating
			)
		";

		$sqlParam = array();
		$sqlParam[':userId'] = $this->userId;
		$sqlParam[':itemId'] = $this->itemId;
		$sqlParam[':rating'] = $this->rating;

		try{
			$db->beginTransaction();
			$db->execute($sql, $sqlParam);
			$db->commit();
			return true;
		} catch (PDOException $e) {
			echo "<pre>";var_dump($e);die("</pre>");
			$db->rollBack();
			throw new PDOException($e->getMessage());
		}
	}

	public function delete() {

		$sqlParam = array();
		$sqlParam[':userId'] = $this->userId;
		$sqlParam[':itemId'] = $this->itemId;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				oso_user_ratings
			WHERE
				user_id = :userId
			AND
				item_id = :itemId
		";
		try{
			$db->beginTransaction();
			$db->execute($sql, $sqlParam);
			$db->commit();
		} catch (PDOException $e) {
			$db->rollBack();
			throw new PDOException($e->getMessage());
		}
	}

}