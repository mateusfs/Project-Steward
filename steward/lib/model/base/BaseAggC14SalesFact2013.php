<?php

/**
 * Classe Base da tabela [agg_c_14_sales_fact_2013]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo AggC14SalesFact2013
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseAggC14SalesFact2013 extends Base {

	const TABLE_NAME = 'agg_c_14_sales_fact_2013';
	const PRODUCT_ID = 'product_id';
	const CUSTOMER_ID = 'customer_id';
	const STORE_ID = 'store_id';
	const PROMOTION_ID = 'promotion_id';
	const MONTH_OF_YEAR = 'month_of_year';
	const QUARTER = 'quarter';
	const THE_YEAR = 'the_year';
	const STORE_SALES = 'store_sales';
	const STORE_COST = 'store_cost';
	const UNIT_SALES = 'unit_sales';
	const FACT_COUNT = 'fact_count';

	protected $productId;
	protected $customerId;
	protected $storeId;
	protected $promotionId;
	protected $monthOfYear;
	protected $quarter;
	protected $theYear;
	protected $storeSales;
	protected $storeCost;
	protected $unitSales;
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
	 * @param int $storeId
	 */
	public function setStoreId($storeId) {
		$this->storeId = $storeId;
	}

	/**
	 * @return int
	 */
	public function getStoreId() {
		return $this->storeId;
	}

	/**
	 * @param int $promotionId
	 */
	public function setPromotionId($promotionId) {
		$this->promotionId = $promotionId;
	}

	/**
	 * @return int
	 */
	public function getPromotionId() {
		return $this->promotionId;
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