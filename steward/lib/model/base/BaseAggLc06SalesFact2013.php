<?php

/**
 * Classe Base da tabela [agg_lc_06_sales_fact_2013]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo AggLc06SalesFact2013
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseAggLc06SalesFact2013 extends Base {

	const TABLE_NAME = 'agg_lc_06_sales_fact_2013';
	const TIME_ID = 'time_id';
	const CITY = 'city';
	const STATE_PROVINCE = 'state_province';
	const COUNTRY = 'country';
	const STORE_SALES = 'store_sales';
	const STORE_COST = 'store_cost';
	const UNIT_SALES = 'unit_sales';
	const FACT_COUNT = 'fact_count';

	protected $timeId;
	protected $city;
	protected $stateProvince;
	protected $country;
	protected $storeSales;
	protected $storeCost;
	protected $unitSales;
	protected $factCount;



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
	 * @param varchar $city
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * @return varchar
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * @param varchar $stateProvince
	 */
	public function setStateProvince($stateProvince) {
		$this->stateProvince = $stateProvince;
	}

	/**
	 * @return varchar
	 */
	public function getStateProvince() {
		return $this->stateProvince;
	}

	/**
	 * @param varchar $country
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * @return varchar
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * @param decimal $storeSales
	 */
	public function setStoreSales($storeSales) {
		$this->storeSales = $storeSales;
	}

	/**
	 * @return decimal
	 */
	public function getStoreSales() {
		return $this->storeSales;
	}

	/**
	 * @param decimal $storeCost
	 */
	public function setStoreCost($storeCost) {
		$this->storeCost = $storeCost;
	}

	/**
	 * @return decimal
	 */
	public function getStoreCost() {
		return $this->storeCost;
	}

	/**
	 * @param decimal $unitSales
	 */
	public function setUnitSales($unitSales) {
		$this->unitSales = $unitSales;
	}

	/**
	 * @return decimal
	 */
	public function getUnitSales() {
		return $this->unitSales;
	}

	/**
	 * @param int $factCount
	 */
	public function setFactCount($factCount) {
		$this->factCount = $factCount;
	}

	/**
	 * @return int
	 */
	public function getFactCount() {
		return $this->factCount;
	}
}