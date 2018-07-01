<?php

/**
 * Classe Base da tabela [agg_pl_01_sales_fact_2013]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo AggPl01SalesFact2013
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseAggPl01SalesFact2013 extends Base {

	const TABLE_NAME = 'agg_pl_01_sales_fact_2013';
	const PRODUCT_ID = 'product_id';
	const TIME_ID = 'time_id';
	const CUSTOMER_ID = 'customer_id';
	const STORE_SALES_SUM = 'store_sales_sum';
	const STORE_COST_SUM = 'store_cost_sum';
	const UNIT_SALES_SUM = 'unit_sales_sum';
	const FACT_COUNT = 'fact_count';

	protected $productId;
	protected $timeId;
	protected $customerId;
	protected $storeSalesSum;
	protected $storeCostSum;
	protected $unitSalesSum;
	protected $factCount;



	/**
	 * @param int $productId
	 */
	public function setProductId($productId) {
		$this->productId = $productId;
	}

	/**
	 * @return int
	 */
	public function getProductId() {
		return $this->productId;
	}

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
	 * @param decimal $storeSalesSum
	 */
	public function setStoreSalesSum($storeSalesSum) {
		$this->storeSalesSum = $storeSalesSum;
	}

	/**
	 * @return decimal
	 */
	public function getStoreSalesSum() {
		return $this->storeSalesSum;
	}

	/**
	 * @param decimal $storeCostSum
	 */
	public function setStoreCostSum($storeCostSum) {
		$this->storeCostSum = $storeCostSum;
	}

	/**
	 * @return decimal
	 */
	public function getStoreCostSum() {
		return $this->storeCostSum;
	}

	/**
	 * @param decimal $unitSalesSum
	 */
	public function setUnitSalesSum($unitSalesSum) {
		$this->unitSalesSum = $unitSalesSum;
	}

	/**
	 * @return decimal
	 */
	public function getUnitSalesSum() {
		return $this->unitSalesSum;
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