<?php

/**
 * Classe Base da tabela [currency]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo Currency
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseCurrency extends Base {

	const TABLE_NAME = 'currency';
	const CURRENCY_ID = 'currency_id';
	const DATE = 'date';
	const CURRENCY = 'currency';
	const CONVERSION_RATIO = 'conversion_ratio';

	protected $currencyId;
	protected $date;
	protected $currency;
	protected $conversionRatio;



	/**
	 * @param int $currencyId
	 */
	public function setCurrencyId($currencyId) {
		$this->currencyId = $currencyId;
	}

	/**
	 * @return int
	 */
	public function getCurrencyId() {
		return $this->currencyId;
	}

	/**
	 * @param date $date
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * @return date
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * @return date|time|null
	 */
	public function getDateFormatada($formato = 'd/m/Y') {
		if (!$this->getDate()) {
			return null;
		}
		return date($formato, strtotime($this->getDate()));
	}

	/**
	 * @param varchar $currency
	 */
	public function setCurrency($currency) {
		$this->currency = $currency;
	}

	/**
	 * @return varchar
	 */
	public function getCurrency() {
		return $this->currency;
	}

	/**
	 * @param decimal $conversionRatio
	 */
	public function setConversionRatio($conversionRatio) {
		$this->conversionRatio = $conversionRatio;
	}

	/**
	 * @return decimal
	 */
	public function getConversionRatio() {
		return $this->conversionRatio;
	}

	/**
	 * @throws PDOException
	 * @return Currency|null
	 */
	public static function retrieveByPk($currencyId, $date, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':currency_id'] = $currencyId;
		$sqlParam[':date'] = $date;


		$db = Database::getInstance();
		$sql = "SELECT * FROM currency WHERE currency_id = :currency_id AND date = :date " ; 
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new Currency();
				$obj->hydrate($result);

				return $obj;
			}

		} catch (PDOException $e) {
			throw new PDOException($e->getMessage());
		}
	}


	/**
	 * @throws PDOException
	 * @return void
	 */
	public function save() {

		$db = Database::getInstance();

		if ($this->currencyId   && $this->date  ) {

			 if($this->retrieveByPk($this->currencyId, $this->date)){

			$sql = "
				UPDATE
					currency
				SET
					currency_id = :currency_id
					, date = :date
					, currency = :currency
					, conversion_ratio = :conversion_ratio
				WHERE
					currency_id = :currency_id
					AND date = :date
			";

			}
		} else {

			$sql = "
				INSERT INTO
					currency
				(
					currency_id
					, date
					, currency
					, conversion_ratio
				) VALUES (
					:currency_id
					, :date
					, :currency
					, :conversion_ratio
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':currency_id'] = $this->currencyId;
		$sqlParam[':date'] = $this->timeToDate($this->date);
		$sqlParam[':currency'] = $this->currency;
		$sqlParam[':conversion_ratio'] = $this->conversionRatio;

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

	/**
	 * @throws PDOException
	 * @return void
	 */
	public function delete() {

		$sqlParam = array();
		$sqlParam[':currency_id'] = $this->currencyId;
		$sqlParam[':date'] = $this->date;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				currency
			WHERE
				currency_id = :currency_id
				AND date = :date
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