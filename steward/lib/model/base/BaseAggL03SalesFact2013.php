<?php

/**
 * Classe Base da tabela [agg_l_03_sales_fact_2013]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo AggL03SalesFact2013
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseAggL03SalesFact2013 extends Base {

	const TABLE_NAME = 'agg_l_03_sales_fact_2013';
	const TIME_ID = 'time_id';
	const CUSTOMER_ID = 'customer_id';
	const STORE_SALES = 'store_sales';
	const STORE_COST = 'store_cost';
	const UNIT_SALES = 'unit_sales';
	const FACT_COUNT = 'fact_count';

	protected $timeId;
	protected $customerId;
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
	 * @param int $customerId
	 */
	public function setCustomerId($customerId) {
		$this->customerId = $customerId;
	}

	/**
	 * @return int
	 */
	public function getCustomerId() {
		return $this->customerId;
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