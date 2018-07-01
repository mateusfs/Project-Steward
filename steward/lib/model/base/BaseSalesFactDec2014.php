<?php

/**
 * Classe Base da tabela [sales_fact_dec_2014]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo SalesFactDec2014
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseSalesFactDec2014 extends Base {

	const TABLE_NAME = 'sales_fact_dec_2014';
	const PRODUCT_ID = 'product_id';
	const TIME_ID = 'time_id';
	const CUSTOMER_ID = 'customer_id';
	const PROMOTION_ID = 'promotion_id';
	const STORE_ID = 'store_id';
	const STORE_SALES = 'store_sales';
	const STORE_COST = 'store_cost';
	const UNIT_SALES = 'unit_sales';

	protected $productId;
	protected $timeId;
	protected $customerId;
	protected $promotionId;
	protected $storeId;
	protected $storeSales;
	protected $storeCost;
	protected $unitSales;



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
}