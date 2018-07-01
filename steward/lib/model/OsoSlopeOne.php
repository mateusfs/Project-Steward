<?php

/**
 * Modelo OsoSlopeOne que estende de BaseOsoSlopeOne
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 * Data de cria��o do modelo: 2014-05-28 14:19:34
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas neste modelo e n�o no BaseOsoSlopeOne
 * - Esta classe somente ir� ser gerada se n�o existir no diret�rio de output
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @package model
 */
class OsoSlopeOne extends BaseOsoSlopeOne {

	public function save() {

		$db = Database::getInstance();

		$sql = "
			INSERT INTO
				oso_slope_one
			(
				item_id1
				, item_id2
				, times
				, rating
			) VALUES (
				:itemId1
				, :itemId2
				, :times
				, :rating
			)
		";

		$sqlParam = array();
		$sqlParam[':itemId1'] = $this->itemId1;
		$sqlParam[':itemId2'] = $this->itemId2;
		$sqlParam[':times'] = $this->times;
		$sqlParam[':rating'] = $this->rating;

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

	public function delete() {

		$sqlParam = array();
		$sqlParam[':itemId1'] = $this->itemId1;
		$sqlParam[':itemId2'] = $this->itemId2;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				oso_slope_one
			WHERE
				itemId1 = :itemId1
			AND
				itemId2 = :itemId2

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