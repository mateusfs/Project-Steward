<?php

/**
 * Classe Base da tabela [time_by_day]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo TimeByDay
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseTimeByDay extends Base {

	const TABLE_NAME = 'time_by_day';
	const TIME_ID = 'time_id';
	const THE_DATE = 'the_date';
	const THE_DAY = 'the_day';
	const THE_MONTH = 'the_month';
	const THE_YEAR = 'the_year';
	const DAY_OF_MONTH = 'day_of_month';
	const WEEK_OF_YEAR = 'week_of_year';
	const MONTH_OF_YEAR = 'month_of_year';
	const QUARTER = 'quarter';
	const FISCAL_PERIOD = 'fiscal_period';

	protected $timeId;
	protected $theDate;
	protected $theDay;
	protected $theMonth;
	protected $theYear;
	protected $dayOfMonth;
	protected $weekOfYear;
	protected $monthOfYear;
	protected $quarter;
	protected $fiscalPeriod;



	/**
	 * @param int $timeId
	 */
	public function setTimeId($timeId) {
		$this->timeId = $timeId;
	}

	/**
	 * @return int
	 */
	public function getTimeId() {
		return $this->timeId;
	}

	/**
	 * @param datetime $theDate
	 */
	public function setTheDate($theDate) {
		$this->theDate = $theDate;
	}

	/**
	 * @return datetime
	 */
	public function getTheDate() {
		return $this->theDate;
	}

	/**
	 * @return date|time|null
	 */
	public function getTheDateFormatada($formato = 'd/m/Y') {
		if (!$this->getTheDate()) {
			return null;
		}
		return date($formato, strtotime($this->getTheDate()));
	}

	/**
	 * @param varchar $theDay
	 */
	public function setTheDay($theDay) {
		$this->theDay = $theDay;
	}

	/**
	 * @return varchar
	 */
	public function getTheDay() {
		return $this->theDay;
	}

	/**
	 * @param varchar $theMonth
	 */
	public function setTheMonth($theMonth) {
		$this->theMonth = $theMonth;
	}

	/**
	 * @return varchar
	 */
	public function getTheMonth() {
		return $this->theMonth;
	}

	/**
	 * @param smallint $theYear
	 */
	public function setTheYear($theYear) {
		$this->theYear = $theYear;
	}

	/**
	 * @return smallint
	 */
	public function getTheYear() {
		return $this->theYear;
	}

	/**
	 * @param smallint $dayOfMonth
	 */
	public function setDayOfMonth($dayOfMonth) {
		$this->dayOfMonth = $dayOfMonth;
	}

	/**
	 * @return smallint
	 */
	public function getDayOfMonth() {
		return $this->dayOfMonth;
	}

	/**
	 * @param int $weekOfYear
	 */
	public function setWeekOfYear($weekOfYear) {
		$this->weekOfYear = $weekOfYear;
	}

	/**
	 * @return int
	 */
	public function getWeekOfYear() {
		return $this->weekOfYear;
	}

	/**
	 * @param smallint $monthOfYear
	 */
	public function setMonthOfYear($monthOfYear) {
		$this->monthOfYear = $monthOfYear;
	}

	/**
	 * @return smallint
	 */
	public function getMonthOfYear() {
		return $this->monthOfYear;
	}

	/**
	 * @param varchar $quarter
	 */
	public function setQuarter($quarter) {
		$this->quarter = $quarter;
	}

	/**
	 * @return varchar
	 */
	public function getQuarter() {
		return $this->quarter;
	}

	/**
	 * @param varchar $fiscalPeriod
	 */
	public function setFiscalPeriod($fiscalPeriod) {
		$this->fiscalPeriod = $fiscalPeriod;
	}

	/**
	 * @return varchar
	 */
	public function getFiscalPeriod() {
		return $this->fiscalPeriod;
	}

	/**
	 * @throws PDOException
	 * @return TimeByDay|null
	 */
	public static function retrieveByPk($timeId, $theDate, $persistente = false) {

		$sqlParam = array();
		$sqlParam[':time_id'] = $timeId;
		$sqlParam[':the_date'] = $theDate;


		$db = Database::getInstance();
		$sql = "SELECT * FROM time_by_day WHERE time_id = :time_id AND the_date = :the_date " ; 
		try{
			$result = $db->queryOne($sql, $sqlParam);

			if (is_null($result)) {
				return null;
			} else {
				$obj = new TimeByDay();
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

		if ($this->timeId   && $this->theDate  ) {

			 if($this->retrieveByPk($this->timeId, $this->theDate)){

			$sql = "
				UPDATE
					time_by_day
				SET
					time_id = :time_id
					, the_date = :the_date
					, the_day = :the_day
					, the_month = :the_month
					, the_year = :the_year
					, day_of_month = :day_of_month
					, week_of_year = :week_of_year
					, month_of_year = :month_of_year
					, quarter = :quarter
					, fiscal_period = :fiscal_period
				WHERE
					time_id = :time_id
					AND the_date = :the_date
			";

			}
		} else {

			$sql = "
				INSERT INTO
					time_by_day
				(
					time_id
					, the_date
					, the_day
					, the_month
					, the_year
					, day_of_month
					, week_of_year
					, month_of_year
					, quarter
					, fiscal_period
				) VALUES (
					:time_id
					, :the_date
					, :the_day
					, :the_month
					, :the_year
					, :day_of_month
					, :week_of_year
					, :month_of_year
					, :quarter
					, :fiscal_period
				)
			";

		}

		$sqlParam = array();
		$sqlParam[':time_id'] = $this->timeId;
		$sqlParam[':the_date'] = $this->theDate;
		$sqlParam[':the_day'] = $this->theDay;
		$sqlParam[':the_month'] = $this->theMonth;
		$sqlParam[':the_year'] = $this->theYear;
		$sqlParam[':day_of_month'] = $this->dayOfMonth;
		$sqlParam[':week_of_year'] = $this->weekOfYear;
		$sqlParam[':month_of_year'] = $this->monthOfYear;
		$sqlParam[':quarter'] = $this->quarter;
		$sqlParam[':fiscal_period'] = $this->fiscalPeriod;

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
		$sqlParam[':time_id'] = $this->timeId;
		$sqlParam[':the_date'] = $this->theDate;

		$db = Database::getInstance();

		$sql = "
			DELETE FROM
				time_by_day
			WHERE
				time_id = :time_id
				AND the_date = :the_date
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