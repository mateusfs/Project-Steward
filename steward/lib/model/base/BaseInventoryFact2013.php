<?php

/**
 * Classe Base da tabela [inventory_fact_2013]
 *
 * Modelo criado utilizando a classe "WeeGenerate" desenvolvido por <Juan Carlos Monestel>
 *
 * ATEN��O:
 * - Implementa��es dever�o ser realizadas no modelo InventoryFact2013
 *
 * SERVER_ADDR: ::1
 * REMOTE_ADDR: ::1
 *
 * @author Juan Carlos Monestel <juancm86@gmail.com>
 * @copyright 2010 Juan Carlos Monestel
 * @version 1.2.0
 * @package model.base
 */
class BaseInventoryFact2013 extends Base {

	const TABLE_NAME = 'inventory_fact_2013';
	const PRODUCT_ID = 'product_id';
	const TIME_ID = 'time_id';
	const WAREHOUSE_ID = 'warehouse_id';
	const STORE_ID = 'store_id';
	const UNITS_ORDERED = 'units_ordered';
	const UNITS_SHIPPED = 'units_shipped';
	const WAREHOUSE_SALES = 'warehouse_sales';
	const WAREHOUSE_COST = 'warehouse_cost';
	const SUPPLY_TIME = 'supply_time';
	const STORE_INVOICE = 'store_invoice';

	protected $productId;
	protected $timeId;
	protected $warehouseId;
	protected $storeId;
	protected $unitsOrdered;
	protected $unitsShipped;
	protected $warehouseSales;
	protected $warehouseCost;
	protected $supplyTime;
	protected $storeInvoice;



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
	 * @param int $warehouseId
	 */
	public function setWarehouseId($warehouseId) {
		$this->warehouseId = $warehouseId;
	}

	/**
	 * @return int
	 */
	public function getWarehouseId() {
		return $this->warehouseId;
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
	 * @param int $unitsOrdered
	 */
	public function setUnitsOrdered($unitsOrdered) {
		$this->unitsOrdered = $unitsOrdered;
	}

	/**
	 * @return int
	 */
	public function getUnitsOrdered() {
		return $this->unitsOrdered;
	}

	/**
	 * @param int $unitsShipped
	 */
	public function setUnitsShipped($unitsShipped) {
		$this->unitsShipped = $unitsShipped;
	}

	/**
	 * @return int
	 */
	public function getUnitsShipped() {
		return $this->unitsShipped;
	}

	/**
	 * @param decimal $warehouseSales
	 */
	public function setWarehouseSales($warehouseSales) {
		$this->warehouseSales = $warehouseSales;
	}

	/**
	 * @return decimal
	 */
	public function getWarehouseSales() {
		return $this->warehouseSales;
	}

	/**
	 * @param decimal $warehouseCost
	 */
	public function setWarehouseCost($warehouseCost) {
		$this->warehouseCost = $warehouseCost;
	}

	/**
	 * @return decimal
	 */
	public function getWarehouseCost() {
		return $this->warehouseCost;
	}

	/**
	 * @param smallint $supplyTime
	 */
	public function setSupplyTime($supplyTime) {
		$this->supplyTime = $supplyTime;
	}

	/**
	 * @return smallint
	 */
	public function getSupplyTime() {
		return $this->supplyTime;
	}

	/**
	 * @param decimal $storeInvoice
	 */
	public function setStoreInvoice($storeInvoice) {
		$this->storeInvoice = $storeInvoice;
	}

	/**
	 * @return decimal
	 */
	public function getStoreInvoice() {
		return $this->storeInvoice;
	}
}